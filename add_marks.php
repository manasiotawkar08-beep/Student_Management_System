<?php

include("db.php");

if(isset($_POST['save']))
{
    $student_id = $_POST['student_id'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];

    mysqli_query(
    $conn,
    "INSERT INTO marks
    (student_id,subject,marks)
    VALUES
    ('$student_id','$subject','$marks')"
    );

    echo "Marks Saved Successfully";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Add Marks</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Add Student Marks</h2>

<form method="POST">

Student:<br>

<select name="student_id">

<?php

$result = mysqli_query(
$conn,
"SELECT * FROM students"
);

while($row=mysqli_fetch_assoc($result))
{
?>

<option
value="<?php echo $row['student_id']; ?>">
<?php echo $row['student_name']; ?>
</option>

<?php
}
?>

</select>

<br><br>

Subject:<br>

<input type="text"
name="subject">

<br><br>

Marks:<br>

<input type="number"
name="marks">

<br><br>

<input type="submit"
name="save"
value="Save Marks">

</form>

</body>
</html>