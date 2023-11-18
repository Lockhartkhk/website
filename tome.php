<!DOCTYPE html>
<html>
<head>
    <title>Number Comparison</title>
</head>
<body>

<form method="post" action="">
    <label for="number">Enter your lucky number :</label>
    <input type="number" name="number" id="number" required>
    <button type="submit">Submit</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the user input
    $userNumber = $_POST["number"];

    // Check if the number is greater than 9
    if ($userNumber > 7) {
        echo "<p>You may receive the blessings of Tome.</p>";
    } else {
        echo "<p>You may not receive the blessings of Tome.</p>";
    }
}
?>

</body>
</html>
