<?php

$time=htmlspecialchars($_POST["time"]);
$seats=htmlspecialchars($_POST["seats"]);
session_start();
//if(isset($_SESSION["sess_movie_id"])||isset($_SESSION["sess_custid"])||isset($_SESSION["sess_theater_id"])){
	$movie=$_SESSION["sess_movie_id"];
	$user=$_SESSION["sess_custid"];
	$theater=$_SESSION["sess_theater_id"];
	

?>
<html>
<head>
<title>Confirm Ticket</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
 
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

  <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/anu.css" type="text/css" rel="stylesheet"/>
		<link rel="icon" href="images/favicon.ico"/>
</head>
<body>
<div class="container-full">
<img id="poster" src="images/poster.jpg"/>
<div id="center_of_page">
<?php
//echo $time;
//echo "ss".$seats;

$username="root";
$password="";
$database="movie_tickets";
$server="localhost";

$db_con = mysqli_connect($server, $username, $password,$database);

$mNAME;
$tNAME;
if ($db_con) {
	$MOVIE_SQL = 'select MOVIE_NAME from movie where movie_ID ='.$movie;
	$MOVIEname = mysqli_query($db_con,$MOVIE_SQL);
	while($r=mysqli_fetch_array($MOVIEname)){
		//echo "m".$r['MOVIE_ID'];
		$mNAME=$r['MOVIE_NAME'];
	
	}
	$theater_SQL='select THEATER_NAME from theater where theater_ID ='.$theater;
	$theatername=mysqli_query($db_con,$theater_SQL);
	while($t=mysqli_fetch_array($theatername)){
		$tNAME=$t['THEATER_NAME'];
		
	}
	$movie_th_sql="select s.movie_id, s.theater_id, s.total_seats, s.time_slot, t.theater_name,
			t.location from movie_in_theater s inner join theater t
on t.theater_id=s.theater_id AND s.movie_id=".$movie." and t.theater_id=".$theater.";";

	$details=mysqli_query($db_con,$movie_th_sql);
	while($mt_id=mysqli_fetch_array($details)){
if($time==$mt_id['time_slot'])
{
	if($mt_id['total_seats']>=$seats){
       $cost=$seats*10;
		echo "<p>Date: <input type='text' id='datepicker'>&nbsp;&nbsp;&nbsp;&nbsp; Cost:$".$cost."</p>";
		echo "<button id='billConfirm' class='btn btn-lg btn-primary'>Generate Bill</button>";
		
	}
	else if ($mt_id['total_seats']!=0 && $mt_id['total_seats']<$seats){
		echo "<p>Only ".$mt_id['no_seats']."SEATS available.</p>";
		echo "<a href='bookMovie.php'>BACK</a>";
	}
	else if ($mt_id['total_seats']==0){
		echo "<p>NO seats available!</p>";
	}
}

}

}
else{
	echo "Database NOT found ";
	mysqli_error($db_con);
}




?>
<div  id="confirmComplete"></div>
<script type="text/javascript">
            $(document).ready(function(){
	  $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd',minDate:0 });
	    $( "#datepicker" ).datepicker();
  $("#billConfirm").click(function(){
	var dateChosen = $('#datepicker').val();
  $.ajax({
		data:{'customerID':<?php echo $user;?>,'theaterID':<?php echo $theater;?>,'movieID':<?php echo $movie;?>,'time':<?php echo $time;?>,'dateToWatch': dateChosen,'totalCost':<?php echo $cost;?>},
	url:'insertTicketTable.php',
		type:"POST",
			success:function(response)
			{
				$("#confirmComplete").html(response);
			},
			error : function(){
				alert('Error in script');
				}

		});
	  });
	  });
  </script>
  
  </div>
  </div>
  <div class="container">
  
  	<hr>
  
  	
	<div class="row">
        <div class="col-lg-12">
        <br><br>
          <p class="pull-right"><a href="index.php">Home</a> &nbsp;&nbsp; Get out of here! &nbsp; <a href="logout.php">Log out</a> </p>
        <br><br>
        </div>
    </div>
</div>
</body>
</html>