<?php
include 'examflow_constants.php';

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
			height: 33px;
			width: 33px;
			border-radius: 50px;
		}
		#examTitleDiv{
			height: 100px;
		}
		#instructionDiv{
			height: 100px;
		}
		#questionImgDiv{
			height: 200px;
		}
		#questionDiv{
			min-height: 70px;
		}
		#optionDiv{
			min-height: 200px;
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
				<h3>Exam title</h3>
			</div>
			<div class="col-3 mt-2">
				<img src="exam_image/avatar1.png" alt="an alt" id="studentImg">&nbsp;
				<span>Oyekola</span>
				<span>Toheeb</span>
			</div>
		</div>
		<div class="row">
			<div class="col-8 pl-2" id="mainDiv">
				<div class="row" id="instructionDiv">
					<div class="col">
						<h4>Instruction</h4>
					</div>
				</div>
				<div class="row" id="questionImgDiv" hidden>
					<div class="col">
						<img src="" alt="" class="img-fluid">
					</div>
				</div>
				<div class="row" id="questionDiv">
					<div class="col">
						<p><span> 1) </span>What is the Capital of France?</p>
					</div>
				</div>
				<form>
					<div class="row mt-4">
						<div class="col">
							<h4>Type your answer here</h4>
							<div class="fixed top" style="color: grey;">Formatting Area</div>
							<textarea class="form-control" rows="10" name=""></textarea>
						</div>
					</div>
					<div class="row mt-3" id="resetDiv">
						<div class="col">
							<input type="reset" name="" class="btn btn-primary">
						</div>
					</div>
				</form>
				<div class="row" id="redirectDiv">
					<div class="col clear-fix">
						<button type="button" class="btn btn-secondary" id="">Previous</button>
						<button type="button" class="btn btn-success float-right" id="">Next</button>
					</div>
				</div>
			</div>
			
			<aside class="col-4" id="asideDiv">
				<div class="row" id="examTimerDiv">
					<div class="col">
						<h4>Time left : 00:00:00</h4>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<h3>Question</h3>
						<div class="row">
							<div class="col">
								<div class="row btnLabel">
									<div class="col">
										<div class="btn-group" role="group" aria-label="Basic mixed styles example">
										<input type="button" name="" value="1" class="btn btn-success m-1">
										<input type="button" name="" value="2" class="btn btn-success m-1">
										<input type="button" name="" value="3" class="btn btn-danger m-1">
										<input type="button" name="" value="4" class="btn btn-dark m-1">
										<input type="button" name="" value="5" class="btn btn-danger m-1">
										<input type="button" name="" value="6" class="btn btn-dark m-1">
										<input type="button" name="" value="7" class="btn btn-dark m-1">
										</div>
									</div>
								</div>
								<div class="row btnLabel">
									<div class="col">
										<div class="btn-group" role="group" aria-label="Basic mixed styles example">
										
										<input type="button" name="" value="8" class="btn btn-success m-1">
										<input type="button" name="" value="9" class="btn btn-danger m-1">
										<input type="button" name="" value="10" class="btn btn-success m-1">
										<input type="button" name="" value="11" class="btn btn-success m-1">
										<input type="button" name="" value="12" class="btn btn-danger m-1">
										<input type="button" name="" value="13" class="btn btn-dark m-1">
										
										</div>
									</div>
								</div>
								<div class="row btnLabel">
									<div class="col">
										<div class="btn-group" role="group" aria-label="Basic mixed styles example">
										<input type="button" name="" value="14" class="btn btn-danger m-1">
										<input type="button" name="" value="15" class="btn btn-dark m-1">
										<input type="button" name="" value="16" class="btn btn-dark m-1">
										<input type="button" name="" value="17" class="btn btn-success m-1">
										<input type="button" name="" value="18" class="btn btn-dark m-1">
										<input type="button" name="" value="19" class="btn btn-dark m-1">
										</div>
									</div>
								</div>
							</div>
						</div>
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
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#submit">Submit</button>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="submit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
					        <button type="button" class="btn btn-primary" id="" data-dismiss="modal">End Exam</button>
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