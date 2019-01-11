<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if (!isset($_SESSION['aid'])) {
        header('location: ../index.php');
    }
    if (!isset($_SESSION['type'])) {
        header('location: index.php');
    }
}
?>