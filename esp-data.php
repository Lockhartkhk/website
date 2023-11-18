<!DOCTYPE html>
<html><body>
<?php

$servername = "localhost";

// REPLACE with your Database name
$dbname = "esp_data";
// REPLACE with Database user
$username = "esp_board";
// REPLACE with Database user password
$password = "Tiger051023$#";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT ble_id, mac_address, reading_time FROM ble_data ORDER BY ble_id DESC";

echo '<table cellspacing="3" cellpadding="3">
      <tr> 
        <td>BLE_ID</td> 
        <td>MAC_Adress</td> 
        <td>Timestamp</td> 
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_ble_id = $row["ble_id"];
        $row_mac_address = $row["mac_address"];
        $row_reading_time = $row["reading_time"];

        echo '<tr> 
                <td>' . $row_ble_id . '</td> 
                <td>' . $row_mac_address . '</td> 
                <td>' . $row_reading_time . '</td> 
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>
</body>
</html>