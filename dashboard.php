
<?php
session_start();

if (!isset($_SESSION['student_name'])) {
    header("Location: login.php");
    exit();
}

$studentName = $_SESSION['student_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
</head>
<body>
    <fieldset>
   <h2><b>Student Login</h2>


    <p><b>
        Student Name:
        <strong><?= htmlspecialchars($studentName, ENT_QUOTES, 'UTF-8') ?></strong>!
</b>
    </p>

<p style="color: green; font-size: 18px; font-weight: bold;"><i>You Are successfully logged in.<strong><?= htmlspecialchars($studentName, ENT_QUOTES, 'UTF-8') ?></strong>!</i></p>

    <a href="logout.php">Logout</a>
    </fieldset>
 
</body>
</html>
