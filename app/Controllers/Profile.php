<?php

namespace App\Controllers;

class profile extends BaseController
{
    public function index()
   {
        return view('user/profile');
    }
}