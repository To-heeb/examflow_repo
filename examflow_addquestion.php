<?php session_start();
if (empty($_SESSION['examiner_id'])) {
header("Location: examflow_login_signup.php?message=login");
exit;
}

include 'examflow_constants.php';					
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
				<form id="questionForm">
					<fieldset>
						<legend class="h1">New Question</legend>
						<h3 class="mt-4">Question Type</h3>
						<div class="row mt-4 form-group">
							<div class="col-9">
								<input type="hidden" name="exam_id" value="<?php echo $_GET['exam_id']??'' ?>">
								<select class="form-select form-select-lg form-control-lg" arial-label="Default select example" name="questionType" id="questionTypeDropDown">
									<option value="" >Question type</option>
									<option value="Objective Question" class="questionType" id="objectiveQuestion" selected="">Objective Question</option>
									<!-- <option value="Multichoice Question" class="questionType" id="multichoiceQuestion">Multichoice Question</option>
									<option value="Fill in the blank" class="questionType" id="fillInTheBlank">Fill in the blank</option>
									<option value="Theory Question" class="questionType" id="theoryQuestion">Theory Question</option> -->
								</select><br>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col">
								<h3>Instruction</h3>
								<div class="fixed top" style="color: grey;"></div>
								<textarea class="form-control" name="instruction" id="instruction"></textarea>
							</div>
						</div>
						<div class="row mt-md-4 mt-2">
							<div class="col">
								<h3>Question</h3>
								<div class="fixed top" style="color: grey;"></div>
								<textarea class="form-control" name="question" id="question"></textarea>
							</div>
						</div>
						<div id="questionTypeDiv">
							<!-- Objective Question Div -->
							<div id="objectiveQuestionDiv" class="questionDiv ml-1">
								<div class="row mt-4">
									<div class="col form-inline">
										<select class="form-select form-select-lg form-control" arial-label="Default select example" disabled="">
											<option value="">Select Option arrangement</option>
											<option value="">Randomize Options</option>
											<option value="">Fix Options</option>
										</select>
										<div class="form-group ml-4">
											<input type="number" name="questionMarkObj" class="form-control" placeholder="Question Mark">
										</div>
									</div>
								</div>
								<div class="row mt-md-4 mt-2">
									<input type="radio" name="radioOptionObj" class="form-check" value="A">
									<label class="form-label col-1">Option A</label>
									<div class="col-md-7">
										<textarea class="form-control" id="obj_textOptionA" name="objOption[A]"></textarea>
									</div>
								</div>
								<div class="row mt-md-4 mt-2">
									<input type="radio" name="radioOptionObj" class="form-check" value="B">
									<label class="form-label col-1">Option B</label>
									<div class="col-md-7" >
										<textarea class="form-control" id="obj_textOptionB" name="objOption[B]"></textarea>
									</div>
								</div>
								<div class="row mt-md-4 mt-2">
									<input type="radio" name="radioOptionObj" class="form-check" value="C">
									<label class="form-label col-1">Option C</label>
									<div class="col-md-7">
										<textarea class="form-control" id="obj_textOptionC" name="objOption[C]"></textarea>
									</div>
								</div>
								<div class="row mt-md-4 mt-2">
									<input type="radio" name="radioOptionObj" class="form-check" value="D">
									<label class="form-label col-1">Option D</label>
									<div class="col-md-7">
										<textarea class="form-control" id="obj_textOptionD" name="objOption[D]"></textarea>
									</div>
								</div>
							</div>
							<!-- Multichoice Question Div -->
							<div id="multichoiceQuestionDiv" class="questionDiv ml-1">
								<div class="row mt-4">
									<div class="col form-inline">
										<select class="form-select form-select-lg form-control" arial-label="Default select example">
											<option value="">Select Option arrangement</option>
											<option value="">Randomize Options</option>
											<option value="">Fix Options</option>
										</select>
										<div class="form-group ml-4">
											<input type="number" name="questionMarkMcq" class="form-control" placeholder="Postive mark">
										</div>
										<div class="form-group ml-4">
											<input type="number" name="negativeQuestionMark" class="form-control" placeholder="Negative mark">
										</div>
									</div>
								</div>
								<div class="row mt-md-4 mt-2">
									<input type="radio" name="radioOptionMcq" class="form-check" value="A">
									<label class="form-label col-1">Option A</label>
									<div class="col-md-7">
										<textarea class="form-control" id="mcq_textOptionA" name="mcqOption[A]"></textarea >
									</div>
								</div>
								<div class="row mt-md-4 mt-2">
									<input type="radio" name="radioOptionMcq" class="form-check" value="B">
									<label class="form-label col-1">Option B</label>
									<div class="col-md-7">
										<textarea class="form-control" id="mcq_textOptionB" name="mcqOption[B]"></textarea>
									</div>
								</div>
								<div class="row mt-md-4 mt-2">
									<input type="radio" name="radioOptionMcq" class="form-check" value="C">
									<label class="form-label col-1">Option C</label>
									<div class="col-md-7">
										<textarea class="form-control" id="mcq_textOptionC" name="mcqOption[C]"></textarea>
									</div>
								</div>
								<div class="row mt-md-4 mt-2">
									<input type="radio" name="radioOptionMcq" class="form-check" value="D">
									<label class="form-label col-1">Option D</label>
									<div class="col-md-7">
										<textarea class="form-control" id="mcq_textOptionD" name="mcqOption[D]"></textarea>
									</div>
								</div>
							</div>
							<!-- Fill In The Blank Question Div -->
							<div id="fillInTheBlankQuestionDiv" class="questionDiv">
								<div class="row mt-4 mb-3">
									<div class="col form-inline">
										<div class="form-group ml-0">
											<input type="number" name="questionMarkFib" class="form-control" placeholder="Question mark">
										</div>
									</div>
								</div>
								<div class="col-md-7">
									<div class="form-group">
										<label class="display-4" id="correctAnswer">Correct answer</label>
										<input type="text" name="fillInTheBlankAnswer" id="" class="form-control">
									</div>
								</div>
							</div>
							<!-- Theory Question Div -->
							<div id="theoryQuestionDiv" class="questionDiv">
								<div class="row mt-4 mb-3">
									<div class="col form-inline">
										<div class="form-group ml-0">
											<input type="number" name="questionMarkThe" class="form-control" placeholder="Question mark">
										</div>
									</div>
								</div>
								<p class="" id="theoryQuestionInfo">This question will be manually marked by the examiner and examflow aggregate the results.</p>
							</div>
						</div>
						<div id="output" class="mb-3 mt-3">
							
						</div>
						<div class="row">
							<div class="col mt-4 mb-3">
								<input type="hidden" name="addQuestion" value="addQuestion">
								<input type="button" name="" class="btn btn-primary" id="addQuestionBtn" value="Save Question">
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


			$("#addQuestionBtn").click(function(){
				//storing form data in array with serialize

				var questionFormData = $('#questionForm').serialize();
				//alert(questionFormData);

				//using ajax method
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: questionFormData,
					success: function(result){
						$("#output").html(result);
						//empty the form fields for new questions
						$("#questionTypeDropDown").val("")
						$('#instruction').val("");
						$('#question').val("");
						//empty the form fields for Objective questions
						$("[name=radioOptionObj]").prop(checked, false);
						$("[name=questionMarkObj]").val("");
						$('#obj_textOptionA').html("");
						$('#obj_textOptionB').html("");
						$('#obj_textOptionC').html("");
						$('#obj_textOptionD').html("");
						$('#output').mouseover(function(){
							$(this).html('');
						})

						//empty the form fields for Multichoice questions
						$("[name=radioOptionMcq]").prop(checked, false);
						$("[name=questionMarkMcq]").val("");
						$("[name=negativeQuestionMark]").val("")
						$('#mcq_textOptionA').val("");
						$('#mcq_textOptionB').val("");
						$('#mcq_textOptionC').val("");
						$('#mcq_textOptionD').val("");
						//empty the form fields for fill in the blank questions
						$('name=["fillInTheBlankAnswer"]').val();
					},
					error: function(error){
						console.log(error);
						$('#output').html('Oops! New examination creation failed, Plese try again later ');
					}
				})
			})


			$("#objectiveQuestionDiv").show();
			$("#multichoiceQuestionDiv").hide();
			$("#fillInTheBlankQuestionDiv").hide();
			$("#theoryQuestionDiv").hide();

			//For selection of questionTypeDropDown
			$("#questionTypeDropDown").click(function(){
				var val = $(this).val();

			    // Javascript to show and hide queston based on selection from question type
				switch(val){
					case 'Multichoice Question':
						$(".questionDiv").hide();
						$("#multichoiceQuestionDiv").show();
					break;
					case 'Fill in the blank':
						$(".questionDiv").hide();
						$("#fillInTheBlankQuestionDiv").show();
					break;
					case 'Theory Question':
						$(".questionDiv").hide();
						$("#theoryQuestionDiv").show();
					break;
					 case 'Objective Question':
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