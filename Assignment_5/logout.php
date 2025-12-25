<?php
include("session_protect.php");

// Only admin can access this page
if ($_SESSION['role'] !== "admin") {
    die("Access Denied! Only Admins can view this page.");
}
?>

<h2>Admin Panel</h2>
<p>Only admin users can see this page.</p>
<a href="dashboard.php">Back</a>
