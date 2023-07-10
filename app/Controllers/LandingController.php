<?php

namespace App\Controllers;

class LandingController extends BaseController
{
    public function index()
    {
         return view('frontend/landing');
    }
}
