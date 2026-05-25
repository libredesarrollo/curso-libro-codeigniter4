<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Usuario extends BaseController
{

    public function index()
    {
        if (!auth()->user()->can('users.detail')) {
            return redirect()->to('/');
        }

        $userModel = model('UserModel');

        echo view('dashboard/usuario/index', [
            'usuarios' => $userModel->find()
        ]);
    }

    public function show($id)
    {

        if (!auth()->user() || !auth()->user()->can('users.detail')) {
            return redirect()->to('/');
        }
        
        // if (!auth()->user()->can('users.detail')) {
        //     return redirect()->to('/');
        // }

        $authGroups = config('AuthGroups');
        $userModel = model('UserModel');

        // $userModel->find(1)->addPermission('beta.access');
        //$userModel->find(1)->removePermission('admin.access');

        //$userModel->find(1)->addGroup('admin');
        // $userModel->find(1)->removeGroup('admin');
        // $userModel->find(1)->removeGroup('admin');

        // $groupModel = model('GroupModel');
        // $permissionModel = model('PermissionModel');
        // foreach ($groupModel->asObject()->find() as $key => $g) {
        //     echo $g->group."   ";
        // }
        // foreach ($permissionModel->asObject()->find() as $key => $p) {
        //     echo $p->permission."   ";
        // }

        // foreach ($authGroups->groups as $key => $gs) {
        //     var_dump($key);
        //     foreach ($gs as $key => $g) {

        //     }
        // }
        // foreach ($authGroups->permissions as $key => $p) {
        //     var_dump($key);
        // }

        // var_dump($authGroups->groups);
        // var_dump($authGroups->matrix);
        // return;
        echo view('dashboard/usuario/show', [
            'usuario' => $userModel->find($id),
            'groups' => $authGroups->groups,
            'permissions' => $authGroups->permissions,
            'matrix' => $authGroups->matrix,
        ]);
    }

    public function permisos_manejar($usuarioId)
    {

        // if (!auth()->user()->can('users.edit')) {
        //     echo -2;
        //     return;
        // }

        $userModel = model('UserModel');

        $usuario = $userModel->find($usuarioId);
        $permiso = $this->request->getPost('permiso');

        // return $usuario->syncPermissions($permiso);

        if ($usuario->can($permiso)) {
            $usuario->removePermission($permiso);
            echo 0;
        } else {
            $usuario->addPermission($permiso);
            echo 1;
        }
    }
    public function grupos_manejar($usuarioId)
    {

        if (!auth()->user()->can('users.edit')) {
            echo -2;
            return;
        }

        $userModel = model('UserModel');

        $usuario = $userModel->find($usuarioId);
        $grupo = $this->request->getPost('grupo');

        if ($usuario->inGroup($grupo)) {
            $usuario->removeGroup($grupo);
            echo 0;
        } else {
            $usuario->addGroup($grupo);
            echo 1;
        }
    }
}