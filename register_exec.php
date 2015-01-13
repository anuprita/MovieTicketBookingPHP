<?php

function redirect()
	{
		header('Location: register.php');
		exit();
	}
// a function to clean data before use
function clean($str) 
	{
		$str = @trim($str);
		if(get_magic_quotes_gpc()) 
		{
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//assign values to local variables
	$name = clean($_POST['name']);
	$password = clean($_POST['password']);
	$email = clean($_POST['email']);
	$phone = clean($_POST['phone']);
	$confirm = clean($_POST['confirm']);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
		redirect();
	}
	 if($password!=$confirm)
	{
		redirect();
	}
	
	if(strlen($phone) < 10)
	{
		redirect();
	} 
	
	
	
	$salt = mcrypt_create_iv(8, MCRYPT_DEV_URANDOM);
	$hash = hash('sha256', $salt . hash('sha256', $password) );
	
	//actual mysql connection
	$con=mysqli_connect("localhost","root","","movie_tickets"); 
	if(!$con)
	{
	die("connection failed: ".mysqli_connect_error());
	}
	$query = "INSERT INTO customer(cust_name,email_id,password,salt,phone_no) values('$name','$email','$hash','$salt','$phone');";
	$result = mysqli_query ($con,$query);
	
	if($result)
	{
		header('Location: login.php');
	}
	else
	{
		header('Location: register.php');
		exit();
	}
	
	
	?>