<?php

namespace App\Controllers\Web;

use App\Models\UsuarioModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Usuario extends BaseController
{

    public function login()
    {
        echo view("web/usuario/login");
    }

    public function login_post()
    {

        $usuarioModel = new UsuarioModel();

        $email = $this->request->getPost('email');
        $contrasena = $this->request->getPost('contrasena');

        $usuario = $usuarioModel->select('id,usuario,email,contrasena,tipo')->orWhere('email', $email)->orWhere('usuario', $email)->first();

        if (!$usuario)
            return redirect()->back()->with('mensaje', 'Usuario y/o contraseña incorrecto');

        if ($usuarioModel->contrasenaVerificar($contrasena, $usuario['contrasena'])) {
            $session = session();
            unset($usuario['contrasena']);
            $session->set($usuario);
            return redirect()->to('/dashboard/categoria')->with('mensaje', 'Bienvenido');
        }

        return redirect()->back()->with('mensaje', 'Usuario y/o contraseña incorrecto');
    }

    public function registrar()
    {
        echo view("web/usuario/registrar");
    }

    public function registrar_post()
    {
        $usuarioModel = new UsuarioModel();

        if ($this->validate('usuarios')) {
            $usuarioModel->insert([
                'usuario' => $this->request->getPost('usuario'),
                'email' => $this->request->getPost('email'),
                'contrasena' => $usuarioModel->contrasenaHash($this->request->getPost('contrasena')),
            ]);

            return redirect()->to(route_to('usuario.login'))->with('message', 'Usuario creada con éxito.');
        }

        session()->setFlashdata([
            'validation' => $this->validator
        ]);

        return redirect()->back()->withInput();
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(route_to('usuario.login'));
    }
}
