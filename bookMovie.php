<html>
<head>
<title>Booking Details</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/anu.css" type="text/css" rel="stylesheet"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link rel="icon" href="images/favicon.ico"/>
		<?php
if(isset($_SESSION["sess_movie_id"])||isset($_SESSION["sess_custid"])||isset($_SESSION["sess_theater_id"])){
	$movie=$_SESSION["sess_movie_id"];
	$user=$_SESSION["sess_custid"];
	$theater=$_SESSION["sess_theater_id"];

$username="root";
$password="";
$database="movie_tickets";
$server="localhost";

//Connection to the database using mysqli
$db_con = mysqli_connect($server, $username, $password,$database);

$mNAME;
$tNAME;
if ($db_con) {
	$MOVIE_SQL = 'select MOVIE_NAME from movie where movie_ID ='.$movie;
	$MOVIEname = mysqli_query($db_con,$MOVIE_SQL);
	while($r=mysqli_fetch_array($MOVIEname)){
	$mNAME=$r['MOVIE_NAME'];

	}

	
	

	
	$theater_SQL='select theater_NAME from theater where theater_ID ='.$theater;
	$theatername=mysqli_query($db_con,$theater_SQL);
	while($t=mysqli_fetch_array($theatername)){
		$tNAME=$t['theater_NAME'];
	}
	
}
else{
	echo "Database NOT found ";
	mysqli_error($db_con);
}
}
	function getShowTime($slot){
	
		if($slot==1)
			$showString='9 am';
		else if ($slot==2)
			$showString='12 pm';
		else if ($slot=3)
			$showString='3 pm';
		else if ($slot=4)
			$showString='6 pm';
	
		return $showString;
	
	}
	
	
	

	
	?>




</head>
<body>
<div class="container-full">
<img id="poster" src="images/poster.jpg"/>
<div id="bookDetails">

<br/><br/><br/>	
	<div id='detailsOptions'>
	<form action='confirmTicket.php' method='post'>
<table>
<tr>
<td> <span class="cool-style">Select Time Slot</span> </td>
<td> &nbsp;&nbsp; </td>
<td> <span class="cool-style">Select Number of Seats</span> </td>
</tr>
<tr>
<td>	
	<select name='time' id='time'>
		<option value='1'>9 am</option>
			<option value='2'>12 pm</option>
			<option value='3'>3 pm</option>
			<option value='4'>6 pm</option>
	</select>
</td>

<td>&nbsp; &nbsp; </td>
<td>	
	<select name='seats' id='seats'>
		<option value='1'>1</option>
			<option value='2'>2</option>
			<option value='3'>3</option>
			<option value='4'>4</option>
			<option value='4'>5
			</option></select>
	</td>
	</tr>
	<tr><td><br/><br/><br/><br/></td><td><br/><br/><br/><br/></td></tr>
	<tr>
	
	<td colspan=3>
	<input type='submit' value='BOOK TICKET' class='btn btn-lg btn-primary'></input>
	</td>
	</tr>
	</table>
</form>
</div>
		


</div>
</div>
<div class="container">
  
  	<hr>
  
  	
	<div class="row">
        <div class="col-lg-12">
        
          <p class="pull-right">Want to find something else? &nbsp;<a href="index.php">Back to Search page</a> &nbsp; Changed your mind? &nbsp; <a href="register.html">Logout.</a> </p>
        <br><br>
        </div>
    </div>
</div>
</body>
</html>