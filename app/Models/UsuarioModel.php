<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
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
