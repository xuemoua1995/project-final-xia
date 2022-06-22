<?php
// Initialize the session
include("config/connection.php");
$_SESSION = ['username'];
session_destroy();
header("Location: index.php");
?>