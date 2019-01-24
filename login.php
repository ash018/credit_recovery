<?php
	include("db.php");
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
		
        $query = "Select * From usersinformation Where UserName = '$username' AND Password = '$password' AND IsActive = 1";
		$result = odbc_exec($connection,$query);
		$data_query = odbc_fetch_array($result);		
		//exit();		
		$errmsg="";
		
        if ($data_query["Password"] == $password){
				$_SESSION['UserId'] = $data_query["UserID"];
				$_SESSION['username'] = $data_query["UserName"];
				
				$usertype = $_SESSION['usertype'] = $data_query["UserType"];
				//$_SESSION['AccessLevel'] = $data_query["AccessLevel"];
				$_SESSION['notes'] = $data_query["Notes"];
				//print_r($_SESSION['notes']);
				if($usertype == 1){
					header("Location: index.php"); //admin view
				}elseif($usertype == 2){
					header("Location: aro.php"); //ARO view				
				}				
			}else{
				$errmsg.="Invalid password or name !";
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
		<a href="index.php">
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
