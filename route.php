<?php
session_start();
$var = $_GET['var'];
$_SESSION['sess_theater_id'] = $var;
header('Location: bookMovie.php');
?>