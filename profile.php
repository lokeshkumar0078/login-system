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
	<title>Your profile</title>
	
	<style type="text/css">


html,body{
height:100%;
}
body{
	background-color:lightblue;
	background-image:url(space.jpg);
	background-position:center;
	background-size:cover;
	background-blend-mode:light;
}
.about{
	color:white;
	font-size:20pt;
	font-family:comic sans ms;
}

	</style>
	</head>
	
	<body>
	
			
		<table align="center" cellspacing="20px">
			<tr >
			<td class="about" >Name:</td>
			<td class="about"><?php echo $row['Name'];?></td>
			</tr>
			<tr >
			<td class="about">Phone:</td>
			<td class="about"><?php echo $row['phone'];?></td>
			</tr>
			<tr >
			<td class="about">Email:</td>
			<td class="about"><?php echo $row['Email'];?></td>
			</tr>
				
	
		</table>
	</body>
</html>
<?php
}
else
    header('location:login.php');

mysqli_close($con);
?>