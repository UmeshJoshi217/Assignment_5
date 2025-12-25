<?php
if (isset($_COOKIE['user_color'])) {
    echo "Your selected color is: " . htmlspecialchars($_COOKIE['user_color']);
} else {
    echo "No color selected. Please go back and choose a color.";
}
?>
