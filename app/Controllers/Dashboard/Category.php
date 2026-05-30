<?php namespace App\Controllers\Dashboard;

use App\Models\CategoryModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Category extends BaseController {

    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $data = [
            'categories' => $this->categoryModel->asObject()->paginate(10),
            'pager' => $this->categoryModel->pager
        ];

        return $this->_loadDefaultView('Listado de categorías', $data, 'index');
    }

    public function new()
    {
        $validation = \Config\Services::validation();
        return $this->_loadDefaultView('Crear categoría', [
            'validation' => $validation, 
            'category' => new CategoryModel(), 
            'categories' => $this->categoryModel->asObject()->findAll()
        ], 'new');
    }

    public function create()
    {
        if ($this->validate('categories')) {
            $id = $this->categoryModel->insert([
                'name' => $this->request->getPost('name'),
            ]);

            return redirect()->to("/dashboard/category/$id/edit")->with('message', 'Categoría creada con éxito.');
        } else {
            session()->setFlashdata([
                'validation' => $this->validator
            ]);
        }

        return redirect()->back()->withInput();
    }

    public function edit($id = null)
    {
        if ($this->categoryModel->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        return $this->_loadDefaultView('Actualizar categoría', [
            'validation' => $validation, 
            'category' => $this->categoryModel->asObject()->find($id),
        ], 'edit');
    }

    public function update($id = null)
    {
        if ($this->categoryModel->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        if ($this->validate('categories')) {
            $this->categoryModel->update($id, [
                'name' => $this->request->getPost('name'),
            ]);

            return redirect()->to('/dashboard/category')->with('message', 'Categoría editada con éxito.');
        } else {
            session()->setFlashdata([
                'validation' => $this->validator
            ]);
        }

        return redirect()->back()->withInput();
    }

    public function delete($id = null)
    {
        if ($this->categoryModel->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->categoryModel->delete($id);

        return redirect()->to('/dashboard/category')->with('message', 'Categoría eliminada con éxito.');
    }

    private function _loadDefaultView($title, $data, $view)
    {
        $dataHeader = ['title' => $title];

        return view("dashboard/templates/header", $dataHeader)
             . view("dashboard/category/$view", $data)
             . view("dashboard/templates/footer");
    }
}