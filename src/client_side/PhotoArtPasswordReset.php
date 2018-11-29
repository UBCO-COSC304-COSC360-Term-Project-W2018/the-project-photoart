<?php
require_once('../server_side/connection.php');
require('../server_side/header.php');
if(isset($_POST) & !empty($_POST)){
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$sql = "SELECT password, email FROM User WHERE username = '$username'";
	$res = mysqli_query($con, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
		$r = mysqli_fetch_assoc($res);
		$password = $r['password'];
		$to = $r['email'];
		$subject = "Your Recovered Password";

		$message = "Please use this password to login " . $password;
		$headers = "From : auto_response@PhotoArt.com";
    // Please specify your Mail Server - Example: mail.yourdomain.com.
ini_set("SMTP","mail.PhotoArt.com");

// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
ini_set("smtp_port","25");

// Please specify the return address to use
ini_set('sendmail_from', 'ValidEmailAccount@YourDomain.com');
		if(mail($to, $subject, $message, "From: auto_response@PhotoArt.com")){
			echo "Your Password has been sent to your email id";
		}else{
			echo "Failed to Recover your password, try again";
		}

	}else{
		echo "User name does not exist in database";
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password in PHP & MySQL</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Please Register</h2>
        <div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">@</span>
		  <input type="text" name="username" class="form-control" placeholder="Username" required>
		</div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Forgot Password</button>
        <a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a>
      </form>
</div>
</body>
</html>
