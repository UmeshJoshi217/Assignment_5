<?php
session_start();
if (isset($_GET['reset'])) {
    unset($_SESSION['visit_count']);
}
if (isset($_SESSION['visit_count'])) {
    $_SESSION['visit_count']++;
} else {
    $_SESSION['visit_count'] = 1;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Session Visit Counter</title>
</head>
<body>

<h2>Session Visit Counter</h2>

<p>
    You have visited this page 
    <strong><?php echo $_SESSION['visit_count']; ?></strong> 
    times in this session.
</p>

<a href="?reset=true">
    <button>Reset Counter</button>
</a>

</body>
</html>
