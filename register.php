<?php
	require('db.php');
// If form submitted, insert values into the database.
	if (isset($_POST['submit'])){
		
		$user_firstname = stripslashes($_REQUEST['user_firstname']);
				// removes backslashes
		$user_firstname = mysqli_real_escape_string($con,$user_firstname);
			//escapes special characters in a string
		$user_lastname = stripslashes($_REQUEST['user_lastname']);
		$user_lastname = mysqli_real_escape_string($con,$user_lastname);
		$username = stripslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($con,$username);
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$user_phone = stripslashes($_REQUEST['user_phone']);
		$user_phone = mysqli_real_escape_string($con,$user_phone);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		$trn_date = date("Y-m-d H:i:s");
		
		$user_check = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
		$result = mysqli_query($con, $user_check);
		$user = mysqli_fetch_assoc($result);

		$user_check2 = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
		$result2 = mysqli_query($con, $user_check2);
		$user2 = mysqli_fetch_assoc($result2);

		if ($user['username'] === $username) {
            echo "<script>alert('Username already exists');</script>";
		} 
		else if ($user2['email'] === $email) {
			echo "<script>alert('Email already exists');</script>";
		}
		else{
			$query = "INSERT into `users` (user_firstname, user_lastname, username, password, email, user_phone, trn_date)
			VALUES ('$user_firstname', '$user_lastname', '$username', '$password', '$email', '$user_phone', '$trn_date')";
			$result = mysqli_query($con,$query);
			
			if($result){
				echo "<div class='form'>
					<h3>You are registered successfully.</h3>
					<br/>Click here to <a href='login.php'>Login</a></div>";
			} else {
				echo "<div class='form'>
				<h3>Something Went Wrong.</h3>";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/main.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/main.js"></script>
</head>

<body>

<!-- +++++++ Groene balk +++++++ -->

<div id="footerdeadzone">PANPAN - The Parcel Service powered by you </div>

<a href='login.php'><img src="img/Logo.png" class="logoindex"></a><span class="logotekst">PANPAN Parcel Service</span><br />
<span class="logotekst2">Secure parcel transfer service on the blockchain</span><br />


<div class="form">
<h1 class="title">Registration</h1>
<form name="registration" action="" method="post" class="register-form">
<input type="text" name="user_firstname" placeholder="First name" required /> <br />
<input type="text" name="user_lastname" placeholder="Last name" required /> <br />
<input type="text" name="username" placeholder="Username" required /> <br />
<input type="email" name="email" placeholder="Email" required /> <br />
<input type="number" name="user_phone" placeholder="Phonenumber" required /> Format: 0498765432 <br />
<input type="password" name="password" placeholder="Password" required /> <p />
<!--<input type="text" name="user_street" id="street" placeholder="Street" required /> <input type="number" name="user_housenumber" id="housenumber" placeholder="N°" required /> <br />
<input type="number" name="user_munic" id="munic" placeholder="Postcode" required />
<input type="text" name="user_city" placeholder="City" required /> <p />-->
<input type="submit" name="submit" value="Register" />
</form>
</div>


</body>
</html>
