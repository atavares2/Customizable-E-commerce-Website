<html>
	<head>
		<title> Registration Page </title>
	</head>
	<body>
		<form action='registration.php' method='POST'>
			<table width='500' border='10' align='center'>
				<tr>
					<td align='center' colspan='5'><h2>Registration</h2></td>
				</tr>
				<tr>
					<td align='center'> Email:</td>
					<td><input type='email' name='email' /></td>
				</tr>
				<tr>
					<td align='center'> User Name:</td>
					<td><input type='text' name='name' /></td>
				</tr>
				<tr>
					<td align='center'> Password:</td>
					<td><input type='password' name='pass' /></td>
				</tr>
				<tr>
					<td align='center'> Confirm Password:</td>
					<td><input type='password' name='confirm_pass' /></td>
				</tr>
				<tr>
					<td align='center' colspan='3'><input type='submit' name='register' value='Submit' /></td>
					
				</tr>
		</form>
		<p align='center'> Already have an account? <a href="login.php"> Click here to login. </a> </p>
	</body>
</html>
<?php
	
	//Variables
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "root";
	$dbname = "user_information";
	
	$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	//Check for Failure
	if(mysqli_connect_errno()){
		echo "Failed to connnect to MySQL: " . mysqli_connect_errno();
	}
	
	//Checks if login is set.
	if(isset($_POST['register'])){
		//Check that passwords match
		if(!$_POST['pass'] == $_POST['confirm_pass']){
			echo "Passwords do not match <br>";
			return;
		}
	
		$user_email = $_POST['email'];
		$user_name = $_POST['name'];
		$user_pass = $_POST['pass'];	
	}
	
	
	
	$add_user = "INSERT INTO login_information (user_name, user_pass, user_email) VALUES ($user_name, $user_pass, $user_email)";
	
	$attempt_add = mysqli_query($con, $add_user);
	
	if($attempt_add === TRUE){
		echo "Successful! <script>alert('Added User')</script>";
		echo "<script>webpage.open('home.php', '_self');</script>";
	}
	else{
		echo "Failed to add new user.";
	}
	
?>
