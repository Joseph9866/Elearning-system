<?php
session_start(); // Start session
$conn = new mysqli("localhost", "root", "", "elearning-system1");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Fetch user from the database
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Set session variables
        $_SESSION['user_id'] = $row['id'];
        header("Location: home.php"); // Redirect to home page
    } else {
        echo "Invalid password!";
    }
} else {
    echo "User not found!";
}

// Close connection
$conn->close();
?>
