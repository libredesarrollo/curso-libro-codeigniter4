<?php namespace App\Models;



class TagModel extends BaseModel
{
    protected $table = 'tags';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];

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