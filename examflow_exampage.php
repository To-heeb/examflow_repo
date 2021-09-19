<?php session_start();
if (empty($_SESSION['student_passcode'])) {
	header("Location: examflow_examlogin.php");
}

include 'examflow_constants.php';
include_once 'examflow_classes.php';
$exam_id = $_SESSION['exam_id'];
$student_image = $_SESSION['image'];

//Instantiating for an object of class Examinations method getExaminationDuration 
$object = new Examination;
$output = $object->getExaminationDuration($exam_id);
foreach ($output as $key => $value) {
	$exam_duration = $value['exam_duration'];	
}


if (!empty($_POST)) {
	if (isset($_POST['submitExamBtn'])) {

		// $serialized_data = serialize($_POST);
		// echo $serialized_data;

	$studentOptions = $_POST;
	/*echo "<pre>";
	var_dump($studentOptions);
	echo "</pre>";*/

	//echo $studentOptions['student_id'];
	$exam_id = $studentOptions['exam_id'];
	$student_id = $studentOptions['student_id'];
	$studentAnswers = $studentOptions['options'];
	//ucwords(strtolower(trim($option_name)))

	$objectStudentOptions = new Examination;
	$output = $objectStudentOptions->studentExamOptions($studentAnswers, $student_id, $exam_id);




  }
}
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
	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&family=Satisfy&display=swap" rel="stylesheet">
	<!--Bootstrap Stylesheet-->
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
	<!--External Stylesheet-->
	<link rel="stylesheet" type="text/css" href="">
	<!--Internal Stylesheet-->
	<style type="text/css">
		div{
			/*min-height: 100px;*/
			border: 0px solid red;	
		}
		#navbar{
			background-color: #A6BDF0;
			font-size: 18px;
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
		#studentImg{
			height: 40px;
			width: 40px;
			border-radius: 50px;
		}
		#examTitleDiv{
			height: 100px;
		}
		#instructionDiv{
			height: 70px;
		}
		#questionImgDiv{
			height: 200px;
		}
		#questionDiv{
			min-height: 70px;
		}
		#optionDiv{
			min-height: 150px;
		}
		#resetDiv{
			height: 80px;
		}
		#redirectDiv{
			height: 100px;
		}
		#mainDiv{
			border: 0px solid grey;
		}
		#asideDiv{
			border: 1px solid grey;
		}
		#examTimerDiv{
			height: 100px;
		}
		.btnLabel{
			height: 50px;
		}
		#submitBtnDiv{
			height: 100px;
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
		<header class="row" id="header">
			<div class="col-12">
				<!--Navbar Header-->
				<nav class="navbar navbar-expand-lg navbar-light font-weight-bold" id="navbar">
				  <a class="navbar-brand" href="#"><img src="exam_image/exam3.png" alt="logo" id="logo"><span id="examflow">Exam<span id="f_examflow">f</span>low</span></a>

				</nav>
			</div>
		</header>
		<div class="row" id="examTitleDiv">
			<div class="col-9 mt-2">
				<h3><?php echo $_SESSION['exam_title'] ?></h3>
			</div>
			<div class="col-3 mt-2">
				<img src="examflow_profilepictures/<?php echo $student_image ??'avatar.png' ?>" alt="an alt" id="studentImg">&nbsp;
				<span><?php echo $_SESSION['lname']; ?></span>
				<span><?php echo $_SESSION['fname']; ?></span>
			</div>
		</div>
		<div class="row">
			
			<div class="col-8 pl-2" id="mainDiv">
				<form method="post" action="">
				<?php
				include_once 'examflow_classes.php';

				//instantaiting an object of class Questions for method displayAllQuestions
				$objectOfQuestions = new Questions;
				$output = $objectOfQuestions->displayAllQuestions($exam_id);

				if (is_array($output)) {
					$kounter = 0;
					shuffle($output);
					foreach ($output as $key => $value) {	
					
				?>
				<div class="row" id="instructionDiv">
					<div class="col">
						<h4><?php echo $value['instruction']?></h4>
					</div>
				</div>
				<div class="row" id="questionImgDiv" hidden>
					<div class="col">
						<img src="" alt="" class="img-fluid">
					</div>
				</div>
				<div class="row" id="questionDiv">
					<div class="col">
						<p><span data-question_id="<?php echo $value['question_id'] ?>"><?php echo ++$kounter.")  ".$value['question'] ?></p>
					</div>
				</div>
				<?php
					if ($value['question_type_name'] == 'Objective Question' || $value['question_type_name'] == 'Multichoice Question' ) {
					?>
				<div class='form-group form'>
					<div class="row" id="optionDiv">
						<div class="col">
							<?php
							//Instantiating for an object of class Questions method getOptions
							$objectOfQuestions = new Questions;
							$options = $objectOfQuestions->getOptions($value['question_id']);

							if (is_array($options)) {

								foreach ($options as $key => $value) {
								
							?>
							<label><?php echo $value['option_name'] ?>. <input type="radio" name="options[<?php echo $value['question_id']  ?>]" id="<?php echo "option".$value['question_id']  ?>" value="<?php echo $value['option_name'] ?>" data-id="<?php echo $value['question_id']  ?>"> <?php echo $value['option_value'];?></label><br>
							
							<?php
							} }else{
								echo "No option setted for this question";
							}
							?>
						</div>
					</div>
					<div class="row" id="resetDiv">
						<div class="col">
							<input type="button" name="" for="" class="btn btn-primary" id="<?php echo "resetBtn".$value['question_id'] ?>" data-id="<?php echo $value['question_id'] ?>" value='Reset'>
						</div>
					</div>
				</div>
				<?php
				}elseif($value['question_type_name'] == 'Fill in the blank' || $value['question_type_name'] == 'Theory Question' ) {

				?>
				<textarea name="options[<?php echo $value['question_id']; ?>]" cols="50" rows="3" class="mb-3"></textarea>
				<?php
				} 
				  } 
					}else{echo "<div class='display-3'>No questions yet for this examination, please add questions to this examination.</div>";
					}
				?>
				<div class="row" id="redirectDiv">
					<div class="col clearfix">
						
						<input type="hidden" name="exam_id" value="<?php echo $_SESSION['exam_id']; ?>">
						<input type="hidden" name="student_id" value="<?php echo $_SESSION['student_id'] ?>">
						<input type="hidden" name="exam_duration" id="exam_duration" value="<?php echo $exam_duration ?>">
						<input type="hidden" name="" value="">
						<input type="submit" class="btn btn-danger float-right" value="Submit" name="submitExamBtn" id="submitExamBtn">
						<!-- <button type="button" class="btn btn-secondary" id="">Previous</button>
						<button type="button" class="btn btn-success float-right" id="">Next</button> -->
						<!-- Modal -->
					</div>
				</div>
				</form>
			</div>
		
			
			<aside class="col-4" id="asideDiv">
				<div class="row" id="examTimerDiv">
					<div class="col position-fixed">
						<h4 class="">Duration: <?php echo $exam_duration ?> Minutes </h4>
					</div>
				</div>
				
				
			</aside>
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
		$(document).ready(function(){
			var exam_duration = $('#exam_duration').val();

			var exam_time = exam_duration * 60000;
			 
			 setTimeout(function(){
			 	$("#submitExamBtn").click();
			 }, exam_time)


			//Begin using jquery for reset button
			jQuery(document).on('click', '[id^=resetBtn]',function(){
				alert("I got here")
				


				
			})
			//End using jquery for reset button
		})
	</script>
</body>
</html>