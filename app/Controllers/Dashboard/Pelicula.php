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
            'pelicula' => $peliculaModel->asObject()->find($id),
        ];

        echo view("pelicula/show", $data);
    }

    public function new()
    {
        $data = [
            'pelicula' => new PeliculaModel(),
        ];

        echo view("pelicula/new", $data);
    }

    public function index()
    {

        $peliculaModel = new PeliculaModel();

        $data = [
            'peliculas' => $peliculaModel->asObject()->find(),
        ];

        echo view("pelicula/index", $data);
    }

    public function create()
    {
        $peliculaModel = new PeliculaModel();

        if ($this->validate('peliculas')) {
            $peliculaModel->asObject()->insert([
                'titulo' => $this->request->getPost('titulo'),
                'descripcion' => $this->request->getPost('descripcion')
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

        $data = [
            'pelicula' => $peliculaModel->asObject()->find($id),
        ];

        echo view("pelicula/edit", $data);
    }

    public function update($id)
    {
        $peliculaModel = new PeliculaModel();

        if ($this->validate('peliculas')) {
            $peliculaModel->asObject()->update($id, [
                'titulo' => $this->request->getPost('titulo'),
                'descripcion' => $this->request->getPost('descripcion')
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
}
