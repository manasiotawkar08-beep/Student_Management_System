<?php

include("db.php");

if(isset($_POST['save']))
{
    foreach($_POST['status'] as $student_id => $status)
    {
        $date = date("Y-m-d");

        mysqli_query(
        $conn,
        "INSERT INTO attendance
        (student_id,attendance_date,status)
        VALUES
        ('$student_id','$date','$status')"
        );
    }

    echo "Attendance Saved Successfully";
}

$students = mysqli_query(
$conn,
"SELECT * FROM students"
);

?>

<!DOCTYPE html>
<html>
<head>
<title>Attendance</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Mark Attendance</h2>

<form method="POST">

<table>

<tr>
<th>Name</th>
<th>Attendance</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($students))
{
?>

<tr>

<td>
<?php echo $row['student_name']; ?>
</td>

<td>

<select
name="status[<?php echo $row['student_id']; ?>]">

<option value="Present">
Present
</option>

<option value="Absent">
Absent
</option>

</select>

</td>

</tr>

<?php
}
?>

</table>

<br>

<input
type="submit"
name="save"
value="Save Attendance"
class="btn">

<a href="dashboard.php" class="btn">
Back to Dashboard
</a>

</form>

</body>
</html>