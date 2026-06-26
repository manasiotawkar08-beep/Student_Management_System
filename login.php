<?php
session_start();
include("db.php");

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM teachers
              WHERE email='$email'
              AND password='$password'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['email'] = $email;
        header("Location: dashboard.php");
        exit();
    }
    else
    {
        echo "<script>alert('Invalid Login');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="card">

        <h2>Teacher Login</h2>

        <form method="POST">

            <label>Email</label>
            <input type="email" name="email" required>

            <br><br>

            <label>Password</label>
            <input type="password" name="password" required>

            <br><br>

            <input
                type="submit"
                name="login"
                value="Login"
                class="btn">

        </form>

    </div>

</div>
</body>
</html>