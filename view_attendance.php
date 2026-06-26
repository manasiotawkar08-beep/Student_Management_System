<?php

include("db.php");

$query = "
SELECT attendance.*,
students.student_name
FROM attendance
JOIN students
ON attendance.student_id = students.student_id
ORDER BY attendance.attendance_date DESC";

$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
<head>
<title>View Attendance</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Attendance Records</h2>

<table>

<tr>
<th>ID</th>
<th>Student Name</th>
<th>Date</th>
<th>Status</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['attendance_id']; ?></td>
<td><?php echo $row['student_name']; ?></td>
<td><?php echo $row['attendance_date']; ?></td>
<td><?php echo $row['status']; ?></td>
</tr>

<?php } ?>

</table>

<br><br>

<a href="dashboard.php">Back</a>

</body>
</html>