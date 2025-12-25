<?php
if (isset($_POST['color'])) {
    $color = $_POST['color'];
    setcookie("user_color", $color, time() + 3600, "/");
    echo "Cookie has been set! <a href='show_color.php'>See your color</a>";
}
?>
<!DOCTYPE html>
<html>

<body>

    <h2>Select Your Favorite Color</h2>
    <form method="POST" action="">
        <label>Select Color:</label>
        <select name="color">
            <option value="red">Red</option>
            <option value="blue">Blue</option>
            <option value="green">Green</option>
        </select>
        <br><br>
        <button type="submit">Save Color</button>
    </form>
</body>

</html>
Show_color.php
<?php
if (isset($_COOKIE['user_color'])) {
    echo "Your selected color is: " . $_COOKIE['user_color'];
} else {
    echo "No color selected.";
}
?>