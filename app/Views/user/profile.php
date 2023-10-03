<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>
        <link rel="stylesheet" href="profile.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fafafa;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .candidate-card {
            background-color: #fff;
            border: 1px solid #e6e6e6;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .candidate-card h3 {
            margin-top: 0;
            color: #333;
        }

        .candidate-card p {
            margin: 5px 0;
            color: #777;
        }
        *{
    margin: 0;
    padding: 0;
    border: none;
    outline: none;
    text-decoration: none;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }
  body{
    margin-top:20px;
    background-color:lightgray;
    display: flex;
    justify-content: center;
    align-items: center;
    

  }
  .col-md-8 mt-1{
    justify-content: center;
    align-items: center;
  }
 .main{
    padding:15px;
   font-family:Arial, Helvetica, sans-serif;
  }
  .card{
    position: relative;
    display: flex;
    flex-direction: column;
    width: 500px;
    height: 500px;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
    background-color: #f5f5f5;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    font-family: "Arial", sans-serif;
    color: #333;
  }
  .card h5 {
    font-size: 24px;
    margin-bottom: 10px;
  }
  .card p {
    font-size: 16px;
    margin-bottom: 20px;
  }
  .content{
    background-color: whitesmoke;
  }
  /*navigation*/
  nav{
    background: white;
    position:absolute;
    top:0;
    bottom:0;
    height:100%;
    left:0;
    background:#fff;
    width:90px;
    overflow:hidden;
    transition:width 0.2s linear;
    box-shadow:0 20px 35px rgba(0,0,0,0.1)
    
  }
  
  /*-----------------------------------Sidebar---------------------------------------------*/
  .nav{
      position:absolute;
      top:0;
      bottom:0;
      height:100%;
      left:0;
      background:#fff;
      width:90px;
      overflow:hidden;
      transition:width 0.2s linear;
      box-shadow:0 20px 35px rgba(0,0,0,0.1)
  }
  a{
      position:relative;
      color:rgb(85,83,83);
      font-size:14px;
      display:table;
      width:300px;
      padding:10px;
  }
  .fas{
      position:relative;
      width:70px;
      height:40px;
      top:14px;
      font-size:20px;
      text-align:center;
  }
  .nav-item{
      position:relative;
      top:12px;
      margin-left:10px;
  }
  a:hover{
      background:#eee;
  }
  nav:hover{
      width:280px;
      transition: all 0.5s ease;
  }
  .logout{
     position:absolute;
     bottom:0 
  }


    </style>

    </head>
    <body>
    <nav>
   
   <ul>
     <li>
       
       <a href="voter">
         <i class="fas fa-home"></i>
         <span class="nav-item">Home</span>
       </a>
     </li>
     <li>
       <a href="profile">
         <i class="fas fa-user"></i>
         <span class="nav-item">Candidate Information</span>
       </a>
     </li>
     <li>
       <a href="year">
         <i class="fas fa-chart-bar"></i>
         <span class="nav-item">Vote</span>
       </a>
     </li>
     <li>
       <a href="help">
         <i class="fas fa-question-circle"></i>
         <span class="nav-item">Help</span>
       </a>
     </li>
     <li>
       <a href="#" class="logout">
         <i class="fas fa-sign-out-alt"></i>
         <span class="nav-item">Log out</span>
       </a>
     </li>
   </ul>

</nav>
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

    $sql = "SELECT tbl_candidate.*, tbl_user.`first_name` AS first_name, tbl_user.`last_name` AS last_name 
            FROM tbl_candidate
            INNER JOIN tbl_user ON tbl_candidate.`student_email` = tbl_user.`email`";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $candidates = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display candidate information
    //foreach ($candidates as $candidate) {
      //  echo "Email: " . $candidate['std.email'] . "<br>";
      //  echo "First Name: " . $candidate['first_name'] . "<br>";
      //  echo "Last Name: " . $candidate['last_name'] . "<br>";
        // Add additional columns as needed

       // echo "<br>";
   // }

} catch (PDOException $e) {
    // Handle the database connection error
    echo "Database connection failed: " . $e->getMessage();
    exit();
}
?>  
<div class="container">
        <!-- Display candidate information -->
        <?php foreach ($candidates as $candidate) { ?>
            <div class="candidate-card">
                <h3>Email: <?php echo $candidate['student_email']; ?></h3>
                <p>First Name: <?php echo $candidate['first_name']; ?></p>
                <p>Last Name: <?php echo $candidate['last_name']; ?></p>
                <!-- Add additional columns as needed -->
            </div>
        <?php } ?>
    </div> 



    </body>
    </html>