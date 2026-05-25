<?php

namespace App\Controllers;

class Other extends Base
{
    protected $title = "Other";
    protected $content = "Other";
    // protected $userTieneQueEstarAuth = false;

    public function contacto()
    {

        // if (!auth()->loggedIn()) {
        //     return redirect()->to('/');
        // }

        echo 'contacto!';
    }
}
