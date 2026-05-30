<?php

namespace App\Models;


use App\Entities\Pelicula;

class PeliculaModel extends BaseModel
{
    protected $table = 'peliculas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['titulo', 'descripcion', 'categoria_id'];
    protected $returnType = Pelicula::class;
    protected $useTimestamps = true;

    public function getImagesById($id)
    {
        return $this->select("i.*")
            ->asObject()
            ->join('pelicula_imagen as pi', 'pi.pelicula_id = peliculas.id')
            ->join('imagenes as i', 'i.id = pi.imagen_id')
            ->where('peliculas.id', $id)
            //->getCompiledSelect();
            ->find();
    }
}
