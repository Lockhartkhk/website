<?php
// insertTestData.php

$servername = "localhost";
$dbname = "esp_data";
$username = "esp_board";
$password = "Tiger051023$#";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert test data (example)
$insertTestData = "INSERT INTO ble_data (mac_address, reading_time) VALUES
                   ('dd:7h:9k:2s:88:98', '2023-11-16 18:35:00')";

if ($conn->query($insertTestData) === TRUE) {
    echo "Test data inserted successfully.";
} else {
    echo "Error inserting test data: " . $conn->error;
}

$conn->close();
?>