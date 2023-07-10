<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function index()
    {
        $admin = new AdminModel();
        return view('admin/index.php');
    }
}
