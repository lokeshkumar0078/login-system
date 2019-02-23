<?php
	session_start();
	$user=$_REQUEST['user'];
	$phone=$_REQUEST['ph'];
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	$gender=$_REQUEST['gender'];
	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'brainwarmup');
	$q="insert into users(Name,phone,Email,password,gender) values ('$user','$phone','$email','$password','$gender')";
	
	mysqli_query($con,$q);
	

	if($_SESSION['ph']==true)
{	$phone=$_SESSION['ph'];
?>
<html>
	<head>
	<title>Home:Brain-warm-up</title>
	<link rel="stylesheet" type="text/css" href="mycss.css">
	</head>
	
	<body>
	
	<div class="heading1">
		<div class="navigationDesktop">
            <nav>
                <ul>
                    <li><a href="profile.php">Your Profile</a></li>
                    <li><a href="#">Settings</a>
						<ul>
                        <li><a href="update.php">Change Profile</a></li>
                        <li><a href="changepassword.php">Change Password</a></li>
						</ul>
                    </li>
                    <li><a href="logout.php">Log out</a>
                    </li>
                    <li><a href="about.html">About</a></li>
                </ul>
            </nav>
			</div>
		<span class="title7">Hello <?php echo $user; ?>You are successfully registered.</span>
		
		
		
	</div>
	</body>
</html>
<?php
}
else
    header('location:login.php');

mysqli_close($con);
?>
