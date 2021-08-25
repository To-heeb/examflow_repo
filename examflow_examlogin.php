<?php
include 'examflow_constants.php';
if
?>
<!DOCTYPE html>
<html>
<head>
	<title>Examination Login - <?php echo APPNAME; ?></title>
	<!--required meta tags-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--Animate.css Stylesheet-->
	<link href="animate.css" type="text/css" rel="stylesheet">
	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&family=Satisfy&display=swap" rel="stylesheet">
	<!--Bootstrap Stylesheet-->
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
	<!--External Stylesheet-->
	<link rel="stylesheet" type="text/css" href="">
	<style type="text/css">
		div{
			/*min-height: 100px;
			border: 2px solid red;*/	
		}
		#navbar{
			background-color: #A6BDF0;
			font-size: 18px;
		}
		.nav-item a:hover{
			color: #AAAE8E !important;
			font-size: 30px;
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
		#examLoginForm{
			box-shadow: 0 4px 8px 2px rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.29);
			border-radius: 7px;
			background-color: #0B1D51;
			color: white;
		}
		#loginBtn{
			background-color: #A6BDF0;
		}
		footer{
			background: rgba(255, 255, 255, 0.7);
			background-color: #0B1D51;
			min-height: 50px;
			color: #AAAE8E;
		}
		p > a{
			color: #AAAE8E;
		}
		p > a:hover{
			color: #AAAE8E;
		}
	</style>
</head>
<body>
	<div class="container">
		<header class="row mb-5" id="header">
			<div class="col-12">
				<!--Navbar Header-->
				<nav class="navbar navbar-expand-lg navbar-light font-weight-bold" id="navbar">
				  <a class="navbar-brand" href="#"><img src="exam_image/exam3.png" alt="logo" id="logo"><span id="examflow">Exam<span id="f_examflow">f</span>low</span></a>
				</nav>
			</div>
		</header>
		<div class="row mt-5">
			<div class=" offset-2 offset-md-3 col-8 col-md-6 p-4 mt-5 mb-5" id="examLoginForm">
				<fieldset>
					<legend>Examination Login</legend>
					<form>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Email address</label>
					    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="danladibako@gmail.com" aria-describedby="emailHelp">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Examination Passcode</label>
					    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="xxxxxx">
					  </div>
					  
					  <input type="submit" class="btn" id="loginBtn" value="Login">
					</form>
				</fieldset>
			</div>
		</div>
		<footer class="row mt-5">
			<div class="col-12 mt-4">
				<div class="col text-center">
					<p>&copy;Copyright <?php echo APPNAME." ".date('Y');?> | All right reserved</p>
				</div>
			</div>
		</footer>
	</div>
	<!--Javascript Files jquery, popper, bootstrap-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" language="javascript">
		$(document).ready(
  			function(){}
			)
	</script>
</body>
</html>