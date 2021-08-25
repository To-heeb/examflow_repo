<?php
include 'examflow_constants.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>General Instruction - <?php echo APPNAME; ?></title>
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
			border: 0px solid red;	
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
		header{
			height: 80px;
			background-color: #A6BDF0;
			line-height: 80px;
			font-size: 18px;
		}
		a{
			color: black;
		}
		a:hover{
			color: black;
		}
		#studentImg{
			width: 33px;
			height: 33px;
			border-radius: 50px;
		}
		#instructionDiv{
			min-height: 450px;
			clear: both;
		}
		#instructionDiv div ul{
			line-height: 25px;
		}
		#startExamBtn{
			float: right;
		}
		.clear{
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
<body>
	<div class="container">
		<header class="row mt-2 mb-4">
			<div class="col-5 font-weight-bold">
				<a class="navbar-brand disable" href="#"><img src="exam_image/exam3.png" alt="logo" id="logo"><span id="examflow">Exam<span id="f_examflow">f</span>low</span></a>
			</div>
			<div class="col-4">
				
			</div>
			<div class="offset- col-3 pr-0 float-right">
				<img src="exam_image/avatar1.png" alt="an alt" id="studentImg">&nbsp;
				<span>Oyekola</span>
				<span>Toheeb</span>
			</div>
		</header>
		<div class="row" id="instructionDiv">
			<div class="col-12">
				<h1 class="">Exam Header</h1>
				<hr class="mb-4">
				<h2 class="mb-3">General Instruction</h2>
				<ul type="bullet" class="">
					<li>This is the first instruction</li>
					<li>This is the first instruction</li>
					<li>This is the first instruction</li>
					<li>This is the first instruction</li>
					<li>This is the first instruction</li>
					<li>This is the first instruction</li>
				</ul>
				<button type="button" class="btn btn-primary" id="startExamBtn">Start Exam</button>
				<div class="clear" ></div>
			</div>
		</div>
		<!-- Footer -->
		<footer class="row">
			<div class="col text-center mt-4">
				<p>&copy;Copyright <?php echo APPNAME." ".date('Y');?> | All right reserved </p>
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