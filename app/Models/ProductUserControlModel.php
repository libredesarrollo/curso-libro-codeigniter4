<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductUserControlModel extends Model
{
    protected $table = 'products_users_control';
    protected $primaryKey = 'id';
    protected $allowedFields = ['created_at', 'updated_at', 'product_control_id','description','direction'];

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
