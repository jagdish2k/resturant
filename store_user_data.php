<?php
$ip_address=$_SERVER["REMOTE_ADDR"];
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
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Secure password storage

    // Insert data into the database
    $sql = "INSERT INTO users (name, email, password,ip_address) VALUES ('$name', '$email', '$password','$ip_address')";

    if ($conn->query($sql) === TRUE) {
        echo "User data stored successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
if ($_POST['password'] !== $_POST['confirm_password']) {
    die("Passwords do not match. Please try again.");
}


// Close the connection
$conn->close();
?>
