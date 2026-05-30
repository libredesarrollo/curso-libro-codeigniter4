<?php namespace App\Models;



class MovieImageModel extends BaseModel
{
    protected $table = 'movie_images';
    protected $primaryKey = 'id';
    protected $allowedFields = ['movie_id', 'image'];


    function getByMovieId($movie_id){
        return $this->asObject()
            ->where(['movie_id' => $movie_id])
            ->findAll();
    }
}
