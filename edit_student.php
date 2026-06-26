 <?php

include("db.php");

$id = $_GET['id'];

$result = mysqli_query(
$conn,
"SELECT * FROM students WHERE student_id='$id'"
);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $student_name = $_POST['student_name'];
    $roll_no = $_POST['roll_no'];
    $department = $_POST['department'];

    mysqli_query(
    $conn,
    "UPDATE students
    SET
    student_name='$student_name',
    roll_no='$roll_no',
    department='$department'
    WHERE student_id='$id'"
    );

    header("Location: students.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edit Student</h2>

<form method="POST">

Student Name:<br>
<input type="text"
name="student_name"
value="<?php echo $row['student_name']; ?>">

<br><br>

Roll No:<br>
<input type="text"
name="roll_no"
value="<?php echo $row['roll_no']; ?>">

<br><br>

Department:<br>

<select name="department">

<option
<?php if($row['department']=="CSE") echo "selected"; ?>>
CSE
</option>

<option
<?php if($row['department']=="IT") echo "selected"; ?>>
IT
</option>

<option
<?php if($row['department']=="ECE") echo "selected"; ?>>
ECE
</option>

</select>

<br><br>

<input type="submit"
name="update"
value="Update Student">

</form>

</body>
</html>