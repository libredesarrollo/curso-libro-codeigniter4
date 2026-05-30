<?php namespace App\Controllers\Dashboard;

use App\Models\TagModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Tag extends BaseController {

    public function index(){

        $tag = new TagModel();

        $data = [
            'tags' => $tag->asObject()
            ->paginate(10),
            'pager' => $tag->pager
        ];

        $this->_loadDefaultView( 'Listado de etiquetas',$data,'index');
    }

    public function new(){

        $tag = new TagModel();

        //mkdir('writeable/uploads/test',0755,true);

        $validation =  \Config\Services::validation();
        $this->_loadDefaultView('Crear etiqueta',['validation'=>$validation, 'tag'=> new TagModel(), 'categories' => $tag->asObject()->findAll()],'new');

    }

    public function create(){

        $tag = new TagModel();

        if($this->validate('tags')){
            $id = $tag->insert([
                'name' =>$this->request->getPost('name'),
            ]);

            return redirect()->to("/dashboard/tag/$id/edit")->with('message', 'Película creada con éxito.');

        } else {
            session()->setFlashdata([
                'validation'=>$this->validator
            ]);
        }
        
        return redirect()->back()->withInput();
    }

    public function edit($id = null){

        $tag = new TagModel();

        if ($tag->find($id) == null)
        {
            throw PageNotFoundException::forPageNotFound();
        }  

        $validation =  \Config\Services::validation();
        $this->_loadDefaultView('Actualizar etiqueta',
        ['validation'=>$validation,'tag'=> $tag->asObject()->find($id), ],'edit');
    }

    public function update($id = null){

        $tag = new TagModel();

        if ($tag->find($id) == null)
        {
            throw PageNotFoundException::forPageNotFound();
        }  

        if($this->validate('tags')){
            $tag->update($id, [
                'name' =>$this->request->getPost('name'),
            ]);

            return redirect()->to('/dashboard/tag')->with('message', 'Película editada con éxito.');

        }else{
            session()->setFlashdata([
                'validation'=>$this->validator
            ]);
        }

        return redirect()->back()->withInput();
    }

    public function delete($id = null){

        $tag = new TagModel();

        if ($tag->find($id) == null)
        {
            throw PageNotFoundException::forPageNotFound();
        }  
        
        $tag->delete($id);

        return redirect()->to('/dashboard/tag')->with('message', 'cateogría eliminada con éxito.');
    }

    private function _loadDefaultView($title,$data,$view){

        $dataHeader =[
            'title' => $title
        ];

        echo view("dashboard/templates/header",$dataHeader);
        echo view("dashboard/tag/$view",$data);
        echo view("dashboard/templates/footer");
    }


}