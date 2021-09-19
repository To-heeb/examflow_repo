<?php session_start();
include 'examflow_constants.php';
include_once 'examflow_classes.php';
//Form validation
if (!empty($_POST)) {
	//Login form validation
	if (isset($_POST["login_submit"])) {
		//$result = $_POST;
		$login_email = strtolower(trim($_POST["login_email"]));
		$login_password = trim($_POST["login_password"]);
		$login_acctType = $_POST["loginAcctCategory"];
		

		if (empty($login_email)) {
			$message12 = "Email field is required";
			$errors[] = $message12;
		}
		if (empty($login_password)) {
			$message13 = "Password field is required";
			$errors[] = $message13;
		}
		if (empty($login_acctType)) {
			$message14 = "Please select your category";
			$errors[] = $message14;
		}
		
		if(empty($errors)) {

			if ($login_acctType == 'examiner') {

				$login_acctType = 'Examiner';
				//Istantiating object of class User for exerminerLogin method
				$examinerObject = new Users;
				$output = $examinerObject->examinerLogin($login_email, $login_password);

				if (is_array($output)) {
					$_SESSION['examiner_id'] = $output['examiner_id'];
					$_SESSION['acctType2'] = $login_acctType;
					$_SESSION['examiner_fname'] = $output['examiner_fname'];
					$_SESSION['examiner_lname'] = $output['examiner_lname'];
					$_SESSION['examiner_email'] = $output['examiner_email'];
					$_SESSION['examiner_phone'] = $output['examiner_phone'];
					$_SESSION['examiner_image'] = $output['examiner_image'];

					header("Location: examflow_dashboard_examiner.php");
					exit;
					}else{
						$result = $output; 
					}	
			}elseif($login_acctType == 'student') {

				$login_acctType = 'Student';
				//Istantiating object of class User for studentLogin method
				$studentObject = new Users;
				$output = $studentObject->studentLogin($login_email, $login_password);
				if (is_array($output)) {
					$_SESSION['student_id'] = $output['student_id'];
					$_SESSION['acctType3'] = $login_acctType;
					$_SESSION['student_fname'] = $output['student_fname'];
					$_SESSION['student_lname'] = $output['student_lname'];
					$_SESSION['student_email'] = $output['student_email'];
					$_SESSION['student_phone'] = $output['student_phone'];
					$_SESSION['student_image'] = $output['student_image'];

					header("Location: examflow_dashboard_student.php");
				}else{
					$result = $output; 
				}
					
			}else{
				
				$login_acctType = 'Admin';
				//Instantiating object of class User for adminLogin method
				$studentObject = new Users;
				$output = $studentObject->adminLogin($login_email, $login_password);
				if (is_array($output)) {
					$_SESSION['admin_id'] = $output['admin_id'];
					$_SESSION['acctType1'] = $login_acctType;
					$_SESSION['admin_fname'] = $output['admin_fname'];
					$_SESSION['admin_lname'] = $output['admin_lname'];
					$_SESSION['admin_email'] = $output['admin_email'];
					$_SESSION['admin_phone'] = $output['admin_phone'];
					$_SESSION['admin_image'] = $output['admin_image'];

					header("Location: examflow_dashboard_admin.php");
					exit;
			}else{
					$result = $output; 
				}

			//$message = "<div class='alert alert-success'>Login Successful</div>";
			}
		}
	}

	

	//Sign Up form validation
	if (isset($_POST["signup_submit"])) {

		//variable assigment "later sanitize form here"
		$firstname = ucfirst(strtolower(trim($_POST["firstName"])));
		$lastname = ucfirst(strtolower(trim($_POST["lastName"])));
		$email = strtolower(trim($_POST["email"]));
		$confirm_email = strtolower(trim($_POST["confirm_email"]));
		$password = trim($_POST["password"]);
		$confirm_password = trim($_POST["confirm_password"]);
		$accountType = $_POST["account_category"];
		$countryCode = trim($_POST["countryCode"]);
		$phone = trim($_POST["phone"]);
		$phoneNumber = $countryCode.$phone;
		//echo $phoneNumber;

		//Validating each field
		if (empty($firstname)) {
			$message1 = "This field is required";
			$errors[] = $message1;
		}
		if (empty($lastname)) {
			$message2 = "This field is required";
			$errors[] = $message2;
		}
		if (empty($email)) {
			$message3 = "This field is required";
			$errors[] = $message3;
		}
		if (empty($confirm_email)) {
			$message4 = "This field is required";
			$errors[] = $message4;
		}
		if (empty($password)) {
			$message5 = "This field is required";
			$errors[] = $message5;
		}
		if (empty($confirm_password)) {
			$message6 = "This field is required";
			$errors[] = $message6;
		}
		if (empty($accountType)) {
			$message7 = "This field is required";
			$errors[] = $message7;
		}
		if (empty($countryCode)) {
			$message8 = "This field is required";
			$errors[] = $message8;
		}
		if (empty($phone)) {
			$message9 = "This field is required";
			$errors[] = $message9;
		}

		//var_dump($errors);

		//checking for mismatch in email and password field
		if ($email <> $confirm_email) {
			$message10 = "Both field must match";
			$errors[] = $message10;
		}
		if ($password != $confirm_password) {
			$message11 = "Both field must match";
			$errors[] = $message11;
		}

		if (empty($errors)) {

			if ($accountType == 'examiner') {
				
				//Instantiating object of class User for exerminerRegistration method
				$object = new Users;
				$output = $object->registerUserExaminer($firstname, $lastname, $email, $password, $phoneNumber);
			}elseif($accountType == 'student') {

				//Instantiating object of class User for studentRegistration method
				$object = new Users;
				$output = $object->registerUserStudent($firstname, $lastname, $email, $password, $phoneNumber);
			}else{
				
			}
			//$message = "<div class='alert alert-success'>Login Successful</div>";
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
				        <a class="nav-link ml-md-3" href="examflow_login_signup.php?message=login" id="navbarLoginLink">LOGIN</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link ml-md-3" href="examflow_login_signup.php?message=signup" id="navbarSignupLink">SIGN UP</a>
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
				<?php
				if (isset($_GET['message']) && $_GET['message'] == 'login') {

				
				?>
				<div id="logInForm" class="m-4 p-4 mt-5 formDiv">
					<fieldset>
						<legend class="text-center">LOGIN</legend>
						<hr width="80%" height="2px">
						<div class="">
						<?php
							if (isset($_POST['login_submit'])) {
								echo $message??'';
							}
							if (isset($_GET['msg'])) {

								echo $_GET['msg'];
							}

							if (isset($result)) {
								echo $result;
							}
						?>
						</div>
						<form method="post" action="">
						  <div class="form-group">
						    <label for="loginEmail">Email address</label>
						    <input type="email" name="login_email" class="form-control" id="loginEmail" aria-describedby="emailHelp" value=" <?php echo $_POST['login_email']??'' ?>">
						    <small id="" class="form-text text-danger"><?php echo $message12??''; ?></small>
						  </div>
						  <div class="form-group clearfix">
						    <label for="loginPassword">Password</label>
						    <a class="float-right small text-muted" href="">Forgot Password?</a>
						    <input type="password" name="login_password" class="form-control" id="loginPassword">
						    <small id="" class="form-text text-danger"><?php echo $message13??''; ?></small>
						  </div>
						  <div class="form-group">
						    <label for="">Category</label>
						    <select class="form-control" name="loginAcctCategory" id="">
						    	<option value="">Select Category</option>
						    	<option value="examiner">Examiner</option>
						    	<option value="student">Student</option>
						    	<option value="admin">Admin</option>
						    </select>
						    <small id="" class="form-text text-danger"><?php echo $message14??'';?></small>												    
						  </div>
						  <div class="form-group form-check">
						    <input type="checkbox" class="form-check-input" id="rememberMe">
						    <label class="form-check-label" for="rememberMe">Remember Me</label>
						  </div>
						  <input type="submit" name="login_submit" class="btn btn-primary" value="Submit">
						  <p class="small form-text">Do not have an account yet? Click <a href="examflow_login_signup.php?message=signup" id="signUpLink">here </a>to Sign up </p>
						</form>
					</fieldset>
				</div>
				<?php
			}else/*if(isset($_GET['message']) && $_GET['message'] == 'signup')*/{
				?>
				<!-- SIGN UP -->
				<div id="signUpForm" class="m-4 p-4 mt-5 formDiv">
					<fieldset>
						<legend class="text-center">SIGNUP</legend>
						<hr width="80%">
						<div>
						<?php
							if (!empty($output)) {
								echo $output;
							}
						?>
						</div>
						<form method="post" action="" class="">
							<label class="font-weight-bold">Name</label>
							<div class="row form-group">
								<div class="col-6">
									<input type="text" name="firstName" placeholder="First name" id="fname" class="form-control" value="<?php if(isset($_POST['firstName'])){ echo $_POST['firstName']; } ?>">
									<small id="" class="form-text text-danger"><?php echo $message1??''; ?></small>
								</div>
								<div class="col-6">
									<input type="text" name="lastName" placeholder="Last 	name" id="lname" class="form-control" value="<?php if(isset($_POST['lastName'])){ echo $_POST['lastName']; } ?>">
									<small id="" class="form-text text-danger"><?php echo $message2??''; ?></small>
								</div>
							</div>
							<small id="" class="form-text text-danger"><?php echo $message10??''; ?></small>
							<label class="font-weight-bold">Email</label>
							<div class="row form-group">
								<div class="col">
									<input type="email" name="email" placeholder="Email" id="loginEmail" class="form-control" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
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
									<option value="examiner"<?php if (isset($_POST['account_category']) && $_POST['account_category'] == 'examiner') {
										echo "selected";
									} ?>>Examiner</option>
									<option value="student" <?php if (isset($_POST['account_category']) && $_POST['account_category'] == 'student') {
										echo "selected";
									} ?>>Student</option>
								</select>
								<small id="" class="form-text text-danger"><?php echo $message7??''; ?></small>
							</div>
							<div class="form-group form-check">
							    <input type="checkbox" class="form-check-input" id="termsCheck">
							    <label class="form-check-label" for="termsCheck"><a href="#" class="text-decoration-none">Terms and Conditions</a></label>
							  </div>
							<div>
								<input type="submit" name="signup_submit" class="btn btn-primary form-control mt-3" value="Sign Up" id="submit_button" disabled>
								<p class="small mt-1">Already have an account? Click <a href="examflow_login_signup.php?message=login" id="logInLink" class="text-decoration-none">here </a>to Login </p>
							</div>
						</form>
					</fieldset>
				</div>
				<?php
				}
				?>
			</div>
		</div>
		<!-- FOOTER -->
		<div class="container-fluid">
			<footer class="row">
				<div class="col text-center mt-4">
					<p>&copy;Copyright <a href="index.php"  class="text-decoration-none"><?php echo APPNAME." ".date('Y');?></a> | All right reserved | <a href=""  class="text-decoration-none">Terms and Condition</a> | <a href=""  class="text-decoration-none">Privacy Policy</a></p>
				</div>
			</footer>
		<div>
	 </div>
	</div>
	<!--Javascript Files jquery, popper, bootstrap-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" language="javascript">
		$(document).ready(function(){
			
			//Clear terms and condition check
			$('#termsCheck').prop('unchecked');
			//Terms and condition validation
			$('#termsCheck').click(function(){
			var termAndConditonBox = $('#termsCheck').prop('checked');
			if (termAndConditonBox) {$('#submit_button').removeAttr("disabled")}else{$('#submit_button').attr("disabled",true)}
			})
		}
			)
	</script>
</body>
</html>