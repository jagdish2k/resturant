<?php
// Database configuration
$servername = "localhost"; // Change if not running on localhost
$username = "root";      // Your database username
$password = "";          // Your database password
$dbname = "user"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $conn->real_escape_string($_POST['full_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $city = $conn->real_escape_string($_POST['city']);
    $state = $conn->real_escape_string($_POST['state']);
    $zip = $conn->real_escape_string($_POST['zip']);
    $cardName = $conn->real_escape_string($_POST['card_name']);
    $cardNumber = $conn->real_escape_string($_POST['card_number']);
    $expMonth = $conn->real_escape_string($_POST['exp_month']);
    $expYear = $conn->real_escape_string($_POST['exp_year']);
    $cvv = $conn->real_escape_string($_POST['cvv']);

    // Insert data into the database
    $sql = "INSERT INTO orders (full_name, email, address, city, state, zip, card_name, card_number, exp_month, exp_year, cvv) VALUES ('$fullName', '$email', '$address', '$city', '$state', '$zip', '$cardName', '$cardNumber', '$expMonth', '$expYear', '$cvv')";

    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
