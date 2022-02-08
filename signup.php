<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['vpmsaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }

if(isset($_POST['userlogin']))
  {
    $user=$_POST['userusername'];
    $userpassword=md5($_POST['userpassword']);
    $query=mysqli_query($con,"select ID from tbluser where  UserName='$user' && Password='$userpassword' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['vpmsaid']=$ret['ID'];
     header('location:userdashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }

if(isset($_POST['signup']))
  {
    $name=$_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $phoneno=$_POST['phoneno'];
    $password=md5($_POST['password']);
    
    
     
    $query=mysqli_query($con, "insert into  tbluser(Name, UserName, Email, MobileNumber, Password) value('$name','$username','$email','$phoneno','$password')");
    if ($query) {
echo "<script>alert('Account created!');</script>";
echo "<script>window.location.href ='userdashboard.php'</script>";
  }
  else
    {
     echo "<script>alert('Something Went Wrong. Please try again.');</script>";       
    }

  
}
  ?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    
    <title>VPMS-Sign Up Page</title>
   

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/login.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-img">
   
    <div class="form-wrap">
		<div class="tabs">
			<h3 class="signup-tab"><a href="#signup-tab-content">Admin</a></h3>
			<h3 class="login-tab"><a class="active" href="#login-tab-content">User</a></h3>
		</div><!--.tabs-->

		<div class="tabs-content">
			<div id="signup-tab-content" class="active">
				<form class="signup-form" action="" method="post">
					<input type="text" class="input" id="user_login" autocomplete="off" placeholder="Name" name="name">
          <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Username" name="username">
          <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Email" name="email">
          <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Phone No." name="phoneno">

          <input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password" name="password">
          <input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Confirm Password" name="password">
					
					
                    <input type="submit" class="button" value="Sign Up" name="signup">
				</form><!--.login-form-->
				<div class="help-text">
					<p><a href="index.php">Already have an account? Sign In</a></p>
				</div><!--.help-text-->
			</div><!--.signup-tab-content-->

			<div id="login-tab-content">
				<form class="signup-form" action="" method="post">
                    
					<input type="text" class="input" id="user_login" autocomplete="off" placeholder="Name" name="userusername">
          <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Username" name="userusername">
          <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Phone No." name="userusername">

					<input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password" name="userpassword">
          <input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Confirm Password" name="userpassword">
					
					<input type="submit" class="button" name="userlogin" value="User Login">
				</form><!--.login-form-->
				<div class="help-text">
					<p><a href="index.php#login-tab-content">Already have an account? Sign In</a></p>
				</div><!--.help-text-->
			</div><!--.login-tab-content-->
		</div><!--.tabs-content-->
	</div><!--.form-wrap-->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>
<script src="assets/js/login.js"></script>
</body>
</html>
