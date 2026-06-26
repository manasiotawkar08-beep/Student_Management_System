<?php

include("db.php");

if(isset($_POST['save']))
{
    $student_name = $_POST['student_name'];
    $roll_no = $_POST['roll_no'];
    $department = $_POST['department'];
    $teacher_id = $_POST['teacher_id'];

    $query = "INSERT INTO students
    (student_name,roll_no,department,teacher_id)
    VALUES
    ('$student_name','$roll_no','$department','$teacher_id')";

    mysqli_query($conn,$query);

    echo "Student Added Successfully";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Add Student</h2>

<form method="POST">

Student Name:<br>
<input type="text" name="student_name" required>

<br><br>

Roll Number:<br>
<input type="text" name="roll_no" required>

<br><br>

Department:<br>
<select name="department">
    <option>CSE</option>
    <option>IT</option>
    <option>ECE</option>
</select>

<br><br>

Teacher:<br>
<select name="teacher_id">

<?php

$teachers = mysqli_query($conn,"SELECT * FROM teachers");

while($row=mysqli_fetch_assoc($teachers))
{
?>

<option value="<?php echo $row['teacher_id']; ?>">
<?php echo $row['teacher_name']; ?>
</option>

<?php
}
?>

</select>

<br><br>

<input type="submit" name="save" value="Add Student">

</form>

<br><br>

<a href="dashboard.php">Back</a>

</body>
</html>