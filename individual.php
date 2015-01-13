<?php
session_start();
$cust_id = $_SESSION['sess_custid'];
$movie_id = $_GET['var'];
$_SESSION["sess_movie_id"] = $movie_id; 
?>
<html>
<head>
<title>
Rate The movie 
</title>
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
<img id="poster" src="images/poster.jpg"/>
<form id="toRate" action="insertRating.php" method="POST">
<table cellpadding="5" border="1">
<tr>
<td rowspan="3">
<img src="Movie/<?php echo $movie_id?>.jpg" />
</td>
<td colspan="2" style="font-weight:bold;font-size:2em;">
<?php
mysql_connect('localhost','root','');
mysql_select_db('movie_tickets');

$result = mysql_query("select movie_name from view_rating_movie where movie_id=$movie_id and cust_id=$cust_id");
$found = mysql_num_rows($result);
if($found>0)
{
while($row=mysql_fetch_array($result))
{
echo "<h4><span class='cool-style'>".$row['movie_name']."</span></h4>";
}
}
?>
</td>
</tr>
<tr>
<td colspan="2">
<?php 
mysql_connect('localhost','root','');
mysql_select_db('movie_tickets');

$result = mysql_query("select genre from movie where movie_id=$movie_id");
$found = mysql_num_rows($result);

if($found>0)
{
while($row=mysql_fetch_array($result))
{
echo "<p style='font-style:italic'><span class='cool-style'>".$row['genre']."</span></p>";
}
}

?>
</td>
</tr>
<tr>
<td colspan="2">
<select name="rateMovie" id="rateMovie" class="icon-menu">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
<input class="btn btn-lg btn-primary" type="submit" id="rate" value="Rate!"></input>
</td>
</tr>

</table>
</form>
</div>
<div class="container">
  
  	<hr>
  
  	
	<div class="row">
        <div class="col-lg-12">
        <br><br>
          <p class="pull-right"><a href="index.php">Home</a>&nbsp;&nbsp;&nbsp; Get out of here! &nbsp; <a href="logout.php">Log out</a> </p>
        <br><br>
        </div>
    </div>
</div>
</body>
</html>
