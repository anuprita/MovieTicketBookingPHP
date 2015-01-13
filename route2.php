<?php
session_start();
$var = $_GET['var'];
$_SESSION['sess_movie_id'] = $var;
header('Location: bookMovie.php');
?>