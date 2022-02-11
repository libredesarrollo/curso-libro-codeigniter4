<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;
use App\Models\ImagenModel;
use App\Models\PeliculaImagenModel;
use App\Models\PeliculaModel;

class Pelicula extends BaseController
{

    public function show($id = null)
    {
        $peliculaModel = new PeliculaModel();

        $data = [
            'pelicula' => $peliculaModel->asObject()->find($id),
        ];

        echo view("pelicula/show", $data);
    }

    public function new()
    {

        $categoriaModel = new CategoriaModel();

        $data = [
            'pelicula' => new PeliculaModel(),
            'categorias' => $categoriaModel->asObject()->find()
        ];

        echo view("pelicula/new", $data);
    }

    public function index()
    {
        // $this->generar_imagen();
        $this->asignar_imagen();
        $peliculaModel = new PeliculaModel();

        $data = [
            'peliculas' => $peliculaModel
                ->select("peliculas.*, categorias.titulo as categoria")
                ->asObject()
                ->join('categorias', 'categorias.id = peliculas.categoria_id')
                ->find()
        ];

        echo view("pelicula/index", $data);
    }

    public function create()
    {
        $peliculaModel = new PeliculaModel();

        if ($this->validate('peliculas')) {
            $peliculaModel->insert([
                'titulo' => $this->request->getPost('titulo'),
                'descripcion' => $this->request->getPost('descripcion'),
                'categoria_id' => $this->request->getPost('categoria_id')
            ]);
        } else {
            session()->setFlashdata([
                'validation' => $this->validator
            ]);

            return redirect()->back()->withInput();
        }

        return redirect()->to('/dashboard/pelicula/new')->with('mensaje', 'Registro gestionado de manera exitosa');
    }

    public function edit($id)
    {
        $peliculaModel = new PeliculaModel();
        $categoriaModel = new CategoriaModel();

        $data = [
            'pelicula' => $peliculaModel->asObject()->find($id),
            'categorias' => $categoriaModel->asObject()->find()
        ];

        echo view("pelicula/edit", $data);
    }

    public function update($id)
    {
        $peliculaModel = new PeliculaModel();

        if ($this->validate('peliculas')) {
            $peliculaModel->update($id, [
                'titulo' => $this->request->getPost('titulo'),
                'descripcion' => $this->request->getPost('descripcion'),
                'categoria_id' => $this->request->getPost('categoria_id')
            ]);
        } else {
            session()->setFlashdata([
                'validation' => $this->validator
            ]);
            return redirect()->back()->withInput();
        }

        return redirect()->to('/dashboard/pelicula/edit/' . $id)->with('mensaje', 'Registro gestionado de manera exitosa');
    }

    public function delete($id)
    {
        $peliculaModel = new PeliculaModel();
        $peliculaModel->asObject()->delete($id);

        return redirect()->to('/dashboard/pelicula')->with('mensaje', 'Registro gestionado de manera exitosa');
    }

    private function generar_imagen(){
        $imageModel = new ImagenModel();
        $imageModel->insert([
            'nombre' => date("Y-m-d H:i:s"),
            'extension' => 'Pendiente',
            'data' => 'Pendiente'
        ]);        
    }

    private function asignar_imagen(){
        $peliculaImagenModel = new PeliculaImagenModel();

        $peliculaImagenModel->insert([
            'pelicula_id' => 1,
            'imagen_id' => 1,
        ]); 
    }
}
