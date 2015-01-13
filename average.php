<?php
mysql_connect('localhost','root','');
mysql_select_db('movie_tickets');
 $result=mysql_query("select m.movie_id,movie_name,round(avg(r.rating)) as avg from movie_rating r,movie m where m.movie_id=r.movie_id group by r.movie_id order by avg desc;");
 $found=mysql_num_rows($result);
?>

<html>
<head>
<title>
Highest User Rated Movies
</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/anu.css" type="text/css" rel="stylesheet"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link rel="icon" href="images/favicon.ico"/>
</head>
<body>
<div class="container-full">
<img id="poster" src="images/poster.jpg"/>
<h1 class="cool-style">
Top Rated Movies</h1>
<br/><br/>
<div id="list4">
<ol class="labels-list">
<?php 
 if($found>0){
    while($row=mysql_fetch_array($result)){
    echo "<li><a href='moviehome.php?var=$row[movie_id]'><span class='name-style'>$row[movie_name]</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src='images/star$row[avg].jpg'></a></li>";
    }
	}	
	?>
</ol>	
	</div>
	
</div>	
<div class="container">
  
  	<hr>
  
  	
	<div class="row">
        <div class="col-lg-12">
        
          <p class="pull-right"><a href="index.php">Home</a> &nbsp;&nbsp;&nbsp; <a href="logout.php">Log out.</a> </p>
        
        </div>
    </div>
</div>
</body>
</html>