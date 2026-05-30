<?php

namespace App\Controllers\Dashboard;

use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\ProductControlModel;
use App\Models\ProductUserControlModel;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductTagModel;
use App\Models\TagModel;
use CodeIgniter\API\ResponseTrait;
use \CodeIgniter\Exceptions\PageNotFoundException;

use Dompdf\Dompdf;

class Product extends BaseController
{

    use ResponseTrait;

    protected $productModel;
    protected $categoryModel;
    protected $userModel;
    protected $tagModel;
    protected $productTagModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->userModel = new UserModel();
        $this->tagModel = new TagModel();
        $this->productTagModel = new ProductTagModel();
    }

    public function demoPDF()
    {
        $productId = 1;

        $product = $this->productModel->asObject()->find($productId);

        $query = $this->productModel->asObject()->select("pc.*, u.email, puc.description, puc.direction")
            ->join('products_control as pc', 'pc.product_id = products.id')
            ->join('users as u', 'pc.user_id = u.id')
            ->join('products_users_control as puc', 'pc.id = puc.product_control_id');

        $data = [
            'product' => $product,
            'trace' => $query->where('products.id', $productId)
                ->findAll()
        ];

        $dompdf = new Dompdf();
        $dompdf->loadHTML(view("dashboard/product/trace_pdf", $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $this->response->setHeader('Content-Type', 'application/pdf')
            ->setBody($dompdf->output());
    }

    public function trace($productId)
    {
        $product = $this->productModel->asObject()->find($productId);

        if ($product == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->validate([
            'min_cant' => 'is_natural',
            'max_cant' => 'is_natural',
        ]);

        $query = $this->productModel->asObject()->select("pc.*, u.email, puc.description, puc.direction")
            ->join('products_control as pc', 'pc.product_id = products.id')
            ->join('users as u', 'pc.user_id = u.id')
            ->join('products_users_control as puc', 'pc.id = puc.product_control_id');

        $type = $this->request->getGet('type');
        if ($type !== "" &&  ($type == "entry" || $type == "exit"))
            $query->where('pc.type', $type);
        else
            $type = "";

        // usuarios
        if ($type == "exit") {
            $users = $this->userModel->asObject()
                ->where("type", "customer")
                ->findAll();
        } else if ($type == "entry") {
            $users = $this->userModel->asObject()
                ->where("type", "provider")
                ->findAll();
        } else {
            $users = $this->userModel->asObject()->findAll();
        }

        $userId = intval($this->request->getGet('user_id'));

        if ($userId > 0) {
            $query->where('pc.user_id', $userId);
        }

        if ($this->request->getGet('check_cant')) {
            $query->where('pc.count >=', $this->request->getGet('min_cant'));
            $query->where('pc.count <=', $this->request->getGet('max_cant'));
        }

        if ($this->request->getGet('search')) {
            $searchs = explode(" ", trim($this->request->getGet('search')));
            $query->groupStart();
            foreach ($searchs as $s) {
                $query->orLike('u.username', $s)
                    ->orLike('u.email', $s)
                    ->orLike('puc.description', $s);
            }
            $query->groupEnd();
        }

        $data = [
            'product' => $product,
            'users' => $users,
            'userId' => $userId,
            'typeId' => $type,
            'search' => $this->request->getGet('search'),
            'checkCant' => $this->request->getGet('check_cant'),
            'minCant' => $this->request->getGet('min_cant'),
            'maxCant' => $this->request->getGet('max_cant'),
            'trace' => $query->where('products.id', $productId)
                ->findAll()
        ];

        return $this->_loadDefaultView(
            'Traza del producto ' . $product->name,
            $data,
            'trace'
        );
    }

    public function addStock($id, $entry)
    {
        $validation = \Config\Services::validation();

        if (!$validation->check($entry, 'required|is_natural_no_zero')) {
            return $this->failValidationErrors("Cantidad no es valida");
        }

        $userId = $this->request->getPost('user_id');

        $res = $this->validate([
            'user_id' => 'required',
            'direction' => 'required|min_length[2]',
            'description' => 'required|min_length[2]',
        ]);

        $product = $this->productModel->asObject()->find($id);

        if (!$res) {
            return  $this->failValidationErrors([
                "description" => $this->validator->getError("direction"),
                "direction" => $this->validator->getError("description")
            ]);
        }

        if ($product == null)
            throw PageNotFoundException::forPageNotFound();

        $product->stock += $entry;
        $product->entry = $entry;

        $this->productModel->update($id, [
            'entry' => $product->entry,
            'stock' => $product->stock
        ]);

        $productControlId = $this->productControlModel->insert([
            'product_id' => $id,
            'count' => $entry,
            'type' => 'entry',
            'user_id' => $userId
        ]);

        $this->productUserControlModel->insert(
            [
                'product_control_id' => $productControlId,
                'direction' => $this->request->getPost('direction'),
                'description' => $this->request->getPost('description'),
                'user_id' => $userId
            ]
        );

        return $this->respondUpdated($product);
    }

    public function exitStock($id, $exit)
    {
        $validation = \Config\Services::validation();

        if (!$validation->check($exit, 'required|is_natural_no_zero')) {
            return $this->failValidationErrors("Cantidad no es valida");
        }

        $res = $this->validate([
            'user_id' => 'required',
            'direction' => 'required|min_length[2]',
            'description' => 'required|min_length[2]',
        ]);

        if (!$res) {
            return $this->failValidationErrors([
                "description" => $this->validator->getError("direction"),
                "direction" => $this->validator->getError("description")
            ]);
        }

        $userId = $this->request->getPost('user_id');
        $product = $this->productModel->asObject()->find($id);

        if ($product == null)
            throw PageNotFoundException::forPageNotFound();

        if ($product->stock - $exit < 0) {
            return $this->failValidationErrors("No hay stock suficiente", 400);
        }

        $product->stock -= $exit;
        $product->exit = $exit;

        $this->productModel->update($id, [
            'exit' => $product->exit,
            'stock' => $product->stock
        ]);

        $productControlId = $this->productControlModel->insert([
            'product_id' => $id,
            'count' => $exit,
            'type' => 'exit',
            'user_id' => $userId
        ]);

        $this->productUserControlModel->insert(
            [
                'product_control_id' => $productControlId,
                'direction' => $this->request->getPost('direction'),
                'description' => $this->request->getPost('description'),
                'user_id' => $userId
            ]
        );

        return $this->respondUpdated($product);
    }

    public function index()
    {
        $query = $this->productModel->asObject()->select('id,code,exit,entry,stock,price,name');

        $category_id = $this->request->getGet('category_id');

        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        $tags_id = $this->request->getGet('tags_id') ?: [];

        if ($tags_id) {
            $query->join('product_tag as pt', 'pt.product_id = products.id')
                ->groupBy('id,code,exit,entry,stock,price,name');
        }

        $data = [
            'categories' => $this->categoryModel->asObject()->findAll(),
            'tags' => $this->tagModel->asObject()->findAll(),
            'category_id' => $category_id,
            'productTags' => $tags_id,
            'products' => $query->paginate(10),
            'users' => $this->userModel->asObject()/*->where('type', 'customer')*/->findAll(),
            'pager' => $this->productModel->pager
        ];

        return $this->_loadDefaultView('Listado de productos', $data, 'index');
    }

    public function new()
    {
        $validation =  \Config\Services::validation();
        return $this->_loadDefaultView('Crear etiqueta', [
            'validation' => $validation, 
            'product' => new ProductModel(), 
            'categories' => $this->categoryModel->asObject()->findAll(), 
            'tags' => $this->tagModel->asObject()->findAll(), 
            'productTags' => []
        ], 'new');
    }

    public function create()
    {
        if ($this->validate('products')) {
            $id = $this->productModel->insert([
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'code' => $this->request->getPost('code'),
                'entry' => $this->request->getPost('entry'),
                'exit' => $this->request->getPost('exit'),
                'stock' => $this->request->getPost('stock'),
                'category_id' => $this->request->getPost('category_id'),
                'price' => $this->request->getPost('price'),
            ]);

            $tags = $this->request->getPost('tag_id') ?: [];

            foreach ($tags as $t) {
                $this->productTagModel->insert([
                    'product_id' => $id,
                    'tag_id' => $t
                ]);
            }

            return redirect()->to("/dashboard/product/$id/edit")->with('message', 'Producto creado con éxito.');
        } else {
            session()->setFlashdata([
                'validation' => $this->validator
            ]);
        }

        return redirect()->back()->withInput();
    }

    public function edit($id = null)
    {
        $productTags = array_column($this->productTagModel
            ->asArray()
            ->select("tag_id")
            ->where('product_id', $id)
            ->findAll(), "tag_id");

        if ($this->productModel->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation =  \Config\Services::validation();
        return $this->_loadDefaultView(
            'Actualizar etiqueta',
            [
                'validation' => $validation,
                'product' => $this->productModel->asObject()->find($id),
                'categories' => $this->categoryModel->asObject()->findAll(),
                'tags' => $this->tagModel->asObject()->findAll(),
                'productTags' => $productTags
            ],
            'edit'
        );
    }

    public function update($id = null)
    {
        if ($this->productModel->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        if ($this->validate('products')) {

            $tags = $this->request->getPost('tag_id') ?: [];

            $this->productModel->update($id, [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'code' => $this->request->getPost('code'),
                'entry' => $this->request->getPost('entry'),
                'exit' => $this->request->getPost('exit'),
                'stock' => $this->request->getPost('stock'),
                'category_id' => $this->request->getPost('category_id'),
                'price' => $this->request->getPost('price'),
            ]);

            $this->productTagModel
                ->whereNotIn('tag_id', $tags)
                ->where('product_id', $id)->delete();

            foreach ($tags as $t) {
                try {
                    $this->productTagModel->insert([
                        'product_id' => $id,
                        'tag_id' => $t
                    ]);
                } catch (\Throwable $th) {
                }
            }

            return redirect()->to('/dashboard/product')->with('message', 'Producto editado con éxito.');
        } else {
            session()->setFlashdata([
                'validation' => $this->validator
            ]);
        }

        return redirect()->back()->withInput();
    }

    public function delete($id = null)
    {
        if ($this->productModel->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->productModel->delete($id);

        return redirect()->to('/dashboard/product')->with('message', 'Producto eliminado con éxito.');
    }

    private function _loadDefaultView($title, $data, $view)
    {
        $dataHeader = ['title' => $title];

        return view("dashboard/templates/header", $dataHeader)
             . view("dashboard/product/$view", $data)
             . view("dashboard/templates/footer");
    }
}
