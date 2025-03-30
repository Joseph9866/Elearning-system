<?php
include('db_config.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "Unauthorized"]);
    exit();
}

$user_id = $_SESSION['user_id'];
$query = $pdo->prepare("SELECT * FROM users WHERE id = :user_id");
$query->bindParam(':user_id', $user_id);
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);

$courses_query = $pdo->prepare("SELECT * FROM courses WHERE user_id = :user_id");
$courses_query->bindParam(':user_id', $user_id);
$courses_query->execute();
$courses = $courses_query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    "username" => $user['username'],
    "courses" => $courses
]);
?>
