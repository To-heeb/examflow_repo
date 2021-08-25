<?php
include 'examflow_constants.php';

//Form validation
if (!empty($_POST)) {
	//Login form validation
	if (isset($_POST["login_submit"])) {
		//$result = $_POST;
		$login_email = trim($_POST["login_email"]);
		$login_password = trim($_POST["login_password"]);
		
		if (empty($login_email)) {
			$message12 = "Email field is required";
		}
		if (empty($login_password)) {
			$message13 = "Password field is required";
		}
		
		if(empty($message12) AND empty($message13)) {
			$message = "Login Successful";
		}
	}

	//Sign Up form validation
	if (isset($_POST["signup_submit"])) {

		//variable assigment
		$firstname = trim($_POST["firstName"]);
		$lastname = trim($_POST["lastName"]);
		$email = trim($_POST["email"]);
		$confirm_email = trim($_POST["confirm_email"]);
		$password = trim($_POST["password"]);
		$confirm_password = trim($_POST["confirm_password"]);
		$accountType = trim($_POST["account_category"]);
		$countryCode = trim($_POST["countryCode"]);
		$phone = trim($_POST["phone"]);

		//Validating each field
		if (empty($firstname)) {
			$message1 = "This field is required";
		}
		if (empty($lastname)) {
			$message2 = "This field is required";
		}
		if (empty($email)) {
			$message3 = "This field is required";
		}
		if (empty($confirm_email)) {
			$message4 = "This field is required";
		}
		if (empty($password)) {
			$message5 = "This field is required";
		}
		if (empty($confirm_password)) {
			$message6 = "This field is required";
		}
		if (empty($accountType)) {
			$message7 = "This field is required";
		}
		if (empty($countryCode)) {
			$message8 = "This field is required";
		}
		if (empty($phone)) {
			$message9 = "This field is required";
		}

		//checking for mismatch in email and password field
		if ($email <> $confirm_email) {
			$message10 = "Both field must match";
		}
		if ($password != $confirm_password) {
			$message11 = "Both field must match";
		}

		if (empty($message1) && empty($message2) && empty($message3) && empty($message4) && empty($message6) && empty($message7) && empty($message8) && empty($message9) && empty($message10) && empty($message11)) {

			$message = "Login Successful";
		}


	}
}

	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login - <?php echo APPNAME; ?></title>
	<!--required meta tags-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--Animate.css Stylesheet-->
	<link href="animate.css" type="text/css" rel="stylesheet">
	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&family=Satisfy&display=swap" rel="stylesheet">
	<!--Fontawesome Stylesheet-->
	<link href="fontawesome/css/all.css" type="text/css" rel="stylesheet">
	<!--Bootstrap Stylesheet-->
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
	<!--External Stylesheet-->
	<link rel="stylesheet" type="text/css" href="">
	<!--Internal Stylesheet-->
	<style type="text/css">
		#navbar{
			background-color: #A6BDF0;
			font-size: 18px;
		}
		.nav-item a:hover{
			color: #AAAE8E !important;
			font-size: 23px;
			background-color: #0B1D51;
			border-radius: 15px;
		}
		#logo{
			height: 40px;
			width: 40px;
		}
		#examflow{
			font-family: 'Lobster Two', cursive;
		}
		#f_examflow{
			font-family: 'Satisfy', cursive;
		} 
		#container{
			/*background-image: url("exam_image/login_bg2.jpg");*/
			min-height: 650px;
			background-repeat: no-repeat;
			background-size: cover;
			background-color: #B2BEB5;
		}
		.formDiv{
			box-shadow: 0 4px 8px 2px rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.29);
			border-radius: 5px;
			background-color: white;
		}
		footer{
			background: rgba(255, 255, 255, 0.7);
			background-color: #0B1D51;
			min-height: 100px;
			color: #AAAE8E;
		}
		footer div p  a{
			color: #AAAE8E;
		}
		footer div p  a:hover{
			color: #AAAE8E;
		}
	</style>
</head>
</head>
<body>
	<div class="container-fluid" >
		<div id="container">
		 <header class="row" id="header">
			<div class="col-12">
				<!--Navbar Header-->
				<nav class="navbar navbar-expand-lg navbar-light font-weight-bold" id="navbar">
				  <a class="navbar-brand" href="index.php">	<img src="exam_image/exam3.png" alt="logo" id="logo"><span id="examflow">Exam<span id="f_examflow">f</span>low</span></a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse text-center justify-content-center text-justify" id="navbarNavDropdown">
				    <ul class="navbar-nav align-items-center">
				      <li class="nav-item active">
				        <a class="nav-link ml-md-3" href="index.php">HOME<span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link ml-md-3" href="#logInForm" id="navbarLoginLink">LOGIN</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link ml-md-3" href="#signUpForm" id="navbarSignupLink">SIGN UP</a>
				      </li>
				    </ul>
				  </div>
				</nav>
			</div>
		</header>
		<div class="row">
		 	<div class="col">
		 	</div>
		</div>
		<div class="row">
			<div class="offset-md-3 col-md-6">
				<!-- LOGIN -->
				<div id="logInForm" class="m-4 p-4 mt-5 formDiv">
					<fieldset>
						<legend class="text-center">LOGIN</legend>
						<hr width="80%" height="2px">
						<div class="">
						<?php
							echo $message??'';
						?>
						</div>
						<form method="post" action="">
						  <div class="form-group">
						    <label for="loginEmail">Email address</label>
						    <input type="email" name="login_email" class="form-control" id="loginEmail" aria-describedby="emailHelp">
						    <small id="" class="form-text text-danger"><?php echo $message12??''; ?></small>
						  </div>
						  <div class="form-group clearfix">
						    <label for="loginPassword">Password</label>
						    <a class="float-right small text-muted" href="">Forgot Password?</a>
						    <input type="password" name="login_password" class="form-control" id="loginPassword">
						    <small id="" class="form-text text-danger"><?php echo $message13??''; ?></small>
						  </div>
						  <div class="form-group form-check">
						    <input type="checkbox" class="form-check-input" id="rememberMe">
						    <label class="form-check-label" for="rememberMe">Remember Me</label>
						  </div>
						  <input type="submit" name="login_submit" class="btn btn-primary" value="Submit">
						  <p class="small form-text">Do not have an account yet? Click <a href="#signUpForm" id="signUpLink">here </a>to Sign up </p>
						</form>
					</fieldset>
				</div>
				<!-- SIGN UP -->
				<div id="signUpForm" class="m-4 p-4 mt-5 formDiv">
					<fieldset>
						<legend class="text-center">SIGNUP</legend>
						<hr width="80%">
						<form method="post" action="" class="">
							<label class="font-weight-bold">Name</label>
							<div class="row form-group">
								<div class="col-6">
									<input type="text" name="firstName" placeholder="First name" id="fname" class="form-control">
									<small id="" class="form-text text-danger"><?php echo $message1??''; ?></small>
								</div>
								<div class="col-6">
									<input type="text" name="lastName" placeholder="Last 	name" id="lname" class="form-control">
									<small id="" class="form-text text-danger"><?php echo $message2??''; ?></small>
								</div>
							</div>
							<small id="" class="form-text text-danger"><?php echo $message10??''; ?></small>
							<label class="font-weight-bold">Email</label>
							<div class="row form-group">
								<div class="col">
									<input type="email" name="email" placeholder="Email" id="loginEmail" class="form-control">
									<small id="" class="form-text text-danger"><?php echo $message3??''; ?></small>
								</div>
								<div class="col">
									<input type="email" name="confirm_email" placeholder="Confirm Email" id="loginEmail" class="form-control">
									<small id="" class="form-text text-danger"><?php echo $message4??''; ?></small>
								</div>
							</div>
							<small id="" class="form-text text-danger"><?php echo $message11??''; ?></small>
							<label class="font-weight-bold">Password</label>
							<div class="row form-group">
								<div class="col-6">
									<input type="password" name="password" placeholder="Password" id="pwd" class="form-control">
									<small id="" class="form-text text-danger"><?php echo $message5??''; ?></small>
								</div>
								<div class="col-6">
									<input type="password" name="confirm_password" placeholder="Confirm Password" id="c_pwd" class="form-control">
									<small id="" class="form-text text-danger"><?php echo $message6??''; ?></small>
								</div>
							</div>
							<div class="form-group">
								<label class="font-weight-bold">Phone Number</label>
								<div class="row">
									<div class="col-4">
									<select name="countryCode" class="form-control">
										<option value="">Country code</option>
										<?php
											include 'country_dialing_codes.php';
										?>
										<?php
										foreach ($dialing_code as $key => $value) {

										?>
											<option value="<?php echo '+'.$value?>"><?php echo "+".$value; ?></option>
										
										<?php
										}
										?>
									</select>
									<small id="" class="form-text text-danger"><?php echo $message8??''; ?></small>
									</div>
								<div class="col">
									<input type="text" name="phone" class="form-control">
									<small id="" class="form-text text-danger"><?php echo $message9??''; ?></small>
								</div>
							</div>
							</div>
							<div class="row ml-1 mr-1 form-group">
								<label class="font-weight-bold">Category</label>
								<select class="form-control" name="account_category">
									<option value="">Select Category</option>
									<option value="examiner">Examiner</option>
									<option value="student">Student</option>
								</select>
								<small id="" class="form-text text-danger"><?php echo $message7??''; ?></small>
							</div>
							<div class="form-group form-check">
							    <input type="checkbox" class="form-check-input" id="exampleCheck1">
							    <label class="form-check-label" for="exampleCheck1"><a href="#">Terms and Conditions</a></label>
							  </div>
							<div>
								<input type="submit" name="signup_submit" class="btn btn-primary form-control mt-3" value="Sign Up">
								<p class="small mt-1">Already have an account? Click <a href="#logInForm" id="logInLink">here </a>to Login </p>
							</div>
						</form>
					</fieldset>
				</div>
			</div>
		</div>
		<!-- FOOTER -->
		<footer class="row">
			<div class="col text-center mt-4">
				<p>&copy;Copyright <a href="index.php"  class="text-decoration-none"><?php echo APPNAME." ".date('Y');?></a> | All right reserved | <a href=""  class="text-decoration-none">Terms and Condition</a> | <a href=""  class="text-decoration-none">Privacy Policy</a></p>
			</div>
		</footer>
	 </div>
	</div>
	<!--Javascript Files jquery, popper, bootstrap-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" language="javascript">
		$(document).ready(function(){
			$('#logInForm').show()
			$('#signUpForm').hide(	)
			$("#navbarLoginLink").click(function(){
				$('#logInForm').slideDown("slow")
				$('#signUpForm').fadeOut("normal")
			})
			$("#navbarSignupLink").click(function(){
				$('#signUpForm').fadeIn(2500)
				$('#logInForm').fadeOut("normal")
			})
			$("#logInLink").click(function(){
				$('#logInForm').slideDown("slow")
				$('#signUpForm').fadeOut("normal")
			})
			$("#signUpLink").click(function(){
				$('#signUpForm').fadeIn(2500)
				$('#logInForm').fadeOut("normal")
			})
			
		}
			)
	</script>
</body>
</html>