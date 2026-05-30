<?php namespace App\Models;



class UserModel extends BaseModel
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username','email','password','type'];
}