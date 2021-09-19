<?php
include 'examflow_constants.php';
include_once 'examflow_classes.php';
if (isset($_GET['exam_id'])) {
	$exam_id = $_GET['exam_id'];
	$exam_title = $_GET['exam_title'];


	//Instantiating object of class Examination for adminViewResult method but the method used here is the examiner method because i am too lazy to do another one for the admin afterall they are exactly the same thing
	$objResult = new Examination;
	$output = $objResult->examinerViewResult($exam_id);
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
	<!--Bootstrap Stylesheet-->
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&family=Satisfy&display=swap" rel="stylesheet">
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
			min-height: 650px;
		}
		footer{
			background: rgba(255, 255, 255, 0.7);
			background-color: #0B1D51;
			min-height: 70px;
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
<body>
	<div class="container-fluid">
		<div id="container">
		<div class="row">
			<div class="col">
				<header class="row mb-5" id="header">
					<div class="col-12">
						<!--Navbar Header-->
						<nav class="navbar navbar-expand-lg navbar-light font-weight-bold" id="navbar">
						  <a class="navbar-brand" href="index.php"><img src="exam_image/exam3.png" alt="logo" id="logo"><span id="examflow">Exam<span id="f_examflow">f</span>low</span></a>
						</nav>
					</div>
				</header>
			</div>
		</div>
		<div class="row">
			<div class="offset-1 col-9">
				<?php
				if (isset($output)) {
					/*echo "<pre>";
					print_r($output);
					echo "</pre>";*/
					?>
					<div class="table-responsive-lg">
					<table class="table table-hover table-striped table-light table-bordered text-bold w-100 d-block d-md-table" >
						<thead class="bg-secondary text-light">
							<th scope="col">S/N</th>
							<th scope="col">Student Name</th>
							<th scope="col">Action</th>
						</thead>
						<tbody>
							<?php
							foreach ($output as $key => $value) {
							?>
							<tr> 
								<td><?php echo ++$key?></td>
								<td><?php echo $value['student_lname']." ".$value['student_fname']; ?></td>
								<td class="text-center"><a href="#" class="btn btn-primary btn-sm" id="viewResults" data-id="<?php echo $value['student_id'];?>" data-exam="<?php echo $exam_id ;?>" data-name="<?php echo $value['student_lname']." ".$value['student_fname']; ?>"  data-toggle='modal' data-target='#resultModal' data-title="<?php echo $exam_title; ?>">View Result</a></td>
							</tr>
							<?php
							}	
							
							?>
						</tbody>
					</table>
					</div>
				<?php	
					}else{
						?>
						<div class="alert alert-info">Result yet to be released checkback in a while.</div>
					<?php
					}
				?>
			</div>
		</div>
		<!-- Begin Modal for Student Examination Results -->
	    <div class="modal fade" id="resultModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	      <div class="modal-dialog">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title" id="staticBackdropLabel">Student's result</h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	          </div>
	          <div class="modal-body">
	          	<div id="viewResultDiv">
	             
	            </div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	          </div>
	        </div>
	      </div>
	    </div>
	  <!-- End Modal for Student Examination Results -->	
	</div>
		<div class="">
			<footer class="row">
				<div class="col-12 mt-4">
					<div class="col text-center">
						<p>&copy;Copyright <a href="index.php" class="text-decoration-none"><?php echo APPNAME." ".date('Y');?></a> | All right reserved</p>
					</div>
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

			//Begin view Student Examination Result 
			jQuery(document).on('click', '[id^=viewResults]',function(){
				//alert('I got here');
				var student_id = $(this).data('id');
				var exam_id = $(this).data('exam')
				var student_name =  $(this).data('name')
				var exam_title =  $(this).data('title')
					//alert(exam_id)
					//alert(student_id)
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: "adminViewResultPage=adminViewResult&student_id="+student_id+"&exam_id="+exam_id+"&student_name="+student_name+"&exam_title="+exam_title,
					success: function(result){
						$("#viewResultDiv").html(result);
					},
					error: function(error){
						console.log(error);
					}
				})
			})
			//End view Student Examination Result 
		
		})
	</script>
</body>
</html>