<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page
    header("Location: ../backend/php/login.php");
    exit();
}

// Database connection
$servername = "sql12.freesqldatabase.com";
$username = "sql12756836";
$password = "qEaH9rPgZn";
$database = "sql12756836";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare SQL statement to update user information
    $sql = "UPDATE users SET name='$name', password='$password' WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../../public/settings.php');
    } else {
        echo "Error updating user information: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
