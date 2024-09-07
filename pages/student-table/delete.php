<?php
session_start();

if ($_SESSION["privilage"] === "teacher") {
    include $_SERVER['DOCUMENT_ROOT'] . "/ziyan-sem-4/db_conn.php";

    // Check if the 'id' parameter is set and is a valid integer
    if (isset($_GET["id"]) && filter_var($_GET["id"], FILTER_VALIDATE_INT)) {
        $id = $_GET["id"];

        $id = $_GET["id"];

        // Prepare the SQL statement with a placeholder for the parameter
        $sql = "DELETE FROM `students` WHERE id = ?";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind the parameter
        $stmt->bind_param("i", $id);

        // Execute the statement
        $result = $stmt->execute();

        // Close the statement
        $stmt->close();

        if ($result) {
            $_SESSION['response'] = "Data deleted successfully";
            // Redirect the user
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit; // Stop further execution
        }
    } else {
        // Provide an error message if 'id' parameter is missing or invalid
        echo "Invalid member ID.";
    }

    // Close the connection
    $conn->close();
} else {
    // Redirect the user if not logged in as admin
    header("Location: ../../../index.php");
    exit; // Stop further execution
}
