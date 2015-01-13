<?php
$movie_name=$_POST['movie_name'];
$rating=$_POST['rating'];
$director=$_POST['director'];
$release=$_POST['release'];
$dur=$_POST['dur'];
$genre=$_POST['genre'];
$theater_name=$_POST['theater_name'];
$seats=$_POST['seats'];
$start=$_POST['start'];
$end=$_POST['end'];
$ids=$_POST['ids'];
$username="root";
$password="";
$database="movie_tickets";
$server="localhost";

$db_con = mysqli_connect($server, $username, $password,$database);


if ($db_con) {
	
	$query='insert into movie(movie_name,rating,director,release_date,duration,genre) values("'.$movie_name.'","'.$rating.'","'.$director.'","'.$release.'",'.$dur.',"'.$genre.'")';
	if (mysqli_query($db_con, $query)) {
		
		//add to theater
		$theaterID;
		$theater_query='select theater_id from theater where theater_name like "'.$theater_name.'"';
		$theatre_exec=mysqli_query($db_con,$theater_query);
		
		while($t=mysqli_fetch_array($theatre_exec)){
		$theaterID=$t['theater_id'];
		}
		
			$movieID;
		$m_query='select movie_id from movie where movie_name like "'.$movie_name.'"';
		$m_exec=mysqli_query($db_con,$m_query);
		
		while($m=mysqli_fetch_array($m_exec)){
		$movieID=$m['movie_id'];
		}
		foreach($ids as $times){
		$tInt=getShowInt($times);
		$query2='insert into movie_in_theater values('.$movieID.','.$theaterID.','.$tInt.',"'.$start.'","'.$end.'",'.$seats.');';
		if(mysqli_query($db_con, $query2))
		{
		}
		else {
			echo "Error: ".$query2."<br>" . mysqli_error($db_con);
		}
		}
		echo "Movie ".$movie_name." added successfully in theater ".$theater_name;
	} 
	else {
		echo "Error: " . $query . "<br>" . mysqli_error($db_con);
	}
	
	
}
else{
echo "Error in DB";
mysqli_error($db_con);
}

function getShowInt($showString)
{
$timeInt;
if (strcmp($showString,'9am')==0)
$timeInt=1;
else if (strcmp($showString,'12pm')==0)
$timeInt=2;
else if (strcmp($showString,'3pm')==0)
$timeInt=3;
else if (strcmp($showString,'6pm')==0)
$timeInt=4;
return $timeInt;
}


?>