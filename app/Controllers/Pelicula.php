<?php

namespace App\Controllers;

class Pelicula extends BaseController
{
    public function new()
    {
        echo "Hola";
    }

    public function index()
    {

        $data = [
            'nombreVariableVista' => "Contenido"
        ];

        echo view("index", $data);
    }

    public function create()
    {
    }

    public function edit($id = null)
    {
    }

    public function update($id = null)
    {
    }

    public function delete($id = null)
    {
    }
}
