<?php

// Get the search term from the form
$search_term = $_POST['search'];

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=aqua', 'root', '');

// Get the results from the database
$sql = "SELECT * FROM users WHERE username LIKE '%$search_term%' OR email LIKE '%$search_term%'";
$results_users = $db->query($sql);

$sql = "SELECT * FROM donations WHERE donor_name LIKE '%$search_term%' OR email LIKE '%$search_term%' OR amount LIKE '%$search_term%'";
$results_donations = $db->query($sql);

// Display the results
if ($results_users) {
  foreach ($results_users as $result) {
    echo '<h3>' . $result['username'] . '</h3>';
    echo '<p>' . $result['email'] . '</p>';
  }
} else {
  echo 'No users found.';
}

if ($results_donations) {
  foreach ($results_donations as $result) {
    echo '<h3>' . $result['donor_name'] . '</h3>';
    echo '<p>' . $result['email'] . '</p>';
    echo '<p>Amount: ' . $result['amount'] . '</p>';
  }
} else {
  echo 'No donations found.';
}

?>