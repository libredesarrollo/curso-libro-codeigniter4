<?php namespace App\Models;



class MovieModel extends BaseModel
{
    protected $table = 'movies';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description','category_id'];

    function getAll(){
        return $this->asArray()
        ->select('movies.*, categories.title as category')
        ->join('categories','categories.id = movies.category_id')
        ->first();
    }

}
