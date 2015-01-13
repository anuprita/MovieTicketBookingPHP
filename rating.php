<?php 
session_start();
?>
<html>
<head>
<title>Rate a movie</title>
<link href="css/anu.css" type="text/css" rel="stylesheet"/>
<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
		</script>
			<link rel="icon" href="images/favicon.ico"/>
</head>
<body>

<div class="container-full">
<img id="poster" src="images/poster.jpg">
		<br/><br/><br/>
<?php echo "<h3>Hi ".$_SESSION["sess_username"].", Rate your movies here!</h3>"; ?>
<br/><br/><br/>
<p> <h3>List of movies you've seen with us...</h3></p>
<div id="list4">
<ul class="numberedList">

<?php
$cust_id = $_SESSION['sess_custid'];

mysql_connect('localhost','root','');
mysql_select_db('movie_tickets');

$result = mysql_query("select * from view_rating_movie where cust_id=$cust_id");
$found = mysql_num_rows($result);

if($found>0)
{
while($row=mysql_fetch_array($result))
{
$exist = mysql_query("select * from movie_rating where cust_id=$cust_id and movie_id=$row[movie_id]");
if(mysql_num_rows($exist)>0)
{
$rate = mysql_fetch_array($exist);
echo "<li><a href='#'> <span class='name-style'>$row[movie_name]</span> &nbsp;&nbsp;&nbsp;  <span class='date-style'> You gave:  $rate[rating] / 5</span></a></li>"; 
}
else
{
echo "<li><a href='individual.php?var=$row[movie_id]'> <span class='name-style'>$row[movie_name]</span> &nbsp;&nbsp;&nbsp;  <span class='date-style'> Watched On:  $row[date]</span></a></li>";
}
}
}
?>

</ul>
</div>
</div>
<div class="container">
  
  	<hr>
  
  	
	<div class="row">
        <div class="col-lg-12">
          <p class="pull-right"><a href="index.php">Home</a> &nbsp;&nbsp; <a href="logout.php">Log out.</a> </p>
        </div>
    </div>
</div>
</body>
</head>
</html>