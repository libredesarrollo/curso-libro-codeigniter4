<?php namespace App\Models;



class PaymentModel extends BaseModel
{
    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','e_id','model','price','payment_id','type'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
