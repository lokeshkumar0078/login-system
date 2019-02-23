<?php
   session_start();
   if(isset($_REQUEST["submit"]))
   {
   $phone=$_REQUEST["ph"];
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'brainwarmup');
$q="select * from users where phone='$phone'";
    $query=mysqli_query($con,$q);
    $rowcount=mysqli_num_rows($query);
   }
?>
<!DOCTYPE html>
<html>
	<head>
	<title>Register</title>
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
			if(<?php $rowcount ?>==true)
			{
				result=false;
				alert("Your number is already registered");
			}
			return(result);
		}
	</script>
	</head>
	
	<body>
		
	<div class="heading1">
		<span class="title1">Create your account</span>
		<br/>
		<form  action="insert.php" method="post" onsubmit="return validation()">
		<table align="center" cellspacing="20px"  cellpadding="50px" width="600px">
			<tr >
			<td class="title3">Name</td>
			<td><input type="text" name="user"  class="title4" required/></td>
			</tr>
	
			<tr >
			<td class="title3">Phone no.</td>
			<td><input type="text" name="ph"  class="title4" id="ph" required/></td>
			</tr>
			<tr>
			<td class="title3">Email-id</td>
			<td><input type="text" name="email"  class="title4" id="email"required/></td>
			</tr>
			<tr >
			<td class="title3">Create Password</td>
			<td><input type="password" name="password" pattern="{6,20}" class="title4" required/></td>
			</tr>
			<tr >
			<td class="title3">Gender</td>
			<td style="text-align:center;
	font-size:15pt;
	font-family:comic sans ms;
	text-shadow:2px 2px 5px black;"><input type="radio" name='gender' value="Female" / >  Female <input type="radio" name='gender' value="Male"/>  Male  </td>
			</tr>
			
		</table>
		<a type="submit" style="text-decoration:none;"><button  name="submit" class="register1" >REGISTER</button></a>
		<input type="reset" value="RESET"class="register1"/>
	</form>
	
		
		</div>
		
	
	</body>
</html>