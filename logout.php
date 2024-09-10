<?php
session_start();

if (isset($_SESSION["username"])) {
    // Unset all session variables
    $_SESSION = [];

    // Destroy the session cookie
    

    // Finally, destroy the session
    session_destroy();
}

header("Location: http://localhost/FINAL/login_page.php");
exit;
?>