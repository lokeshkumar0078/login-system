<?php
   session_start(); $con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'brainwarmup');
if(isset($_REQUEST["submit"]))
{
   $phone=$_SESSION['ph'];
    $new1=$_REQUEST["new1"];
	$new2=$_REQUEST["new2"];
	if($new1==$new2)
	{
		$q="update users set password='$new1' where phone='$phone'";
		$query=mysqli_query($con,$q);
		
			
	
	echo "<script>
			alert(\"Password changed succesfully\");
		location.href = 'welcome.php';
			</script>";
		
		

	
	}
    else
    {
?>
	<script>
	alert("please enter same passwords");
	</script>
<?php
    }
	mysqli_close($con);
}

?>
   
<!DOCTYPE html>
<html>
	<head>
		<title>Recover your password</title>
		<link rel="stylesheet" type="text/css" href="mycss.css">
	</head>
	
	<body>
	
		
		<div id="forgotten" style="height:350px;width:500px;">
		
		<span id="title6" >Change password</span>
		<hr style="margin-left:20px; margin-right:20px;"/>
		<form  method="post" >
			<table align="center" cellspacing="20px"  cellpadding="40px"  width="450px" style="margin-top:10px">
				<tr>
				<td class="title6" >New password:</td>
			    <td><input type="password" name="new1"  class="title4" style="width:300px;" id="ph" placeholder="Enter your new password" required/></td>
				</tr>
					<tr>
				<td class="title6" >Confirm password:</td>
			    <td><input type="password" name="new2"  class="title4" style="width:300px;" id="ph" placeholder="Confirm password" required/></td>
				</tr>
			</table>
			
			<a type="submit" style="text-decoration:none;"><button  class="register1" onclick="change()" name="submit" style="height:40px; width:200px;" >CHANGE PASSWORD</button></a>
			
		</form>
		
		</div>
		
	
	
	</body>
</html>

