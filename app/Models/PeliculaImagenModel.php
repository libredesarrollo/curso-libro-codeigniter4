<?php

namespace App\Models;

use CodeIgniter\Model;

class PeliculaImagenModel extends Model
{
    protected $table = 'pelicula_imagen';
    protected $allowedFields = ['pelicula_id', 'imagen_id'];
}
