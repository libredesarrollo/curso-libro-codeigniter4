<?php

namespace App\Models;



class ProductControlModel extends BaseModel
{
    protected $table = 'products_control';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'count', 'type', 'product_id', 'created_at', 'updated_at', 'user_id'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function get($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }
}
