<?php

namespace App\Models;



class PeliculaImagenModel extends BaseModel
{
    protected $table = 'pelicula_imagen';
    protected $allowedFields = ['pelicula_id', 'imagen_id'];
}
