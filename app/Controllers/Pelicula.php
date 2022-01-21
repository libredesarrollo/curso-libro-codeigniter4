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
            'nombreVariableVista' => "Contenido",
            'nombreVariableVistaNumero' => 5,
            'nombreVariableVistaBool' => true,
            'miArray' => [1,2,3,4,5,"Item array"]
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
