<?php
session_start();
require_once('connectiondb.php');
if (isset($_GET['delete'])) {
    // Get the user ID from the URL
    $userId = $_GET['delete'];
    $sql = "DELETE FROM users WHERE id = $userId";

    if (mysqli_query($conn, $sql)) {
        // Deletion successful
        echo "User deleted successfully";
    }
} else {
    // If the delete parameter is not set, redirect or handle the situation accordingly
    echo "Invalid request";
}
?>
