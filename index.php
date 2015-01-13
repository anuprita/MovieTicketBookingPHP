<?php
	//Start session
	session_start();	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Welcome to Ticket Machine</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
		</script>
		<link rel="icon" href="images/favicon.ico"/>
	</head>
	<body>
<div class="container-full">

	<?php
	if(isset($_SESSION["sess_username"]))
	echo "<h3>Welcome ".$_SESSION["sess_username"]."</h3>";
	else
	echo "<h3>Welcome Guest, <a href='login.php'>Please Login to book a Ticket</a>";
	?>
      <div class="row">
       
        <div class="col-lg-12 text-center v-center">
          <img id="poster" src="images/poster.jpg"/>
          <h1>Buy Movie Tickets</h1>
          <p class="lead">Start searching!</p>
          
          <br><br><br>
          
          <form class="col-lg-12" action="search.php" method="POST">
            <div class="input-group" style="width:340px;text-align:center;margin:0 auto;">
            <input name="title" id="search" class="form-control input-lg" placeholder="Search for a movie or theater" type="text">
              <span class="input-group-btn"><button id="button" class="btn btn-lg btn-primary" type="submit">OK</button></span>
            </div>
          </form>
        </div>
        
      </div> <!-- /row -->
		

 <div class="row">
       
        
<ul id="result"></ul>      
      </div>
  
  	<br><br><br><br><br>

</div> <!-- /container full -->

<div class="container">
  
  	<hr>
  
  	<div class="row">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading"><a href="rating.php"><h3>My Movies</h3></a></div>
            <div class="panel-body">See which movies you've watched with us and be able to rate them.
            </div>
          </div>
        </div>
      	<div class="col-md-4">
        	<div class="panel panel-default">
            <div class="panel-heading"><a href="average.php"><h3>Top Rated</h3></a></div>
            <div class="panel-body">Top Movies based on user ratings.
            </div>
          </div>
        </div>
      	<div class="col-md-4">
        	<div class="panel panel-default">
            <div class="panel-heading"><a href="slideshows.html"><h3>Coming soon</h3></a></div>
            <div class="panel-body">Posters of movies coming in the future.
            </div>
          </div>
        </div>
    </div>
  
	<div class="row">
        <div class="col-lg-12">
        <br><br>
          <p class="pull-right"><a href="logout.php">Log Out</a></p>
        <br><br>
        </div>
    </div>
</div>


	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>