<?php

namespace App\Controllers;

use PDO;
use PDOException;

class DatabaseController extends BaseController
{
    private $pdo;

    public function connectToDatabase()
    {
        $dsn = "mysql:host=localhost;dbname=pickme";
        $user = "root";
        $pass = "";
        $option = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $pass, $option);
            // Further operations with the database connection can be performed here
            $this->pdo->query('SELECT 1');
            echo 'Database connection successful!';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function selectName()
    {
        $sql = "SELECT name FROM candidates WHERE approve_status = 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $results;
    }
}
?>