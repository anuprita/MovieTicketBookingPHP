<?php

session_start();

mysql_connect('localhost','root','');
mysql_select_db('movie_tickets');
$theater_id=$_GET['var'];
$_SESSION["sess_theater_id"] = $theater_id;
 
?>
<html>
<head>
<title> Theater Name</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/anu.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<link rel="icon" href="images/favicon.ico"/>
</head>
<body>
<div class="container-full">
<img id="poster" src="images/poster.jpg">
<?php  
 $result=mysql_query("SELECT * FROM theater where theater_id = '$theater_id'");
 $found=mysql_num_rows($result);
 
 if($found>0){
    $row=mysql_fetch_array($result);
 }
?>
<div id="theater_details">
<div id="page_title">
<h1> <?php echo $row['theater_name']; ?></h1>
</div>
<div id="info">
<h3> Location: <?php echo $row['location']; ?> </h3>
</div>
</div>
<br/><br/>
<span class="cool-style">
This theater is showing the following movies:
</span>
<br/>
<div id="list4">
<ul>
<?php 
$result2=mysql_query("SELECT DISTINCT m.movie_id,m.movie_name FROM movie_in_theater mt,movie m where mt.movie_id=m.movie_id and theater_id = '$theater_id' and end_date>curdate()");
$found2=mysql_num_rows($result2); 
 if($found2>0){
    $row2=mysql_fetch_array($result2);
	echo "<li><a href='route2.php?var=$row2[movie_id]'><span class='name-style'>$row2[movie_name]</span></a></li>";
 }
else
{
echo "No movie playing at this theater.";
}
?>
 </ul>
 </div>
 </div>
<div class="container">
  
  	<hr>
  
  	
	<div class="row">
        <div class="col-lg-12">
          <p class="pull-right"> <a href="logout.php">Log out.</a> </p>
        </div>
    </div>
</div>
<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
 </body>
</html>