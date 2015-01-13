<?php

session_start();

mysql_connect('localhost','root','');
mysql_select_db('movie_tickets');
$movie_id=$_GET['var'];
$_SESSION["sess_movie_id"] = $movie_id;
 
?>
<html>
<head>
<title> Movie Name</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/anu.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
		</script>
<link rel="icon" href="images/favicon.ico"/>
	
</head>
<body>
<div class="container-full">
<?php  
 $result=mysql_query("SELECT * FROM movie where movie_id = '$movie_id'");
 $found=mysql_num_rows($result);
 
 if($found>0){
    $row=mysql_fetch_array($result);
 }
?>
<table id="movie_table" cellpadding="5">
<tr>
<td rowspan="3">
<h1> <?php echo $row['movie_name']; ?> &nbsp; (<?php echo $row['genre']; ?>)</h1>
<div class="image_size"><img src="Movie/<?php echo $row['movie_id'];?>.jpg"/></div>
</td>
<td colspan="2" style="font-weight:bold;font-size:2em;">
<div id="info">
<h3> Director: <?php echo $row['director']; ?> </h3>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<h4> Duration: <?php echo $row['duration']; ?> mins</h4>
<h2 id="ratingCircle"> <?php echo $row['rating']; ?></h2>
</div>
</td>
</tr>
</table>
<br/><br/>
<span class="cool-style">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This movie is playing at the following locations:
</span>
<br/>
<div id="list4">
<ul>
<?php 
$result2=mysql_query("SELECT DISTINCT t.theater_id,t.theater_name,t.location FROM movie_in_theater mt,theater t where mt.theater_id=t.theater_id and movie_id = '$movie_id' and end_date>curdate()");
$found2=mysql_num_rows($result2);
 
 if($found2>0){
    while($row2=mysql_fetch_array($result2)){
	echo "<li><a href='route.php?var=$row2[theater_id]'><span class='name-style'>$row2[theater_name]</span> <br/> <span class='cool-style'>$row2[location]</span></a></li>";
 }
 }
else
{
echo "No theater playing this movie.";
}
?>
 </ul>
 </div>
 </div>
 <div class="row">
        <div class="col-lg-12">
        <br><br>
          <p class="pull-right">Lost? <a href="index.php">Search Again &nbsp; </a>Feeling bored? &nbsp;<a href="logout.php">Logout</a></p>
        <br><br>
        </div>
    </div>
</body>
</html>