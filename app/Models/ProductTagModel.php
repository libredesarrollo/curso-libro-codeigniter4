<?php namespace App\Models;

use CodeIgniter\Model;

class ProductTagModel extends Model
{
    protected $table = 'product_tag';
    protected $allowedFields = ['product_id','tag_id'];
}