<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;

class Categoria extends BaseController
{

    public function show($id)
    {
        $categoriaModel = new CategoriaModel();

        $data = [
            'categoria' => $categoriaModel->find($id),
        ];

        echo view("categoria/show", $data);
    }

    public function new()
    {

        $data = [
            'categoria' => ['titulo' => ''],
        ];

        echo view("categoria/new", $data);
    }

    public function index()
    {

        $categoriaModel = new CategoriaModel();

        $data = [
            'categorias' => $categoriaModel->find(),
        ];

        echo view("categoria/index", $data);
    }

    public function create()
    {
        $categoriaModel = new CategoriaModel();

        $categoriaModel->insert([
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion')
        ]);

        return redirect()->to('/dashboard/categoria/new')->with('mensaje', 'Registro gestionado de manera exitosa');
    }

    public function edit($id)
    {
        $categoriaModel = new CategoriaModel();

        $data = [
            'categoria' => $categoriaModel->find($id),
        ];

        echo view("categoria/edit", $data);
    }

    public function update($id)
    {
        $categoriaModel = new CategoriaModel();

        $categoriaModel->update($id, [
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion')
        ]);

        return redirect()->to('/dashboard/categoria/edit/'.$id)->with('mensaje', 'Registro gestionado de manera exitosa');
    }

    public function delete($id)
    {
        $categoriaModel = new CategoriaModel();
        $categoriaModel->delete($id);

        return redirect()->to('/dashboard/categoria')->with('mensaje', 'Registro gestionado de manera exitosa');
    }
}
