<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Categoria;

class CategoriaModel extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $allowedFields = ['titulo'];
    protected $returnType = Categoria::class;
    protected $useTimestamps = true;
}