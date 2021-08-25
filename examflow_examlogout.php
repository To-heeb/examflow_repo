<?php
include 'examflow_constants.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Examination Logout -  <?php echo APPNAME; ?></title>
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
		#studentImgDiv{
			height: 150px;
		}
		#studentImg{
			height: 100px;
			width: 100px;
			border-radius: 100px;
			margin-left: auto;
		    margin-right: auto;
		    display: block;
		}
		#studentDetailDiv{
			min-height: 200px;
		}
		#logoutExamBtn{
			float: right;
		}
		.clearFloat{
			clear: both;
		}
		footer{
			background: rgba(255, 255, 255, 0.7);
			background-color: #0B1D51;
			min-height: 50px;
			color: #AAAE8E;
		}
	</style>
</head>
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
		<div class="row">
			<div class="col-4 offset-4" id="studentImgDiv">
				<img src="exam_image/avatar1.png" alt="" class="img-fluid" id="studentImg">
			</div>
		</div>
		<!-- This is the div student Details aftre the exam -->
		<div class="row">
			<div class="col-4 offset-4 text-center" id="studentDetailDiv">
				<div class="row">
					<div class="col text-right">
						<p>Name:</p>
						<p>Email:</p>
						<p>Exam title:</p>
						<p>Questions:</p>
						<p>Duration:</p>
						<p>Review:</p>
					</div>
					<div class="col text-left">
						 <p> Oyekola Toheeb</p>
						 <p> Toheeb.OLawale.TO23@gmail.com</p>
						 <p> GNS404</p>
						 <p> 50</p>
						 <p> 1:00 :00</p>
						 <p> 
						 	<span class="fa fa-star "></span>
						 	<span class="fa fa-star "></span>
						 	<span class="fa fa-star "></span>
						 	<span class="fa fa-star "></span>
						 	<span class="fa fa-star"></span>

						 </p>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-4 mb-5">
			<div class="col">
				<input type="button" name="" class="btn btn-primary" value="Log Out" id="logoutExamBtn">
				<div class="clearFloat" ></div>
			</div>
		</div>
		<footer class="row">
			<div class="col mt-4">
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
		$(document).ready(function(){
			
		}
			)
	</script>
</body>
</html>