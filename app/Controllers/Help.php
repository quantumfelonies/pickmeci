<?php

namespace App\Controllers;

class help extends BaseController
{
    public function index()
   {
        return view('user/help');
    }

    public function help()
   {
        return view('frontend/help');
    }
}
?>

