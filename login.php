<?php
   session_start(); $con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'brainwarmup');
if(isset($_REQUEST["submit"]))
{
    $user=$_REQUEST["ph"];
    $pass=$_REQUEST["password"];
    $q="select * from users where phone='$user' && password='$pass'";
    $query=mysqli_query($con,$q);
    $rowcount=mysqli_num_rows($query);
	$row=mysqli_fetch_array($query);
    if($rowcount==true)
    {
        $_SESSION["ph"]=$row['phone'];
    header('location: welcome.php');
    }
    else
    {
		?>
      <script>
		alert("Enter a valid phone or password");
		</script>
<?php		
    }
	mysqli_close($con);
}

?>
   

<!DOCTYPE html>
<html>

<head>
    <title>Log in</title>
    <link rel="stylesheet" type="text/css" href="mycss.css">
    <script>
        function validation() {
            var result = true;
            var i = document.getElementById("ph").value;
            if (i.length == 10)
                result = true;
            else {
                result = false;
                alert("Please enter valide Phone number!");
            }

            return (result);
        }

    </script>
	
</head>

<body>
	
    <div class="head">
	
        <span class="title2">Log in </span>
		
        <form method="post" onsubmit="return validation()">
            <table align="center" cellspacing="20px" cellpadding="40px" width="400px" style="margin-top:20px">
                <tr>
                    <td class="title6">Phone no.</td>
                    <td><input type="text" name="ph" class="title4" id="ph" placeholder="Enter your phone no." required/></td>
                </tr>
                <tr>
                    <td class="title6">Password</td>
                    <td><input type="password" name="password" class="title4" placeholder="Enter your password" required/></td>
                </tr>
            </table>
            
            <a type="submit"  style="text-decoration:none;"><button  class="register1" name="submit">LOG IN</button></a>

        </form>
		
    </div>



</body>

</html>