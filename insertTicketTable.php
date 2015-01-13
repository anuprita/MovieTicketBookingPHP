<?php

$userID=$_POST["customerID"];
$movieID=$_POST['movieID'];
$theaterID=$_POST['theaterID'];
$time=$_POST['time'];
$date=$_POST['dateToWatch'];
$cost=$_POST['totalCost'];

$username="root";
$password="";
$database="movie_tickets";
$server="localhost";

$db_con = mysqli_connect($server, $username, $password,$database);

//$updateSeats=
if ($db_con) {
	
	$ticket_sql='insert into ticket(cust_id,theater_id,movie_id,date,time_slot,cost) values('.$userID.','.$theaterID.','.$movieID.',"'.$date.'",'.$time.','.$cost.')';
	if (mysqli_query($db_con, $ticket_sql)) {
		echo " Your Ticket is confirmed for $date.";
		//write the query to update no_seats
		$noSeats=$cost/20;
		$seatsUpdate='update movie_in_theater set total_seats=(total_seats-'.$noSeats.') where movie_id='.$movieID.' and theater_id='.$theaterID.' and time_slot='.$time.';';
		if(mysqli_query($db_con, $seatsUpdate))
		{
		echo "";	
		}
		else {
			echo "Error: " . $seatsUpdate . "<br>" . mysqli_error($db_con);
		}
	} else {
		echo "Error: " . $ticket_sql . "<br>" . mysqli_error($db_con);
	}
	
	
}


?>