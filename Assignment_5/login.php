<?php
session_start();
include "users.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (isset($users[$username]) && $users[$username]["password"] === $password) {
        $_SESSION["username"] = $username;
        $_SESSION["role"] = $users[$username]["role"];

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Login</h2>

<form method="POST">
    <label>Username:</label> <br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>

<p style="color:red;"><?php echo $error; ?></p>

</body>
</html>
Logout.php
<?php
session_start();
session_unset();
session_destroy();

header("Location: login.php");
exit;
?>

