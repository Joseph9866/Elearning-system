<?php
include('db_config.php');
session_start();

// Fetch all courses
$query = $pdo->query("SELECT * FROM courses");
$courses = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="coursecn.css">
</head>
<body>
    <h1>Available Courses</h1>
    <div class="courses-container">
        <?php foreach ($courses as $course): ?>
            <div class="course-box">
                <h3><?php echo htmlspecialchars($course['course_name']); ?></h3>
                <p><?php echo htmlspecialchars($course['course_description']); ?></p>
                <a href="course_details.php?id=<?php echo $course['id']; ?>" class="view-btn">View Course</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
