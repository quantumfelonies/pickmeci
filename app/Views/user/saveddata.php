<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    require_once APPPATH . 'controllers/DatabaseController.php';

    // Retrieve $pdo from the database connection
    // If your DatabaseController.php file defines the $pdo variable, you can uncomment the line below
    // $pdo = getPDO();

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'txtCand_') === 0) {
            $postID = substr($key, strlen('txtCand_'));
            $email = $value;

            // Perform the database insertion for each post ID and email
            $sql = "INSERT INTO users (`std.email`) VALUES (:email)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
        }
    }
}
?>
<style>
    /* Place your CSS code here */
    .popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 999;
        opacity: 1;
        visibility: visible;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .popup-content {
        background-color: #ffffff;
        padding: 40px;
        border-radius: 4px;
        text-align: center;
    }

    .popup-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .popup-message {
        font-size: 16px;
        margin-bottom: 20px;
    }

    .popup-btn {
        padding: 12px 24px;
        font-size: 16px;
        font-weight: bold;
        color: #ffffff;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }
</style>

<!-- Popup -->
<div class="popup" id="popup">
    <div class="popup-content">
        <h2 class="popup-title">Vote Successful</h2>
        <p class="popup-message">Thank you for voting!</p>
        <a href="validation" class="popup-btn">View Results</a>
    </div>
</div>