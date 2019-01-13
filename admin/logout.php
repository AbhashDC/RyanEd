<?php
session_start();
session_destroy();  // destroys any kind of session initialized from that browser
header('location: ../index.php'); ?>