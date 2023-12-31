<?php
require_once APPPATH . 'controllers/DatabaseController.php';

// Database connection parameters
$dsn = 'mysql:host=localhost;dbname=pickme';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT c.`position_id`, u.`first_name`, u.`last_name`, COUNT(*) AS result, p.`position_name` 
        FROM tbl_candidate c
        JOIN tbl_user u ON u.`email` = c.`student_email`
        JOIN tbl_position p ON c.`position_id` = p.`id`
        GROUP BY c.`position_id`, u.`first_name`, u.`last_name`, p.`position_name`";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $rs = $stmt->fetchAll();

} catch (PDOException $e) {
    // Handle the database connection error
    echo "Database connection failed: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #cfd8dc;
            font-family: 'Helvetica Neue', sans-serif;
        }

        .card-5 {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 5%;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }

        .result-heading {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #2d2d2d;
        }

        .result-item {
            margin-bottom: 20px;
            color: #2d2d2d;
        }

        .progress-bar-custom {
            height: 24px;
            border-radius: 12px;
            animation: progress-animation 2s ease-in-out infinite;
        }

        @keyframes progress-animation {
            0% { width: 0%; }
        }
    </style>
</head>
<body>
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-5">
                <h2><strong>Result</strong></h2>
                <hr>
                <?php
                $previousPostId = null;
                foreach ($rs as $row) {
                    if ($previousPostId !== $row['position_id']) {
                        echo "<h3>Position: " . $row['position_name'] . "</h3>";
                        $previousPostId = $row['position_id'];
                    }
                    echo "<strong>" . $row['first_name'] . " " . $row['last_name'] . " = " . $row['result'] . " </strong><br>";
                    echo "<div class='progress'>
                        <div class='progress-bar progress-bar-striped bg-success progress-bar-animated' role='progressbar' aria-valuenow='" . $row['result'] . "' aria-valuemin='0' aria-valuemax='100' style='width: " . $row['result'] . "%'></div>
                        </div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>