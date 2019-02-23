<?php
   session_start(); $con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'brainwarmup');
if(isset($_REQUEST["submit"]))
{
   $phone=$_SESSION['ph'];
    $pass=$_REQUEST["old"];
    $q="select * from users where password='$pass' && phone='$phone'";
    $query=mysqli_query($con,$q);
    $rowcount=mysqli_num_rows($query);
	$row=mysqli_fetch_array($query);
    if($rowcount==true && $row['password']==$pass)
    {
        
		header('location: changed.php');
	}
    else
    {
?>
		<script>
		alert("Enter valid password");
		</script>
<?php
    }
	mysqli_close($con);
}

?>
   
<!DOCTYPE html>
<html>
	<head>
		<title>Change your password</title>
		<link rel="stylesheet" type="text/css" href="mycss.css">
	</head>
	
	<body>
		
		
		<div id="forgotten" style="height:260px;width:500px;">
		
		<span id="title6" >Change password</span>
		<hr style="margin-left:20px; margin-right:20px;"/>
		<form  method="post" >
			<table align="center" cellspacing="20px"  cellpadding="40px"  width="450px" style="margin-top:10px">
				<tr>
				<td class="title6" >Current password:</td>
			    <td><input type="password" name="old"  class="title4" style="width:300px;" id="ph" placeholder="Enter your current password" required/></td>
				</tr>
			</table>
			 <a style="text-decoration:none;" href="forgot.php" id="forgot">forgotten password?</a>
			<a type="submit" href="recover.html"  style="text-decoration:none;"><button  name="submit" class="register1" style="height:35px; width:120px;" >SUBMIT</button></a>
			
		</form>
		
		</div>
		
	
	
	</body>
</html>

