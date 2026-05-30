<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class User extends BaseController{
    use ResponseTrait;

    public function getUsers($type)
    {
        $userModel = new UserModel();

        if($type == "provider"){
            $users = $userModel->asObject()->where('type', 'provider')->findAll();
        }else{
            $users = $userModel->asObject()->where('type', 'customer')->findAll();
        }

        return $this->respond($users);
    }
}