<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Categoria extends ResourceController
{
    protected $modelName = 'App\Models\CategoriaModel';
    //protected $format    = 'xml';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
     
        return $this->respond($this->model->find($id));
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respond();
    }

    public function create()
    {

        if (!$this->validate('categorias')) {

            // if ($this->validator->getError("titulo"))
            //     return $this->respond($this->validator->getError("titulo"), 400);

            // if ($this->validator->getError("descripcion"))
            //     return $this->respond($this->validator->getError("descripcion"), 400);

            return $this->respond($this->validator->getErrors(), 400);
        }

        $id = $this->model->insert([
            'titulo' => $this->request->getPost('titulo'),
        ]);

        return $this->respond($this->model->find($id));
    }

    public function update($id = null)
    {

        if (!$this->validate('Categorias')) {

            if ($this->validator->getError("titulo"))
                return $this->respond($this->validator->getError("titulo"), 400);
        }

        $this->model->update($id, [
            'titulo' => $this->request->getRawInput()['titulo'],
        ]);

        return $this->respond($this->model->find($id));
    }
}