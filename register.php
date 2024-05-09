<?php 
session_start();
error_reporting(0);
include("includes\dbconnection.php");

if(isset($_POST['submit']))
{
    $fname = $_POST['name'];
    $mobile = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // check if yhe email is registerd in the database
    $ret=mysqli_query($con, "Select Email From bluser where Email = '$email' ");
    $result = mysqli_fetch_array($ret);
    if($result>0) {
        $msg = "This email associated with another account";
    }
    else{
        $query = mysqli_query($con, "Insert to tbluser(Fullname, mobileNumber, Email, passowrd) value ('$fname', '$lname', '$email', '$mobile', '$passowrd')");
        if($query) {
            $msg = "You Are Successfully Registered";
        }
        else{
            $msg = "Something went wrong. Please Try Again";
    }
    }
}   

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Tracker - Signup</title>
    <script src='js\jquery-3.7.1.min.js'></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<script type="text/javascript">
        // Repaet the password value in the form 
                    function checkpass()
                    {
                    if(document.signup.password.value!=document.signup.repeatpassword.value)
                    {
                    alert('Password and Repeat Password field does not match');
                    document.signup.repeatpassword.focus();
                    return false;
                    }
                    return true;
                    } 

</script>
<body>
	<div class="row">
			<h2 align="center">Daily Expense Tracker</h2>
	<hr />
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Sign Up</div>
				<div class="panel-body">
					<form role="form" action="" method="post" id="" name="signup" onsubmit="return checkpass();">
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Full Name" name="name" type="text" required="true">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" required="true">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" maxlength="10" pattern="[0-9]{10}" required="true">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required="true">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="repeatpassword" name="repeatpassword" placeholder="Repeat Password" required="true">
							</div>
							<div class="checkbox">
								<button type="submit" value="submit" name="submit" class="btn btn-primary">Register</button><span style="padding-left:250px">
								<a href="index.php" class="btn btn-primary">Login</a></span>
							</div>
							 </fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-3.7.1.min.js"></script>

</body>
</html>


<!-- 
The CDN of JQuery

<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>

 -->