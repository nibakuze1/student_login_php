
<?php
session_start();

$studentName = $_COOKIE['student_name'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentName = trim($_POST['student_name'] ?? '');

    if ($studentName !== '') {
        // Store the name in a session
        $_SESSION['student_name'] = $studentName;

        // Remember the name for 7 days
        setcookie(
            "student_name",
            $studentName,
            time() + (7 * 24 * 60 * 60),
            "/"
        );

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Please enter your name.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Login</title>
</head>
<body>
    <h2>Student Login</h2>

    <?php if (isset($error)): ?>
        <p style="color:red;">
            <?= htmlspecialchars($error) ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label>Enter your name:</label>

        <input
            type="text"
            name="student_name"
            value="<?= htmlspecialchars($studentName, ENT_QUOTES, 'UTF-8') ?>"
            required
        >

        <button type="submit">Login</button>
    </form>
</body>
</html>
