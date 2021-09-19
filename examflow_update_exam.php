<?php session_start();
if (empty($_SESSION['examiner_id'])) {
	header("Location: examflow_login_signup.php");
	exit;
}
include 'examflow_constants.php';
date_default_timezone_set('Africa/Lagos');

if (!empty($_POST)) {
	if (isset($_POST['updateExamination'])) {
		$examStartTime = $_POST['startExamTime'];
		$examEndTime = $_POST['endExamTime'];
		$resultReleaseDate =$_POST['resultReleaseDate'];
		$examDurationMinutes = $_POST['examDurationMinutes'];
		$examDurationHours  = $_POST['examDurationHours'];
		/*$questionArrangement = $_POST['questionArrangement'];*/
		$generalInstruction = $_POST['generalInstruction'];
		$exam_id = $_GET['exam_id'];
		$currentTime = date('m/d/Y h:i A');

		if (empty($examStartTime)) {
			$message1 = "Please pick exam start time";
			$errors[] = $message1;
		}
		if (empty($examEndTime)) {
			$message2 = "Please pick exam end time";
			$errors[] = $message2;
		}
		/*if (empty($examDurationHours)) {
			$message3 = "Please select exam duration hour";
			$errors[] = $message3;
		}*/
		if (empty($examDurationMinutes)) {
			$message4 = "Please select exam duration minute";
			$errors[] = $message4;
		}
		/*if (empty($questionArrangement)) {
			$message5 = "Please select exam question arrangement";
			$errors[] = $message5;
		}*/
		if (empty($resultReleaseDate)) {
			$message6 = "Please select result release date";
			$errors[] = $message6;
		}
		if (empty($generalInstruction)) {
			$message7 = "Please fill the field with examination general instruction";
			$errors[] = $message7;
		}

		if ($currentTime > $examStartTime) {
			$message8 = "<div class='alert alert-danger'>The examination start time must be greater than the current time</div>";
			$errors[] = $message8;
		}
		if ($examEndTime < $examStartTime) {
			$message9 = "<div class='alert alert-danger'>The examination end time must be greater than the start time</div>";
			$errors[] = $message9;
		}
		if ($resultReleaseDate < $examEndTime) {
			$message10 = "<div class='alert alert-danger'>The time of result release can't be lesser than the examination end time.</div>";
			$errors[] = $message10;
		}

	/*if (isset($_FILES['registeredStudent'])) {

		$filename = $_FILES['registeredStudent']['name'];
		$filetype = $_FILES['registeredStudent']['type'];
		$filetempname = $_FILES['registeredStudent']['tmp_name'];
		$file_error = $_FILES['registeredStudent']['error'];
		$filesize = $_FILES['registeredStudent']['size'];

		//validate your input
		if ($file_error > 0) {
			$message11 = "<div class='alert alert-danger'>You have not selected any file for upload!</div>";
			$errors[] = $message11;
			
		}
		if ($filesize > 2097152) {
			$message12 = "<div>File should be less than 2mb</div>";
			$errors[] = $message12;
		}
		echo "<pre>";
		print_r($_FILES['registeredStudent']);
		echo "</pre>";


		$acceptableExtensions = array("xls","xlsx","xlt");
		$file_ext = explode(".", $filename);
		$mainFile_ext = end($file_ext);
		$file_ext_lowerCase = strtolower($mainFile_ext);

		if ($file_error <= 0) {
			if (!in_array($file_ext_lowerCase, $acceptableExtensions)) {
				$message13 = "<div class='alert alert-danger'>This file format is not allowed</div>";
				$errors[] = $message13;

			}
		}
	}

*/
		if (empty($errors)) {
			if (empty($examDurationHours)) {
				$examDurationHours = 0;
			}

			$examDurationHours = $examDurationHours * 60;

			echo $examDurationHours."<br>";

			$examDuration = $examDurationHours + $examDurationMinutes;

			echo $examDuration."<br>";

			echo $examStartTime." ".$examEndTime." ".$resultReleaseDate;

			include_once 'examflow_classes.php';

			//instantiation of class Examination
			$objectExam = new Examination;

			$generalInstruction = $objectExam->sanitizeInputs($generalInstruction);

			/*$newfilename = rand()."_".$exam_id.".".$file_ext_lowerCase;
			$destination = "exam_registration_examflow/".$newfilename;
			
			move_uploaded_file($filetempname, $destination);*/

			//updating examination 
			$output = $objectExam->updateExamination($examStartTime, $examEndTime, $resultReleaseDate, $generalInstruction, $examDuration, $exam_id);









		}
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>New Exam - <?php echo APPNAME; ?></title>
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
	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="bootstrap-icons-1.5.0/font/bootstrap-icons.css">
	<!--External Stylesheet-->
	<link rel="stylesheet" type="text/css" href="">
	<!-- Tiny Cloud for Text formatting area -->
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
 	<script>tinymce.init({selector:'textarea'});</script>
 	<script>tinymce.init({selector: 'textarea#editor',skin: 'bootstrap',plugins: 'lists, link, image, media',toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help', menubar: false});
 	</script>
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
		#theoryQuestionInfo{
			font-size: 23px;
		}
		#correctAnswer{
			font-size: 25px;
			font-weight: bold;
		}
		#deleteBtn{
			float: right;
		}
		#addQuestionBtn{
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
		p > a{
			color: #AAAE8E;
		}
		p > a:hover{
			color: #AAAE8E;
		}
	</style>
</head>
</head>
<body class="bg-light">
	<div class="container-fluid">
		<!--Navbar-->
		<header class="row mb-5" id="header ">
		<div class="col-12">
			<!--Navbar Header-->
			<nav class="navbar navbar-expand-lg navbar-light font-weight-bold " id="navbar">
			  <a class="navbar-brand" href="index.php">	<img src="exam_image/exam3.png" alt="logo" id="logo"><span id="examflow">Exam<span id="f_examflow">f</span>low</span></a>
			</nav>
		</div>
		</header>
		<div class="row">
			<div class="col-12">
				<form action="" method="post" enctype="multipart/form-data">
					<fieldset>
						<legend class="h2">Update Examination</legend>
						<div class="row form-group">
							<div class="col">
								<label>Exam title / header</label>
								<input type="text" name="examTitle" class="form-control" placeholder="Human Anatomy" value="<?php
									if(isset($_GET['exam_title'])){
										echo $_GET['exam_title'];
									}
								?>" disabled="">
								<small id="" class="form-text text-danger"></small>
							</div>
							<div class="col">
								<label>Exam code</label>
								<input type="text" name="examCode" class="form-control" placeholder="ANA208" value="<?php
									if(isset($_GET['exam_code'])){
										echo $_GET['exam_code'];
									}
								?>
								" disabled="">
								<small id="" class="form-text text-danger"></small>
							</div>
						</div>
						<div class="row form-group">
							<div class="col">
								<label>Exam Subject</label>
								<input type="text" name="examSubject" class="form-control" placeholder="Anatomy" value="<?php
									if(isset($_GET['exam_subject'])){
										echo $_GET['exam_subject'];
									}
								?>
								" disabled="">
							</div>
							<div class="col">
								<label>Registered Students</label>
								<input type="file" name="registeredStudent" class="form-control" placeholder="" disabled="">
								<small id="" class="form-text text-muted">file in (xls, xlsx and xlt format only)</small>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<?php
								if (isset($message9)) {
									echo $message9;
								}
								?>
							</div>
							<div  class="col">
								<?php
								if (isset($message11)) {
									echo $message11;
								}
								if (isset($message12)) {
									echo $message12;
								}
								if (isset($message13)) {
									echo $message13;
								}
								if (isset($message8)) {
									echo $message8;
								}
								?>
							</div>
						</div>
						<div class="row form-group">
							<div class="col">
								<label>Start time</label>
								<input type="datetime-local" name="startExamTime" class="form-control" placeholder="">
								<small id="" class="form-text text-danger"><?php echo $message1??''; ?></small>
							</div>
							<div class="col">
								<label>End time</label>
								<input type="datetime-local" name="endExamTime" class="form-control" placeholder="">
								<small id="" class="form-text text-danger"><?php echo $message2??''; ?></small>
							</div>
						</div>
						<div class="row form-group">
							<div class="col">
								<label>Exam Duration</label>
								<div class="row">
								<div class="col">
								<select name="examDurationHours" class="form-control">
									<option value="">Select Hours</option>
									<?php
									for ($i=0; $i <= 24 ; $i++) { 
										?>
										<option value="<?php echo $i  ?>"><?php 
										if ($i<=1) {echo $i." hour";}else{ echo $i." hours";}
										 ?></option>
										}
									<?php
									}
									?>
								</select>
								<small id="" class="form-text text-danger"><?php echo $message3??''; ?></small>
								</div>
								<div class="col">
								<select name="examDurationMinutes" class="form-control">
									<option value="">Select Minutes</option>
									<?php
									for ($i=1; $i <= 60 ; $i++) { 
										?>
										<option value="<?php echo $i ; ?>"><?php 
											if ($i <= 1) {echo $i." minute";}else{echo $i." minutes";}
										 ?></option>
									<?php
									}
									?>
								</select>
								<small id="" class="form-text text-danger"><?php echo $message4??''; ?></small>
								</div>
								</div>
							</div>
							<div class="col">
								<label>Question arrangement</label>
								<select class="form-select form-select-lg form-control" arial-label="Default select example" name="questionArrangement" disabled=>
									<option value="">Select Question arrangement</option>
									<option value="1" selected>Randomize Questions</option>
									<option value="2">Fix Questions</option>
								</select>
								<small id="" class="form-text text-danger"><?php echo $message5??''; ?></small>
							</div>
						</div>
						<div class="row form-group">
							<div class="col">
								<label>Result release</label>
								<input type="datetime-local" name="resultReleaseDate" class="form-control">
								<small id="" class="form-text text-danger"><?php echo $message6??''; ?></small>
							</div>
							<div class="col mt-3">
								<?php
								if (isset($message10)) {
								echo $message10;
								}
								?>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col">
								<h3>General Instructions</h3>
								<div class="fixed top" style="color: grey;"></div>
								<textarea class="form-control" name="generalInstruction"></textarea>
								<small id="" class="form-text text-danger"><?php echo $message7??''; ?></small>
							</div>
						</div>
						<div class="row">
							<div class="col mt-4 mb-3">
								<input type="submit" name="updateExamination" class="btn btn-primary" id="addQuestionBtn" value="Update Examination">
								<div class="clear"></div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
		<!-- FOOTER -->
		<footer class="row">
			<div class="col text-center mt-4">
				<p>&copy;Copyright <a href="index.php"  class="text-decoration-none"><?php echo APPNAME." ".date('Y');?></a> | All right reserved | <a href=""  class="text-decoration-none">Terms and Condition</a> | <a href=""  class="text-decoration-none">Privacy Policy</a></p>
			</div>
		</footer>
	</div>
	<!--Javascript Files jquery, popper, bootstrap-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" language="javascript">
		$(document).ready(function(){
			

		//Javascript to add new questions

		})
	</script>
</body>
</html>