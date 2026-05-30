<?php

namespace App\Models;



class UsuarioModel extends BaseModel
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario', 'email', 'contrasena', 'tipo'];

    function contrasenaHash($contrasenaPlana)
    {
        return password_hash($contrasenaPlana, PASSWORD_DEFAULT);
    }

    function contrasenaVerificar($contrasenaPlana, $contrasenaHash)
    {
        return password_verify($contrasenaPlana, $contrasenaHash);
    }
}
