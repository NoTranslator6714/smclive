<?php
// Database connection parameters
$servername = "woodduck.bloom.host:3306";
$username = "u43839_5NoUX61dud";
$password = "2f27iKc6R0RsCMzT9T9LsUwK";
$dbname = "s43839_data-1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select scores for each team
$sql = "SELECT team_name, team1, team2, team3, team4, team5, team6, team7, team8, team9, team10 FROM scores";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // Fetch data row by row
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Send data as JSON
header('Content-Type: application/json');
echo json_encode($data);

// Close the database connection
$conn->close();
?>