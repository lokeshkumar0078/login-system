<?php
session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'brainwarmup');
	
if($_SESSION['ph']==true)
{	$phone=$_SESSION['ph'];
	$q="select * from users where phone='$phone'";
	 $query=mysqli_query($con,$q);
    $rowcount=mysqli_num_rows($query);
	$row=mysqli_fetch_array($query);
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
		<span class="title7">Hello <?php echo $row['Name']; ?>You are successfully logged in</span>
		
		
		
	</div>
	
	</body>
</html>
<?php
}
else
    header('location:login.php');

mysqli_close($con);
?>


