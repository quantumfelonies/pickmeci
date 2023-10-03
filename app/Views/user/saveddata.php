<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    require_once APPPATH . 'controllers/DatabaseController.php';

    // Retrieve $pdo from the database connection
    // If your DatabaseController.php file defines the $pdo variable, you can uncomment the line below
    // $pdo = getPDO();

    try {
        $pdo->beginTransaction();

        // Prepare the SQL statement outside the loop for efficiency
        $sql = "INSERT INTO tbl_vote (student_email, election_id, candidate_id, position_id) 
                VALUES (:student_email, :election_id, :candidate_id, :position_id)";
        $stmt = $pdo->prepare($sql);

        foreach ($_POST as $key => $value) {
            if (strpos($key, 'txtCand_') === 0) {
                $postID = substr($key, strlen('txtCand_'));
                $email = $value;

                // Set the appropriate values for election_id, candidate_id, and position_id
                $electionId = 1; // Replace with the actual election ID
                $candidateId = $postID;
                $positionId = 1; // Replace with the actual position ID

                // Bind parameters and execute the statement for each record
                $stmt->bindParam(":student_email", $email);
                $stmt->bindParam(":election_id", $electionId);
                $stmt->bindParam(":candidate_id", $candidateId);
                $stmt->bindParam(":position_id", $positionId);
                $stmt->execute();
            }
        }

        $pdo->commit();

        // Display success message or redirect to a success page
        echo "<div class='popup' id='popup'>
                <div class='popup-content'>
                    <h2 class='popup-title'>Vote Successful</h2>
                    <p class='popup-message'>Thank you for voting!</p>
                    <a href='validation' class='popup-btn'>View Results</a>
                </div>
            </div>";

    } catch (PDOException $e) {
        // Rollback the transaction on error
        $pdo->rollBack();

        // Handle the exception or display an error message
        echo "Error: " . $e->getMessage();
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

