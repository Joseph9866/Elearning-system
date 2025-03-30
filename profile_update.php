<?php
// Profile Update Script (profile_update.php)
session_start();
include('db_connection.php'); // Ensure you have your DB connection here

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    // Collect form data
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $id_number = $_POST['id_number'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];

    // Update the database with new details
    $sql = "UPDATE users SET username='$username', fullname='$fullname', id_number='$id_number', email='$email', phone='$phone', address='$address', city='$city', country='$country' WHERE user_id='$user_id'";

    if (mysqli_query($conn, $sql)) {
        echo "Profile updated successfully!";
        header('Location: profile.php'); // Redirect to profile page after update
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}
?>
