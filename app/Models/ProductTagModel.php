<?php namespace App\Models;



class ProductTagModel extends BaseModel
{
    protected $table = 'product_tag';
    protected $allowedFields = ['product_id','tag_id'];
}