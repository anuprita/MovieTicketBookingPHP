<?php
	//Start session
	session_start();
	function clean($str) 
	{
		$str = @trim($str);
		if(get_magic_quotes_gpc()) 
		{
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	$username = clean($_POST['username']);
	$password = clean($_POST['password']);
	
	/*Connecting to MySQL*/
	$con=mysqli_connect("localhost","root","","movie_tickets"); 
	$username = mysql_real_escape_string($username);
	$query = "SELECT cust_id, cust_name, password, salt FROM customer WHERE email_id = '$username'";
	$result = mysqli_query ($con,$query);
	echo $query;
	if($result->num_rows == 0)
	{
		echo "no rows found";
		header('Location: Login.php');
		exit();
	}

	$userData = mysqli_fetch_array($result);
	$hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
	mysqli_close($con);

	if($hash != $userData['password'])
	{
		echo "password did not match";
		header('Location: Login.php');
		exit();
	}
	else
	{ // Redirect to home page after successful login.
	if($username=='admin')
	{
	session_regenerate_id(); //recommended since the user session is now authenticated
		$_SESSION['sess_custid'] = $userData['cust_id'];
		$_SESSION['sess_username'] = $userData['cust_name'];
		session_write_close();
		header('Location: addMovies.php');
	}
	else
	{
		echo "Welcome";
		session_regenerate_id(); //recommended since the user session is now authenticated
		$_SESSION['sess_custid'] = $userData['cust_id'];
		$_SESSION['sess_username'] = $userData['cust_name'];
		session_write_close();
		header('Location: index.php');
	}
	}
 
?>