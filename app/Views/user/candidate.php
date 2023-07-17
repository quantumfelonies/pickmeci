<!DOCTYPE html>
<html lang="en">
<head>
    <!------------------  Required Meta Tags ------------------>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!------------------  Bootstrap CSS ------------------>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!------------------  FontAwesome CDN ------------------>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!------------------  Custom CSS ------------------>
    <link rel="stylesheet" href="css/candidate.css">

    <!------------------  Fonts CDN ------------------>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!------------------  Internal CSS ------------------>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
            text-align: center;
            font-family: 'Poppins', sans-serif;
        }
        
        .candidate-container {
            margin-bottom: 30px;
        }

        .candidate-card {
            width: 18rem;
            margin: auto;
        }

        .candidate-card .card .card-img-top {
            height: 350px;
        }

        .candidate-card .card .card-body {
            padding: 20px;
        }

        .candidate-card .card .card-title {
            margin-bottom: 10px;
            font-size: 20px;
            font-weight: bold;
        }

        .candidate-card .card .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .candidate-card .card .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .candidate-card .card .card-img-top {
            height: 100px; /* Adjust the height as per your requirement */
            object-fit: cover;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center" style="margin-bottom: 10px;">vote president</h1>
                <p class="text-center" style="margin-bottom: 50px;">presidential candidates</p>
            </div>
            <?php
            // Database connection
            $dsn = "mysql:host=localhost;dbname=pickme";
            $username = "root";
            $password = "";

            try {
                $pdo = new PDO($dsn, $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT tbl_candidates.*, tbl_students.`std.fname`, tbl_students.`std.lname`
                  FROM tbl_candidates
                 INNER JOIN tbl_students ON tbl_candidates.`std.email` = tbl_students.`std.email`
                 WHERE tbl_candidates.`post.id` = 3";
                $result = $pdo->query($sql);
                $rs = $result->fetchAll();

                foreach ($rs as $row) {
                    ?>
                    <div class="col-md-3">
                        <div class="candidate-container">
                            <div class="candidate-card">
                                <img class="card-img-top" src="https://pixlok.com/wp-content/uploads/2022/02/Profile-Icon-SVG-09856789.png" alt="shinzo" height="200px">
                                <div class="card-body">
                                    <h2 class="card-title"><?php echo $row['std.email']; ?></h2>
                                    <a href="confirmation" class="btn btn-primary custom-button">Vote Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } catch (PDOException $e) {
                echo "Database Connection Failed: " . $e->getMessage();
            }
            ?>
        </div>
    </div>

    <!-- Scripts (Bootstrap and other dependencies) -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>