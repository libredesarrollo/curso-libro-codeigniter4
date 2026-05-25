<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Base extends BaseController
{
    protected $title = 'Base';
    protected $content = 'Base';
    protected $permiso = '';
    protected $userTieneQueEstarAuth = false;

    private function checkPermiso()
    {

        if ($this->userTieneQueEstarAuth) {
            if (auth()->loggedIn()) {
                if (!auth()->user()->can($this->permiso)) {
                    return redirect()->to('/');
                }
            } else
                return redirect()->to('/');
        }
    }

    public function new()
    {

        if ($this->userTieneQueEstarAuth) {
            if (auth()->loggedIn()) {
                if (!auth()->user()->can($this->permiso)) {
                    return redirect()->to('/');
                }
            } else
                return redirect()->to('/');
        }

        echo view('base/new', [
            'title' => 'New ' . $this->title,
            'content' => $this->content
        ]);
    }
    public function create()
    {

        if ($this->userTieneQueEstarAuth) {
            if (auth()->loggedIn()) {
                if (!auth()->user()->can($this->permiso)) {
                    return redirect()->to('/');
                }
            } else
                return redirect()->to('/');
        }

        echo view('base/create', [
            'title' => 'Create ' . $this->title,
            'content' => $this->content
        ]);
    }
    public function edit()
    {

        if ($this->userTieneQueEstarAuth) {
            if (auth()->loggedIn()) {
                if (!auth()->user()->can($this->permiso)) {
                    return redirect()->to('/');
                }
            } else
                return redirect()->to('/');
        }

        echo view('base/edit', [
            'title' => 'Edit ' . $this->title,
            'content' => $this->content
        ]);
    }
    public function update()
    {

        if ($this->userTieneQueEstarAuth) {
            if (auth()->loggedIn()) {
                if (!auth()->user()->can($this->permiso)) {
                    return redirect()->to('/');
                }
            } else
                return redirect()->to('/');
        }

        echo view('base/update', [
            'title' => 'Update ' . $this->title,
            'content' => $this->content
        ]);
    }
    public function delete()
    {

        if ($this->userTieneQueEstarAuth) {
            if (auth()->loggedIn()) {
                if (!auth()->user()->can($this->permiso)) {
                    return redirect()->to('/');
                }
            } else
                return redirect()->to('/');
        }

        echo view('base/delete', [
            'title' => 'Delete ' . $this->title,
            'content' => $this->content
        ]);
    }
    public function index()
    {

        if ($this->userTieneQueEstarAuth) {
            if (auth()->loggedIn()) {
                if (!auth()->user()->can($this->permiso)) {
                    return redirect()->to('/');
                }
            } else
                return redirect()->to('/');
        }

        echo view('base/index', [
            'title' => 'Index ' . $this->title,
            'content' => $this->content
        ]);
    }
}
