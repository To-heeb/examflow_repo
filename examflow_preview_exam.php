<?php session_start();
include 'examflow_constants.php';
if (empty($_SESSION['examiner_id'])) {
header("Location: examflow_login_signup.php?message=login");

exit;
}

$exam_id = $_GET['exam_id'];
$fullname = $_SESSION['examiner_lname']." ".$_SESSION['examiner_fname'];
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
				<h3><?php echo $_GET['exam_title'] ?></h3>
			</div>
			<div class="col-3 mt-2">
				<img src="examflow_profilepictures/<?php echo $examiner_image ??'avatar.png';?>" alt="an alt" id="studentImg">&nbsp;
				<span><?php echo $_SESSION['examiner_lname']; ?></span>
				<span><?php echo $_SESSION['examiner_fname']; ?></span>
			</div>
		</div>
		<div class="row">
			
			<div class="col-8 pl-2" id="mainDiv">
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
				<form>
					<div class="row" id="optionDiv">
						<div class="col">
							<?php
							//Instantiating for an object of class Questions method getOptions
							$objectOfQuestions = new Questions;
							$options = $objectOfQuestions->getOptions($value['question_id']);

							if (is_array($options)) {

								foreach ($options as $key => $value) {
								
							?>
							<label><?php echo $value['option_name'] ?>. <input type="radio" name="question1" value="<?php echo $value['option_name'] ?>"> <?php echo $value['option_value'];?></label><br>
							
							<?php
							} }else{
								echo "No option setted for this question";
							}
							?>
						</div>
					</div>
					<div class="row" id="resetDiv">
						<div class="col">
							<input type="reset" name="" class="btn btn-primary">
						</div>
					</div>
				</form>
				<?php
				}elseif($value['question_type_name'] == 'Fill in the blank' || $value['question_type_name'] == 'Theory Question' ) {

				?>
				<textarea name="" value="" cols="50" rows="3" class="mb-3"></textarea>
				<?php
				} 
				  } 
					}else{echo "<div class='display-3'>No questions yet for this examination, please add questions to this examination.</div>";
					}
				?>
			</div>
			
			<aside class="col-4" id="asideDiv">
				<div class="row" id="examTimerDiv">
					<div class="col position-fixed">
						<h4>Time left : 00:00:00</h4>
					</div>
				</div>
				
				<div class="row btnLabel mt-5">
					<div class="col" >
						<input type="button" name="" class="btn btn-success" value="Tag" readonly>
						<label>Answered</label>
					</div>
				</div>
				<div class="row" >
					<div class="col btnLabel">
						<input type="button" name="" class="btn btn-danger" value="Tag" readonly>
						<label>Unanswered</label>
					</div>
				</div>
				<div class="row" >
					<div class="col btnLabel" >
						<input type="button" name="" class="btn btn-dark" value="Tag" readonly>
						<label>Unvisited</label>
					</div>
				</div>
				<div class="row mt-5" id="submitBtnDiv">
					<div class="col">
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Submit</button>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title" id="exampleModalLabel">Examination Submission</h4>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <p class="display-6">Are you sure you want to submit and end exam now ?</p>
					        <p class="display-6">Cross check your work cross yout t's and dot your i's.</p>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <button type="submit" class="btn btn-primary" id="" data-dismiss="modal">End Exam</button>
					      </div>
					    </div>
					  </div>
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
			$("#submit").click(function(){
			})
		}
			)
	</script>
</body>
</html>