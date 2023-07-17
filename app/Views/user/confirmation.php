<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
     body {
            font-family: Arial, sans-serif;
            background-color: #cfd8dc;
            margin: 0;
            padding: 0;
        }

        section#center {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            padding-top: 20px;
            font-size: 32px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td.td-1 {
            text-align: center;
            padding-top: 20px;
        }

        td.td-2 {
            padding-top: 20px;
            padding-bottom: 40px;
        }

        select[name="txtCand"] {
            display: inline-block;
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            background-color: #fff;
        }

        button.magnifyBtn {
            padding: 12px 24px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }
    </style>
</head>
<body>
    <section id="center">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 style="padding-top: 20px;">Confirmation</h1>
                    <form action="SavedData.php" method="post" id="ConfirmForm">
                        <table>
                        <?php
$pdo = new PDO('mysql:host=localhost;dbname=pickme;charset=utf8', 'root', '');

$sql = "SELECT c.`post.id`, u.`std.email` AS std_email, COUNT(*) AS result 
        FROM tbl_candidates c
        JOIN users u ON u.`std.email` = c.`std.email`
        GROUP BY c.`post.id`, u.`std.email`";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_OBJ);

$previousPostId = null;

foreach ($results as $output) {
    if ($previousPostId !== $output->{'post.id'}) {
        if ($previousPostId !== null) {
            echo '</select>';
            echo '</td></tr>';
        }

        echo '<tr>';
        echo '<td class="td-1">Which Candidate (Post ID: ' . $output->{'post.id'} . '):</td>';
        echo '<td class="td-1">';
        echo '<select required name="txtCand_' . $output->{'post.id'} . '" style="display: inline-block;">';
        echo '<option>Confirm candidate selection</option>';
    }

    echo '<option>' . $output->std_email . '</option>';

    $previousPostId = $output->{'post.id'};
}

if ($previousPostId !== null) {
    echo '</select>';
    echo '</td></tr>';
}
?>
<tr>
    <td class="td-2" style="padding-top: 20px; padding-bottom: 40px;"><button class="magnifyBtn" name="Submit">Submit</button></td>
</tr>
</table>
</form>
</div>
<div class="col-md-6" style="padding-top: 50px;">
    <img src="img/7.svg" alt="" srcset="">
</div>
</div>
</div>
</section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>