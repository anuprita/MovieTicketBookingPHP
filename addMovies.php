<!DOCTYPE HTML>
<html>
<head><title>Admin adding movies</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
		</script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
<link href="css/anu.css" type="text/css" rel="stylesheet"/>
	<link rel="icon" href="images/favicon.ico"/>
</head>

<body>
<div class="container-full">
<img id="poster" src="images/poster.jpg">

<?php 
session_start();
$_SESSION['sess_custid'] = 0;
if(isset($_SESSION['sess_custid']))
{
$admin=$_SESSION['sess_custid'];
if($admin==0)
{
echo "<table><tr>
<td>Movie Name :</td><td><input type='text' id='mov_name'/></td></tr>
<tr><td>Rating :</td><td><input type='text' id='mov_rating'/></td></tr>
<tr><td>Director :</td><td><input type='text' id='director'/></td></tr>
<tr><td>Release Date :</td><td><input type='text' id='rel_date'/></td></tr>
<tr><td>Duration :</td><td><input type='text' id='dur'/></td></tr>
<tr><td>Genre :</td><td><input type='text' id='genre'/></td></tr>
<tr><td>Theater Name :</td><td><input type='text' id='theater_name'/></td></tr>
<tr><td>Total seats :</td><td><input type='text' id='total_seats'/></td></tr>
<tr><td>Start Date : </td><td><input type='text' id='start'/></td></tr>
<tr><td>End Date :</td><td><input type='text' id='end'/></td></tr>
<tr><td>Time Slot : </td><td><div id='c_b'><input type='checkbox' name='time' value='9am'/> 9am<br>
<input type='checkbox' name='time' value='12pm'/> 12pm<br>
<input type='checkbox' name='time' value='3pm'/> 3pm<br>
<input type='checkbox' name='time' value='6pm'/> 6pm </td></tr></div>
<tr><td colspan=2><input type='submit' class='btn btn-lg btn-primary' value='Complete Adding a movie' id='submit'/></td></tr></table>";

}
else
{
echo "You are not authorized to view this page.";
}

}
else
{
echo "Please login to continue.";
}
 ?>


<script type="text/javascript">
$(document).ready(function() {
$("#submit").click(function(){
alert("Got it");
var movie_name=$("#mov_name").val();
var rating=$("#mov_rating").val();
var director=$("#director").val();
var release=$("#rel_date").val();
var dur=$("#dur").val();
var genre=$("#genre").val();
var theater_name=$("#theater_name").val();
var seats=$("#total_seats").val();
var start=$("#start").val();
var end=$("#end").val();
 var allVals = [];
     $('#c_b :checked').each(function() {
       allVals.push($(this).val());
     });

$.ajax({
url: 'addMovieDB.php',
type: 'POST',
data:{
'movie_name':movie_name,
'rating':rating,
'director':director,
'release':release,
'dur':dur,
'genre':genre,
'theater_name':theater_name,
'seats':seats,
'start':start,
'end':end,
'ids':allVals
},
success:function(response){
$("#message").html(response);

},
error: function()
{
$("#message").html(response);
}
});
});
});
</script>




<div id="message"></div>
</div>

<div class="container">
  
  	<hr>
  
  	
	<div class="row">
        <div class="col-lg-12">
        <br><br>
          <p class="pull-right"><a href="adminhome.html">Back to Main Page</a> &nbsp;&nbsp;&nbsp; Job Done? &nbsp; <a href="logout.php">Logout.</a> </p>
        <br><br>
        </div>
    </div>
</div>
</body>
</html>