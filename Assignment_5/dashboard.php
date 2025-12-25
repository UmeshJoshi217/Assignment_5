<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Welcome, <?php echo $_SESSION["username"]; ?>!</h2>
<p>Your role: <strong><?php echo $_SESSION["role"]; ?></strong></p>

<nav>
    <a href="admin_page.php">Admin Page</a> |
    <a href="student_page.php">Student Page</a> |
    <a href="logout.php">Logout</a>
</nav>

</body>
</html>
admin_page.php
<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION["role"] !== "admin") {
    echo "<h2>Access Denied! Admins only.</h2>";
    exit;
}
?>

<h2>Admin Dashboard</h2>
<p>Only admin users can see this content.</p>
Student_page.php
<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION["role"] !== "student" && $_SESSION["role"] !== "admin") {
    echo "<h2>Access Denied!</h2>";
    exit;
}
?>

<h2>Student Page</h2>
<p>This page is visible to students and admins.</p>
