<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "connexion.php";

// Get the search query from the AJAX request
$searchQuery = $_POST['query'];

// Check if the search query is empty or contains only whitespaces
if (empty(trim($searchQuery))) {
    // If empty, don't execute the query and exit
    exit();
}

// Prepare and execute the SQL query with case-insensitive search for exact designation match
$sql = "SELECT id, designation, prix_ht FROM article WHERE LOWER(designation) = LOWER(?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $searchQuery);
$stmt->execute();

// Get the result set
$result = $stmt->get_result();

// Fetch the results and generate HTML for the table rows
$rows = [];
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

// Close the prepared statement
$stmt->close();
$con->close();

// Output JSON to be processed by the AJAX success function
echo json_encode($rows);
?>
