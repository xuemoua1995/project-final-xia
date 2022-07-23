<?php
// Initialize the session
include("config/connection.php");
session_start();
unset($_SESSION['username']);
session_destroy();
header("Location: index.php");
?>