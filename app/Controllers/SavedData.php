<?php

namespace App\Controllers;

class SavedData extends BaseController
{
    public function index()
    {
        $pdo = new \PDO('mysql:host=localhost;dbname=pickme;charset=utf8', 'root', '');
        
        // Retrieve data from the database or perform other necessary operations
    
        $data = [
            'pdo' => $pdo,
        ];

        include(APPPATH . 'views/user/saveddata.php');
    }
}
