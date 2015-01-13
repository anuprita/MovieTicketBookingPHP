<?php
session_start();
$rating = $_POST['rateMovie'];
mysql_connect('localhost','root','');
mysql_select_db('movie_tickets');
$movie_id = $_SESSION["sess_movie_id"];
$cust_id = $_SESSION["sess_custid"];
$result = mysql_query("insert into movie_rating values($cust_id,$movie_id,$rating)");
if($result)
{
header('Location: rating.php');
}
else
{
echo "error inserting";
}
?>


