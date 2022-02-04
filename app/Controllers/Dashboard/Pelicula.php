<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
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
        $data = [
            'pelicula' => ['titulo' => '', 'descripcion' => ''],
        ];

        echo view("pelicula/new", $data);
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

        return redirect()->to('/dashboard/pelicula/new')->with('mensaje', 'Registro gestionado de manera exitosa');
    }

    public function edit($id)
    {
        $peliculaModel = new PeliculaModel();

        $data = [
            'pelicula' => $peliculaModel->find($id),
        ];

        echo view("pelicula/edit", $data);
    }

    public function update($id)
    {
        $peliculaModel = new PeliculaModel();

        $peliculaModel->update($id, [
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion')
        ]);

        return redirect()->to('/dashboard/pelicula/edit/' . $id)->with('mensaje', 'Registro gestionado de manera exitosa');
    }

    public function delete($id)
    {
        $peliculaModel = new PeliculaModel();
        $peliculaModel->delete($id);

        return redirect()->to('/dashboard/pelicula')->with('mensaje', 'Registro gestionado de manera exitosa');
    }
}
