<?php
	include("db.php");
	session_start();
    // If form submitted, insert values into the database.
	//UserName, Password, UserType, IsActive, Name
    if (isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
		//$usertype = $_POST['usertype'];
		$username = stripslashes($username);
		$username = mysqli_real_escape_string($link, $username);//mysqli_real_escape_string
		$password = stripslashes($password);
		$password = mysqli_real_escape_string($link, $password);
		//Checking is user existing in the database or not
        $query = "SELECT * FROM usersinformation WHERE UserName='$username' and Password='".md5($password)."' and IsActive='1'";
		$result = mysqli_query($link, $query) or die(mysql_error());
		$rows = mysqli_num_rows($result);		
        if($rows==1){
			while($row=mysqli_fetch_array($result)) { 
				$_SESSION['usertype'] = $row['UserType'];
				$_SESSION['Notes'] = $row['Notes'];
			}			
			$_SESSION['username'] = $username;			
			$usertype = $_SESSION['usertype'];
			$notes = $_SESSION['Notes'];
			
			if($usertype ==1){
				header("Location: index.php");// admin panel
			}elseif($usertype == 2){
				header("Location: index1.php");// user panel
			}
        }else{
				echo "<div class='form'><h3>Username/Password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
			}
    }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>ACI Motors | Login Options - Login Form</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- BEGIN THEME STYLES -->
	<link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
	<link href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body class="login">
	<div class="menu-toggler sidebar-toggler"></div>
	<div class="logo">
		<a href="index.html">
			<img src="assets/admin/layout/img/logo-big.png" alt=""/>
		</a>
	</div>
	<div class="content">

	<div class="form">
		<h1>Log In</h1>
		<form action="" method="post" name="login">
			<input type="text" name="username" placeholder="Username" required />
			<input type="password" name="password" placeholder="Password" required />
			<!--<input type="hidden" name="usertype" value="1"/><br>-->
			<input name="submit" type="submit" value="Login" />		
		</form>
	</div>
	<?php } ?>

	</div> <!--End content  -->
</body>
</html>
