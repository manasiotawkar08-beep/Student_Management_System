<?php

include("db.php");

if(isset($_GET['search']))
{
    $search = $_GET['search'];

    $query = "
    SELECT students.*,
    teachers.teacher_name
    FROM students
    JOIN teachers
    ON students.teacher_id = teachers.teacher_id
    WHERE student_name LIKE '%$search%'";
}
else
{
    $query = "
    SELECT students.*,
    teachers.teacher_name
    FROM students
    JOIN teachers
    ON students.teacher_id = teachers.teacher_id";
}

$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
<head>

<title>Student List</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<div class="card">

<h2>Student List</h2>

<form method="GET">

<input
type="text"
name="search"
placeholder="Search Student Name">

<br><br>

<input
type="submit"
value="Search"
class="btn">

</form>

<br>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Roll No</th>
<th>Department</th>
<th>Teacher</th>
<th>Action</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td>
<?php echo $row['student_id']; ?>
</td>

<td>
<?php echo $row['student_name']; ?>
</td>

<td>
<?php echo $row['roll_no']; ?>
</td>

<td>
<?php echo $row['department']; ?>
</td>

<td>
<?php echo $row['teacher_name']; ?>
</td>

<td>

<a href="edit_student.php?id=<?php echo $row['student_id']; ?>">
Edit
</a>

|

<a href="delete_student.php?id=<?php echo $row['student_id']; ?>">
Delete
</a>

</td>

</tr>

<?php
}
?>

</table>

<br><br>

<a href="dashboard.php" class="btn">
Back To Dashboard
</a>

</div>

</div>

</body>
</html>