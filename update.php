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
<!DOCTYPE html>
<html>
	<head>
	<title>Update your profile</title>
	<link rel="stylesheet" type="text/css" href="mycss.css">
	
	<script>
		function validation()
		{
			var result=true;
			var i=document.getElementById("ph").value;
			if(i.length==10)
			result=true;
			else
			{result=false;
			alert("Please enter valide Phone number!");
			}
			var e=document.getElementById("email").value;
			var atindex=e.indexOf('@');
			var dotindex=e.lastIndexOf('.');
			if(atindex<1 || dotindex>=e.length-2 || dotindex-atindex<3)
			{
				result=false;
				alert("Please check your email!!");
			}
			return(result);
		}
	</script>
	</head>
	
	<body>
		
	<div class="heading1">
		<span class="title1">Edit your details here</span>
		<br/>
		<form   action="updation.php" method="post" onsubmit="return validation()">
		<table align="center" cellspacing="20px"  cellpadding="50px" width="800px">
			<tr >
			<td class="title3">Name</td>
			<td><input style="width:400px; height:30px;" type="text" name="user"  class="title4" value="<?php echo $row['Name'] ?>"required/></td>
			</tr>
	
			<tr >
			<td class="title3">Phone no.</td>
			<td><input style="width:400px; height:30px;" type="text" name="ph"  class="title4" id="ph" value="<?php echo $row['phone'] ?>" required/></td>
			</tr>
			<tr>
			<td class="title3">Email-id</td>
			<td><input style="width:400px; height:30px;" type="text" name="email"  class="title4" id="email" value="<?php echo $row['Email'] ?>" required/></td>
			</tr>
			
			
			
		</table>
		<a type="submit"  style="text-decoration:none;"><button  name="submit" class="register1" >UPDATE</button></a>
		
	</form>
	
		
		</div>
		
	
	</body>
</html>
<?php
}
else
    header('location:login.php');

mysqli_close($con);
?>