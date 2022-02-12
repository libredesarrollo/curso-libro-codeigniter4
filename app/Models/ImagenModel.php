<?php

namespace App\Models;

use CodeIgniter\Model;

class ImagenModel extends Model
{
    protected $table = 'imagenes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'extension', 'data'];

    public function getPeliculasById($id)
    {
        return $this->select("p.*")
            ->asObject()
            ->join('pelicula_imagen as pi', 'pi.imagen_id = imagenes.id')
            ->join('peliculas as p', 'p.id = pi.pelicula_id')
            ->where('imagenes.id', $id)
            //->getCompiledSelect();
            ->find();
    }
}
