<?php
include 'examflow_constants.php';
if (!empty($_POST['save'])) {
	if (empty($_POST['examTitle'])) {
		$message1 = "This field is required for a new examination to be saved";
	}
	if (empty($_POST['examCode'])) {
		$message2 = "This field is required for a new examination to be saved";
	}
	if (empty($_POST['examSubject'])) {
		$message3 = "This field is required for a new examination to be saved";
	}
}

?><!DOCTYPE html>
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
				<form action="" method="post">
					<fieldset>
						<legend>New Examination</legend>
						<div class="row form-group">
							<div class="col">
								<label>Exam title / header</label>
								<input type="text" name="examTitle" class="form-control" placeholder="Human Anatomy">
								<small id="" class="form-text text-danger"><?php echo $message1??''; ?></small>
							</div>
							<div class="col">
								<label>Exam code</label>
								<input type="text" name="examCode" class="form-control" placeholder="ANA208">
								<small id="" class="form-text text-danger"><?php echo $message2??''; ?></small>
							</div>
						</div>
						<div class="row form-group">
							<div class="col">
								<label>Exam Subject</label>
								<input type="text" name="examSubject" class="form-control" placeholder="Anatomy">
								<small id="" class="form-text text-danger"><?php echo $message3??''; ?></small>
							</div>
							<div class="col">
								<label>Registered Students</label>
								<input type="file" name="" class="form-control" placeholder="">
							</div>
						</div>
						<div class="row form-group">
							<div class="col">
								<label>Start time</label>
								<input type="datetime-local" name="startExamTime" class="form-control" placeholder="">
							</div>
							<div class="col">
								<label>End time</label>
								<input type="datetime-local" name="endExamTime" class="form-control" placeholder="">
							</div>
						</div>
						<div class="row form-group">
							<div class="col">
								<label>Exam Duration</label>
								<div class="row">
								<div class="col">
								<select name="examDurationHours" class="form-control">
									<option>Select Hours</option>
									<?php
									for ($i=0; $i <= 24 ; $i++) { 
										?>
										<option value="<?php echo $i; ?>"><?php 
										if ($i<=1) {echo $i." hr";}else{ echo $i." hrs";}
										 ?></option>
										}
									<?php
									}
									?>
								</select>
								</div>
								<div class="col">
								<select name="examDurationMinutes" class="form-control">
									<option>Select Minutes</option>
									<?php
									for ($i=1; $i <= 60 ; $i++) { 
										?>
										<option value="<?php echo $i; ?>"><?php 
											if ($i <= 1) {echo $i." min";}else{echo $i." mins";}
										 ?></option>
									<?php
									}
									?>
								</select>
								</div>
								</div>
							</div>
							<div class="col">
								<label></label>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col">
								<h3>General Instruction</h3>
								<div class="fixed top" style="color: grey;">Formatting Area</div>
								<textarea class="form-control" name="generalInstruction"></textarea>
							</div>
						</div>
						<div class="row mt-4 form-group">
							<div class="col form-inline">
								<select class="form-select form-select-lg form-control" arial-label="Default select example" name="questionArrangement">
									<option value="">Select Question arrangement</option>
									<option value="randomize">Randomize Questions</option>
									<option value="fixed">Fix Questions</option>
								</select>
								<select class="form-select form-select-lg ml-4 form-control" arial-label="Default select example" name="questionType" id="questionTypeDropDown">
									<option value="" >Question type</option>
									<option value="multichoiceQuestion" class="questionType" id="multichoiceQuestion">Multichoice Question</option>
									<option value="objectiveQuestion" class="questionType" id="objectiveQuestion">Objective Question</option>
									<option value="fillInTheBlank" class="questionType" id="fillInTheBlank">Fill in the blank</option>
									<option value="theoryQuestion" class="questionType" id="theoryQuestion">Theory Question</option>
								</select>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col">
								<h3>Instruction</h3>
								<div class="fixed top" style="color: grey;">Formatting Area</div>
								<textarea class="form-control" name=""></textarea>
							</div>
						</div>
						<div class="row mt-md-4 mt-2">
							<div class="col">
								<h3>Question</h3>
								<div class="fixed top" style="color: grey;">Formatting Area</div>
								<textarea class="form-control"></textarea>
							</div>
						</div>
						<div id="questionTypeDiv">
							<!-- Objective Question Div -->
							<div id="objectiveQuestionDiv" class="questionDiv ml-1">
								<div class="row mt-4">
									<div class="col form-inline">
										<select class="form-select form-select-lg form-control" arial-label="Default select example">
											<option value="">Select Option arrangement</option>
											<option value="">Randomize Options</option>
											<option value="">Fix Options</option>
										</select>
										<div class="form-group ml-4">
											<input type="number" name="questionMark" class="form-control" placeholder="Question Mark">
										</div>
									</div>
								</div>
								<div class="row mt-md-4 mt-2">
									<input type="radio" name="option1" class="form-check">
									<label class="form-label col-1">Option A</label>
									<div class="col-md-7">
										<div class="fixed top" style="color: grey;">Formatting Area</div>
										<textarea class="form-control"></textarea>
									</div>
								</div>
								<div class="row mt-md-4 mt-2">
									<input type="radio" name="option1" class="form-check">
									<label class="form-label col-1">Option B</label>
									<div class="col-md-7">
										<div class="fixed top" style="color: grey;">Formatting Area</div>
										<textarea class="form-control"></textarea>
									</div>
								</div>
								<div class="row mt-md-4 mt-2">
									<input type="radio" name="option1" class="form-check">
									<label class="form-label col-1">Option C</label>
									<div class="col-md-7">
										<div class="fixed top" style="color: grey;">Formatting Area</div>
										<textarea class="form-control"></textarea>
									</div>
								</div>
								<div class="row mt-md-4 mt-2">
									<input type="radio" name="option1" class="form-check">
									<label class="form-label col-1">Option D</label>
									<div class="col-md-7">
										<div class="fixed top" style="color: grey;">Formatting Area</div>
										<textarea class="form-control"></textarea>
									</div>
								</div>
							</div>
							<!-- Multichoice Question Div -->
							<div id="multichoiceQuestionDiv" class="questionDiv ml-1">
								<div class="row mt-4">
									<div class="col form-inline">
										<select class="form-select form-select-lg form-control" arial-label="Default select example">
											<option>Select Option arrangement</option>
											<option>Randomize Options</option>
											<option>Fix Options</option>
										</select>
										<div class="form-group ml-4">
											<input type="number" name="questionMark" class="form-control" placeholder="Postive mark">
										</div>
										<div class="form-group ml-4">
											<input type="number" name="questionMark" class="form-control" placeholder="Negative mark">
										</div>
									</div>
								</div>
								<div class="row mt-md-4 mt-2">
									<input type="radio" name="option1" class="form-check">
									<label class="form-label col-1">Option A</label>
									<div class="col-md-7">
										<div class="fixed top" style="color: grey;">Formatting Area</div>
										<textarea class="form-control"></textarea>
									</div>
								</div>
								<div class="row mt-md-4 mt-2">
									<input type="radio" name="option1" class="form-check">
									<label class="form-label col-1">Option B</label>
									<div class="col-md-7">
										<div class="fixed top" style="color: grey;">Formatting Area</div>
										<textarea class="form-control"></textarea>
									</div>
								</div>
								<div class="row mt-md-4 mt-2">
									<input type="radio" name="option1" class="form-check">
									<label class="form-label col-1">Option C</label>
									<div class="col-md-7">
										<div class="fixed top" style="color: grey;">Formatting Area</div>
										<textarea class="form-control"></textarea>
									</div>
								</div>
								<div class="row mt-md-4 mt-2">
									<input type="radio" name="option1" class="form-check">
									<label class="form-label col-1">Option D</label>
									<div class="col-md-7">
										<div class="fixed top" style="color: grey;">Formatting Area</div>
										<textarea class="form-control"></textarea>
									</div>
								</div>
							</div>
							<!-- Fill in the Blank Div 

						 The examiner  will fill in the correct answer in the blank here in the exam creation page and the student will have an input tag/ textarea tag to place the answer to the question and the answer of the student will be compared to that of the lecturer to getr the mark.  
							 -->
							<div id="fillInTheBlankQuestionDiv" class="questionDiv">
								<div class="row mt-4 mb-3">
									<div class="col form-inline">
										<div class="form-group ml-0">
											<input type="number" name="questionMark" class="form-control" placeholder="Question mark">
										</div>
									</div>
								</div>
								<div class="col-md-7">
									<div class="form-group">
										<label class="display-4" id="correctAnswer">Correct answer</label>
										<input type="text" name="" id="" class="form-control">
									</div>
								</div>
							</div>
							<!-- Theory Div 

								For theory questions there will only be instruction and question then the exam page of the student will have a textarea for the students to answer the question
							 -->
							<div id="theoryQuestionDiv" class="questionDiv">
								<div class="row mt-4 mb-3">
									<div class="col form-inline">
										<div class="form-group ml-0">
											<input type="number" name="questionMark" class="form-control" placeholder="Question mark">
										</div>
									</div>
								</div>
								<p class="" id="theoryQuestionInfo">This question will be manually marked by the examiner and examflow aggregate the results.</p>
							</div>
						</div>
						<div class="row mt-4">
							<!-- Preview will be on another page -->
							<!-- <div class="col-1 mt-3">
								<input type="button" name="" class="btn btn-info" value="Preview">
							</div> -->
							<div class="col">
								<input type="button" name="" class="btn btn-danger" id="deleteBtn" value="Delete">
								<div class="clear"></div>
							</div>
						</div>
						<div class="row">
							<div class="col mt-3">
								<input type="button" name="" class="btn btn-primary" id="addQuestionBtn" value="Add Question">
								<div class="clear"></div>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col mt-3">
								<input type="submit" name="save" class="btn btn-dark" value="Save">
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
			$("#objectiveQuestionDiv").show();
			$("#multichoiceQuestionDiv").hide();
			$("#fillInTheBlankQuestionDiv").hide();
			$("#theoryQuestionDiv").hide();

			//For selection of questionTypeDropDown
			$("#questionTypeDropDown").click(function(){
				$val = $(this).val();

			    // Javascript to show and hide queston based on selection from question type
				switch($val){
					case 'multichoiceQuestion':
						$(".questionDiv").hide();
						$("#multichoiceQuestionDiv").show();
					break;
					case 'fillInTheBlank':
						$(".questionDiv").hide();
						$("#fillInTheBlankQuestionDiv").show();
					break;
					case 'theoryQuestion':
						$(".questionDiv").hide();
						$("#theoryQuestionDiv").show();
					break;
					 case 'objectiveQuestion':
					 	$(".questionDiv").hide();
					 	$('#objectiveQuestionDiv').show();
					 	break;
				  default:
						 $(".questionDiv").hide();
						$("#objectiveQuestionDiv").show();
					break;
				}
				
			})

		})
	</script>
</body>
</html>