<html>
<head>
<title>
Search Results
</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/anu.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
		</script>
			<link rel="icon" href="images/favicon.ico"/>
		
</head>
<body>

<?php
mysql_connect('localhost','root','');
mysql_select_db('movie_tickets');
$title=$_POST['title'];
?>

<div class="container-full">
<div id="list4">
<h2> Movie Results </h2>
<ul>
 
<?php  
 $result=mysql_query("SELECT movie_id,movie_name FROM movie where movie_name like '%$title%'");
 $found=mysql_num_rows($result);
 
 if($found>0){
    while($row=mysql_fetch_array($result)){
    echo "<li><a href='moviehome.php?var=$row[movie_id]'><span class='name-style'>$row[movie_name]</span><input id='movie_id' type='hidden' value='$row[movie_id]'></input></a></li>";
    }  
 }else{
    echo "<li>No Movie Found<li>";
 }

?>

</ul>
</div>

<br/><br/><br/>
<hr/>
<div id="list4">
<h2> Theater Results </h2>
<ul>
 
<?php  
 $result2=mysql_query("SELECT theater_id,theater_name FROM theater where theater_name like '%$title%'");
 $found2=mysql_num_rows($result2);
 
 if($found2>0){
    while($row2=mysql_fetch_array($result2)){
    echo "<li><a href='theaterhome.php?var=$row2[theater_id]'><span class='name-style'>$row2[theater_name]</span></a></li>";
    }  
 }else{
    echo "<li>No Theater Found<li>";
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