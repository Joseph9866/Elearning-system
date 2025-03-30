<?php
include('db_config.php');
session_start();

if (!isset($_GET['id'])) {
    die("Course ID is missing!");
}

$course_id = $_GET['id'];

// Fetch course details
$course_query = $pdo->prepare("SELECT * FROM courses WHERE id = :course_id");
$course_query->bindParam(':course_id', $course_id);
$course_query->execute();
$course = $course_query->fetch(PDO::FETCH_ASSOC);

// Fetch course contents (modules & lessons)
$content_query = $pdo->prepare("SELECT * FROM course_contents WHERE course_id = :course_id");
$content_query->bindParam(':course_id', $course_id);
$content_query->execute();
$contents = $content_query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($course['course_name']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($course['course_name']); ?></h1>
    <p><?php echo htmlspecialchars($course['course_description']); ?></p>

    <h2>Course Modules & Lessons</h2>
    <ul>
        <?php foreach ($contents as $content): ?>
            <li>
                <strong><?php echo htmlspecialchars($content['module_name']); ?></strong>
                <ul>
                    <li><?php echo htmlspecialchars($content['lesson_title']); ?></li>
                    <p><?php echo nl2br(htmlspecialchars($content['lesson_content'])); ?></p>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
