<?php

namespace App\Models;


use App\Entities\Categoria;

class CategoriaModel extends BaseModel
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $allowedFields = ['titulo'];
    protected $returnType = Categoria::class;
    protected $useTimestamps = true;
}