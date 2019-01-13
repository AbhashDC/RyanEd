<?php if (session_status() == PHP_SESSION_NONE) { //checks if the session has started already
    session_start();
    if (!isset($_SESSION['aid'])) { //if admin is not set then it redirects to index page
        header('location: ../index.php');
    }
}
?>