<?php

namespace App\Controllers;

use App\Models\PeliculaModel;

class Pelicula extends BaseController
{

    public function show($id = null)
    {
        $peliculaModel = new PeliculaModel();

        $data = [
            'pelicula' => $peliculaModel->find($id),
        ];

        echo view("pelicula/show", $data);
    }

    public function new()
    {
        echo view("pelicula/new");
    }

    public function index()
    {

        $peliculaModel = new PeliculaModel();

        $data = [
            'peliculas' => $peliculaModel->find(),
        ];

        echo view("pelicula/index", $data);
    }

    public function create()
    {
        $peliculaModel = new PeliculaModel();

        $peliculaModel->insert([
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion')
        ]);

        echo view("pelicula/new");
    }

    public function edit($id = null)
    {
        $peliculaModel = new PeliculaModel();

        $data = [
            'pelicula' => $peliculaModel->find($id),
        ];

        echo view("pelicula/edit", $data);
    }

    public function update($id = null)
    {
        $peliculaModel = new PeliculaModel();

        $peliculaModel->update($id, [
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion')
        ]);

        $data = [
            'pelicula' => $peliculaModel->find($id),
        ];

        echo view("pelicula/edit", $data);
    }

    public function delete($id = null)
    {
        $peliculaModel = new PeliculaModel();
        $peliculaModel->delete($id);

        echo "Pelicula eliminada";
    }
}
