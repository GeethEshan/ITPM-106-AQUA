<?php
// delete.php

// Check if the ID parameter is provided in the URL
if (isset($_GET['id'])) {
    // Get the ID value from the URL
    $id = $_GET['id'];
    
    // Perform necessary operations for deleting the record with the given ID
    // ...
    
    // Redirect back to the page displaying the records (e.g., donations.php)
    header("Location: donations.php");
    exit();
} else {
    // If the ID parameter is not provided, redirect to an error page or the main page
    header("Location: error.php");
    exit();
}
?>