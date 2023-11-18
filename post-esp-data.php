<?php

$servername = "localhost";
$dbname = "esp_data";
$username = "esp_board";
$password = "Tiger051023$#";
$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $mac_address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    
    if ($api_key == $api_key_value) {
        $mac_address = test_input($_POST["mac_address"]);
        
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        // Use prepared statement to prevent SQL injection
        $sql = $conn->prepare("INSERT INTO ble_data (mac_address) VALUES (?)");
        $sql->bind_param("s", $mac_address);

        if ($sql->execute()) {
            // Return a JSON response
            header('Content-Type: application/json');
            echo json_encode(["message" => "New record created successfully"]);
        } else {
            // Return a JSON response with error details
            header('Content-Type: application/json');
            echo json_encode(["error" => "Error executing SQL query", "details" => $conn->error]);
        }

        $sql->close();
        $conn->close();
    } else {
        // Return a JSON response for wrong API Key
        header('Content-Type: application/json');
        echo json_encode(["error" => "Wrong API Key provided"]);
    }
} else {
    // Return a JSON response for no data posted
    header('Content-Type: application/json');
    echo json_encode(["error" => "No data posted with HTTP POST."]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>