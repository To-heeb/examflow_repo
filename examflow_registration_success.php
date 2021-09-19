<?php 
include_once 'examflow_constants.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!--required meta tags-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--Animate.css Stylesheet-->
	<link href="animate.css" type="text/css" rel="stylesheet">
	<!--Bootstrap Stylesheet-->
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
	<!--Fontawesome Stylesheet-->
	<link href="fontawesome/css/all.css" type="text/css" rel="stylesheet">
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
			min-height: 150px;
			background-repeat: no-repeat;
			background-size: cover;
			background-color: #B2BEB5;
		}
		#logInForm{
			min-height: 450px;
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
						<legend class="text-center">REGISTRATION SUCCESSFUL</legend>
						<hr width="80%" height="2px">
						<div class="">
						<?php
							if (isset($_GET['msg'])) {

								echo $_GET['msg'];
							}
						?>
						</div>
						<form method="post" action="">
						  
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
			
		}
			)
	</script>
</body>
</html>