<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Pelicula extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [
        'id'           => 'integer',
        'categoria_id' => 'integer',
    ];

    /**
     * Get the category title.
     * This is a "modern" way to add logic to your data objects.
     */
    public function getCategoryTitle(): string
    {
        return $this->attributes['categoria'] ?? 'Sin categoría';
    }
}
