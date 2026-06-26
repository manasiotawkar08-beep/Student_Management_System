<?php

session_start();

if(!isset($_SESSION['email']))
{
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>Student Management System</h1>

<div class="menu">

<a href="add_student.php">
Add Student
</a>

<a href="students.php">
View Students
</a>

<a href="attendance.php">
Attendance
</a>

<a href="view_attendance.php">
Attendance Records
</a>

<a href="add_marks.php">
Add Marks
</a>

<a href="logout.php">
Logout
</a>

</div>

</div>
</body>
</html>