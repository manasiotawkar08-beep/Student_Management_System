<?php

include("db.php");

$id = $_GET['id'];

$query = "DELETE FROM students
WHERE student_id = '$id'";

mysqli_query($conn,$query);

header("Location: students.php");

?>