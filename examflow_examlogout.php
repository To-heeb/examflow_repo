<?php session_start();
if (empty($_SESSION['student_passcode'])) {
	header("Location: examflow_examlogin.php");
}
include 'examflow_constants.php';

$email = $_SESSION['email'];
$student_fname = $_SESSION['fname'];
$student_lname = $_SESSION['lname'];
$exam_title = $_SESSION['exam_title'];
$exam_duration = $_SESSION['exam_duration'];
$student_image = $_SESSION['image'];

if (isset($_POST['logoutExamBtn'])) {
	header("Location: examflow_examlogout2.php");
	exit;
}
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
		<?php 
		if (isset($_GET['aQ']) AND isset($_GET['tQ'])) {
			$aQ = $_GET['aQ'];
			$tQ = $_GET['tQ'];
		}
		?>
		<div class="row">
			<div class="col-4 offset-3" id="studentImgDiv">
				<img src="examflow_profilepictures/<?php echo $student_image ??'avatar.png' ?>" alt="" class="img-fluid" id="studentImg">
			</div>
		</div>
		<!-- This is the div student Details aftre the exam -->
		<div class="row">
			<div class="col-4 offset-4 text-center" id="studentDetailDiv">
				<div class="row">
					<div class="col text-left">
						<p style="font-size: 22px;"><?php if(isset($_GET['msg'])){ echo $_GET['msg'];}?></p>
						<p>Name: <?php echo $student_lname." ".$student_fname ?></p>
						<p>Email: <?php echo $email; ?></p>
						<p>Exam title: <?php echo $exam_title; ?></p>
						<p>Attempted Questions: <?php echo $aQ."/".$tQ ?></p>
						<p>Duration: <?php echo $exam_duration." Minutes"??'1:00:00'; ?></p>
						<!-- <p>Review:
							<span class="fa fa-star "></span>
						 	<span class="fa fa-star "></span>
						 	<span class="fa fa-star "></span>
						 	<span class="fa fa-star "></span>
						 	<span class="fa fa-star"></span>
						</p> -->
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-4 mb-5">
			<div class="col">
				<form method="post" action="">
					<input type="submit" name="logoutExamBtn" class="btn btn-primary" value="Log Out" id="logoutExamBtn">
				</form>
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
			
		})
	</script>
</body>
</html>