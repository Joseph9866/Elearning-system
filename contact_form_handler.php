<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate data (you can add more validation here)
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Send email or store the data (For simplicity, let's send an email)
        $to = "josekeam01@gmail.com"; // Change this to your email address
        $subject = "New Contact Us Message";
        $body = "Name: $name\nEmail: $email\nMessage: $message";
        $headers = "From: $email";

        // Send email
        if (mail($to, $subject, $body, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Error sending message.";
        }
    } else {
        echo "All fields are required!";
    }
}
?>
