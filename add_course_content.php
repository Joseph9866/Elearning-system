<?php
include('db_config.php'); // Connect to database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $module_name = $_POST['module_name'];
    $lesson_title = $_POST['lesson_title'];
    $lesson_content = $_POST['lesson_content'];

    $sql = "INSERT INTO course_contents (course_id, module_name, lesson_title, lesson_content) 
            VALUES (:course_id, :module_name, :lesson_title, :lesson_content)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':course_id', $course_id);
    $stmt->bindParam(':module_name', $module_name);
    $stmt->bindParam(':lesson_title', $lesson_title);
    $stmt->bindParam(':lesson_content', $lesson_content);

    if ($stmt->execute()) {
        echo "Lesson added successfully!";
    } else {
        echo "Error adding lesson.";
    }
}
?>
