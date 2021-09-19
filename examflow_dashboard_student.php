<?php session_start();
include 'examflow_constants.php';
if (empty($_SESSION['student_id'])) {
	header("Location: examflow_login_signup.php?message=login");
	exit;
}

$fullname = $_SESSION['student_lname']." ".$_SESSION['student_fname'];
$email = $_SESSION['student_email'];
$acctType = $_SESSION['acctType3'];
$student_id = $_SESSION['student_id'];
$student_image = $_SESSION['student_image'];

if (isset($_POST['profilePictureBtn'])) {
	/*echo "<pre>";
	print_r($_FILES);
	echo "</pre>";*/

	$filename = $_FILES['profilePicture']['name'];
	$filetype = $_FILES['profilePicture']['type'];
	$filetemp = $_FILES['profilePicture']['tmp_name'];
	$file_error = $_FILES['profilePicture']['error'];
	$filesize = $_FILES['profilePicture']['size'];

	$errors = array();

	//validate your input
	if ($file_error > 0) {
		$errors[] = "<div class='alert alert-danger'>You have not selected any file for upload!</div>";

	}

	if ($filesize > 2097152) {
		$errors[] = "<div class='alert alert-danger'>Image should be less than 2megabytes</div>";
	}

	$extensions = array("jpg", "png", "jpeg", "gif");
	$file_ext = explode(".", $filename);
	$file_ext = end($file_ext);
	$file_ext_lowerCase = strtolower($file_ext);

	if (!in_array($file_ext_lowerCase, $extensions)) {
		$errors[] = "<div class='alert alert-danger'>File extension not allowed</div>";

	}

	if (empty($errors)){
		//include examflow classes
		include 'examflow_classes.php';
		//create Users instance
		$obj = new Users;
		//Calling updateProfilePicture method to upload profile picture
		$output = $obj->studentUpdateProfilePicture($filetemp, $file_ext_lowerCase, $student_id);
	}


}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - <?php echo APPNAME; ?></title>
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
	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="bootstrap-icons-1.5.0/font/bootstrap-icons.css">
	<!--External Stylesheet-->
	<link rel="stylesheet" type="text/css" href="">
	<style type="text/css">
		#navbar{
			background-color: #A6BDF0;
			font-size: 18px;
		}
		.nav-item a:hover{
			color: #AAAE8E !important;
			font-size: 17px;
			background-color: #0B1D51;
			border-radius: 50px;
			font-weight: lighter;
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
	 	.bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      	}
      	.dashboard-card{
      		box-shadow: 0 4px 8px 2px rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.29);
      	}
      	.dashboard-card:hover{
      		height: 200px;
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
		.bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
	</style>
</head>
<body>
	<header class="row" id="header">
		<!--Navbar Header-->
		<div class="col-12">
			<nav class="navbar navbar-expand-lg navbar-light font-weight-bold" id="navbar">
			   <a class="navbar-brand" href="index.php"><img src="exam_image/exam3.png" alt="logo" id="logo"><span id="examflow">Exam<span id="f_examflow">f</span>low</span></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item active">
			        <a class="nav-link" ><span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" ></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link disabled" tabindex="-1" aria-disabled="true"></a>
			      </li>
			    </ul>
			    <form class="form-inline my-2 my-lg-0">
			      <input class="form-control mr-sm-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
			      <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
			    </form>
			    <ul class="list-style-type-none navbar-nav">
			       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <img src="examflow_profilepictures/<?php echo $student_image ??'avatar.png';?>" alt="mdo" width="32" height="32" class="rounded-circle">
		        </a>
			  </ul>
			  </div>
			</nav>
		</div>
	</header>
	<!-- Side Navbar -->
	<div class="container-fluid">
	  <div class="row">
	    <nav id="sidebarMenu" class="col-md-3 col-lg-2 col-sm-12 d-md-block bg-light sidebar">
	      <div class="sidebar-sticky pt-3">
	      	<div class="align-items-center">
	      		<img src="examflow_profilepictures/<?php echo $student_image ??'avatar.png';?>" alt="" height="80" width="80" class="rounded-circle ml-4">
	      		<span><?php echo $_SESSION['acctType3'];?></span><br>
	      		<span><?php echo $fullname;?></span>
	      	</div>
	        <ul class="nav flex-column">
	          <li class="nav-item">
	            <a class="nav-link active" href="#v-pills-dashboard" id="v-pills-dashboard-tab" data-toggle="pill" role="tab" aria-controls="v-pills-home" aria-selected="true">
	              <span data-feather="home"></span><i class="fas fa-tachometer-alt"></i>
	              Dashboard <span class="sr-only">(current)</span>
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#v-pills-examination" id="v-pills-examination-tab" data-toggle="pill" role="tab" aria-controls="v-pills-home" aria-selected="false">
	              <span data-feather="file"></span><i class="fas fa-file-alt"></i>
	              Examinations		
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#v-pills-results" id="v-pills-result-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-result" aria-selected="false">
	              <span data-feather="shopping-cart"></span><i class="fas fa-scroll"></i>
	              Results
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#v-pills-saved" id="v-pills-saved-tab" data-toggle="pill" role="tab" aria-controls="v-pills-saved" aria-selected="false">
	              <span data-feather="users"></span><i class="fas fa-comments"></i>
	              Complains
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#v-pills-examiner-guide" id="v-pills-examiner-guide-tab" data-toggle="pill" role="tab" aria-controls="v-pills-examiner-guide" aria-selected="false">
	              <span data-feather="bar-chart-2"></span><i class="fas fa-directions"></i>
	              Student Guide
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#v-pills-profile" id="v-pills-profile-tab" data-toggle="pill" role="tab" aria-controls="v-pills-profile" aria-selected="false">
	              <span data-feather="layers"></span><i class="fas fa-user-alt"></i>
	              Profile
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#v-pills-logout" id="v-pills-logout-tab" data-toggle="pill" role="tab" aria-controls="v-pills-logout" aria-selected="false">
	              <span data-feather="layers"></span><i class="fas fa-sign-out-alt"></i>
	              Logout
	            </a>
	          </li>
	        </ul>
	        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
	          <span>Join Our Community</span>
	          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
	            <span data-feather="plus-circle"></span>
	          </a>
	        </h6>
	        <ul class="nav flex-column mb-2">
	          <li class="nav-item">
	            <a class="nav-link" href="#">
	              <span data-feather="file-text"></span>
	              Social engagement
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#">
	              <span data-feather="file-text"></span>
	              Blog
	            </a>
	          </li>
	        </ul>
	      </div>
	    </nav>

	    <main role="main" class="col-md-9 col-sm-12 ml-sm-auto col-lg-10 px-md-4">
	      <div class="tab-content" id="v-pills-tabContent">
		      <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard">
		      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  		        <h1 class="h2">Dashboard</h1>
  		        <div class="btn-toolbar mb-2 mb-md-0">
  		          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
  		            <span data-feather="calendar"></span>
  		            Dashboard
  		          </button>
  		        </div>
  		      </div>
  		      <div id="error_msg">
  		      	<?php
  		      		
  		      		if (isset($errors)) {
  		      			foreach ($errors as $key => $value) {
  		      				echo $value;
  		      			}
  		      		}
  		      	?>
  		      </div>
  		       <div class="row">
				<div class="col mt-3">
					<div class="card dashboard-card" style="width: 18rem;">
					  <div class="card-body">
					    <h4 class="card-title text-center border-bottom">Examinations</h4>
					    <h1 class="card-text text-center" style="font-size: 80px;" id="examinationCount">5</h1>
					  </div>
					</div>
				</div>
				<div class="col mt-3">
					<div class="card dashboard-card" style="width: 18rem;">
					  <div class="card-body">
					    <h4 class="card-title text-center border-bottom">Results</h4>
					    <h1 class="card-text text-center" style="font-size: 80px;" id="resultCount">5</h1>
					  </div>
					</div>
				</div>
				<div class="col mt-3">
					<div class="card dashboard-card" style="width: 18rem;">
					  <div class="card-body">
					   <h4 class="card-title text-center border-bottom">Attempted Questions</h4>
					    <h1 class="card-text text-center" style="font-size: 80px;" id="questionCount">5</h1>
					  </div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 mt-5">
						<h3>Examflow Progress on <span class="badge badge-pill badge-warning ">efficiency</span> <span class="badge badge-pill badge-success ">scalability</span> <span class="badge badge-pill badge-info ">security</span> <span class="badge badge-pill badge-primary ">durability</span> <span class="badge badge-pill badge-danger ">reliability</span></h3>
					</div>
					<div class="col-12 mt-5">
						<div class="progress  mt-3">
						  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Durability</div>
						</div>
						<div class="progress  mt-5">
						  <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Scalablity</div>
						</div>
						<div class="progress  mt-5">
						  <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: 70%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Security</div>
						</div>
						<div class="progress  mt-5">
						  <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Efficiency</div>
						</div>
						<div class="progress  mt-5 mb-3">
						  <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Reliability</div>
						</div>
					</div>
				</div>    		      	
  		      </div>
		      </div>
		      <div class="tab-pane fade" id="v-pills-examination" role="tabpanel" aria-labelledby="v-pills-examination-tab">
		      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  		        <h1 class="h2">Examination</h1>
  		        <div class="btn-toolbar mb-2 mb-md-0">
  		          <a href="#" class="btn btn-outline-secondary">
  		            Examiantion
  		          </a>
  		        </div>
  		      	</div>
  		      	<div class="row">
		      		<div class="col">
		      			<div class="table-responsive" id="examInfo">
		      			
		      			</div>
		      		</div>
		      	</div>
		      	<!-- Begin Modal for student to view  exam passcode-->
		      	<div class="modal fade" id="examPasscodeModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		      	  <div class="modal-dialog modal-lg modal-dialog-scrollable">
		      	    <div class="modal-content">
		      	      <div class="modal-header">
		      	        <h5 class="modal-title" id="staticBackdropLabel">Examination Passcode</h5>
		      	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		      	          <span aria-hidden="true">&times;</span>
		      	        </button>
		      	      </div>
		      	      <div class="modal-body">
		      	      	<div class="row">
		      			  <div class="col">
		      			    <div id="examPasscodeModalDiv">
		      				
		      			    </div>
		      		     </div>
		      		   </div>
		      	      </div>
		      	      <div class="modal-footer">
		      	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      	      </div>
		      	    </div>
		      	  </div>
		      	</div>
		      	<!-- End Modal for student to view  exam passcode -->
		      </div>
		      <div class="tab-pane fade" id="v-pills-results" role="tabpanel" aria-labelledby="v-pills-messages-tab">
		      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  		        <h1 class="h2">Results</h1>
  		        <div class="btn-toolbar mb-2 mb-md-0">
  		          <a href="#" class="btn btn-outline-secondary">
  		            Results
  		          </a>
  		        </div>
  		      	</div>
  		      	<div class="row">
		      		<div class="offset-1 col-10">
		      			<div class="table-responsive" id="studentViewResult">
		      				
		      			</div>
		      		</div>
		      	</div>
		      	<!-- Begin Modal for student result sheet-->
		      	<div class="modal fade" id="studentviewResultModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		      	  <div class="modal-dialog modal-lg modal-dialog-scrollable">
		      	    <div class="modal-content">
		      	      <div class="modal-header">
		      	        <h5 class="modal-title" id="staticBackdropLabel">Result Sheet</h5>
		      	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		      	          <span aria-hidden="true">&times;</span>
		      	        </button>
		      	      </div>
		      	      <div class="modal-body">
		      	      	<div class="row">
		      			  <div class="col">
		      			    <div id="viewResultDiv">
		      				
		      			    </div>
		      		     </div>
		      		   </div>
		      	      </div>
		      	      <div class="modal-footer">
		      	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      	      </div>
		      	    </div>
		      	  </div>
		      	</div>
		      	<!-- End Modal for student result sheet -->
		      </div>
		      <div class="tab-pane fade" id="v-pills-saved" role="tabpanel" aria-labelledby="v-pills-settings-tab">
		      	 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  		        <h1 class="h2">Complains</h1>
  		        <div class="btn-toolbar mb-2 mb-md-0">
  		          <a href="#" class="btn btn-outline-secondary">
  		            Complain
  		          </a>
  		        </div>
		      </div>
		      <div>
  		        	<div class="row">
  		        		<div class="col">
  		        			<form method="post" id="complainForm">
  		        				<div class="form-group">
  		        					<label class="display-3">Message</label><br>
  		        					<textarea cols="100" rows="6" style="box-shadow: 2px 2px 2px grey;" name="complain" id="complain"></textarea>
  		        				</div>
  		        				<div>
  		        					<input type="button" name="complainBtn" value="Send" class="btn btn-primary mb-4" id="complainBtn">
  		        					<input type="hidden" name="email" value="<?php echo $email?>">
  		        					<input type="hidden" name="fullname" value="<?php echo $fullname ?>">
  		        					,<input type="hidden" name="complainCheck" value="complain">
  		        				</div>
  		        			</form>
  		        		</div>
  		        	</div>
  		        	<div class="row">
  		        		<div class="col" id="complainOutput">
  		        			
  		        		</div>
  		        	</div>
  		        </div>
		  	 </div>
		  	  <div class="tab-pane fade" id="v-pills-examiner-guide" role="tabpanel" aria-labelledby="v-pills-settings-tab">
		      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  		        <h1 class="h2">Student Guide</h1>
  		        </div>
  		        <div class="row">
  		        	<div class="col">
  		        		<h4>Examflow manual for students</h4>
  		        		<ul class="mt-2" style="line-height: 2.0">
  		        			<li>Students can view awaited examinations and information about the "<strong>Examinations</strong>" tab.</li>
  		        			<li>Examination passcode can also be viewed by clicking the "<strong>View Passcode</strong>" button on the "<strong>Examinations</strong>" page.</li>
  		        			<li><b>N.B: </b> Don't reveal your examination passcode to anyone.</li>
  		        			<li><b>N.B: </b>The examination login passcode is a one time login passcode.</li>
  		        			<li><b>N.B: </b>Logging in before the examination start time will lead disqualification from writing the examination</li>
  		        			<li>Examination result can be viewed by clicking on the "<strong>View Result</strong>" button in the "<strong>Results</strong>" page.</li>
  		        			<li>Complains of any type can be made on the "<strong>Complain</strong>" tab and sent. Our admin will send a feedback via student mail.</li>
  		        			<p>Have a nice time using your best computer based test application: <strong>Examflow</strong>.</p>
  		        		</ul>
  		        	</div>
  		        </div>
  		      </div>
		      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-settings-tab">
		      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  		        <h1 class="h2">Profile</h1>
  		        </div>
  		        <div>
  		        	<div class="row">
  		        		<div class="col bg-primary position-absolute" style="min-height: 170px;">
  		        			<img src="" class="img-fluid" alt="">
  		        		</div>
  		        	</div>
        			<div style="width: 200px; height: 200px; background-color: red; z-index: 1; margin-top: 60px; border: 4px solid white;" class="rounded-circle position-relative">
        				<img src="examflow_profilepictures/<?php echo $student_image ??'avatar.png';?>" class="img-fluid rounded-circle ">
        			</div>
    				<div class="row">
    					<div class="col-12">
    						<h4><?php echo $fullname; ?></h4>	
    					</div>
    				</div>
					<div class="row justify-content-between">
						<div class="col-4 offset-2">
							<p><b>Name</b></p>
							<p><b>Email</b></p>
							<p><b>Password</b></p>
							<p><b>Accout Type</b></p>
							<p><b>Profile Picture</b></p>
						</div>
						<div class="col-4">
							<input type="hidden" name="student_id" value="<?php echo $_SESSION['student_id'];?>" id='student_id'>
							<p><input type="text" name="" value="<?php echo $fullname; ?>" class="form-control-sm bg-muted" readonly></p>
							<p><input type="text" name="" value="<?php echo $email; ?>" class="form-control-sm bg-muted" readonly></p>
							<p><form method="post" action="" id="updatePassword"><i class="fas fa-eye p-2" size='2x' id="eye" style="border: 1px solid black;"></i><input type="password" name="password" class="" id="studentPassword"><input type="hidden" name="studentUpdatePassword" value="studentUpdatePassword"><input type="button" name="updatePasswordBtn" id="updatePasswordBtn" class="btn btn-sm btn-primary" value="Update"></form></p>
							<p><input type="text" name="" value="<?php echo $acctType; ?>" class="form-control-sm bg-muted" readonly></p>
							<p><form method="post" action="" enctype="multipart/form-data"><input type="file" name="profilePicture" class="form-control-sm"><input type="submit" name="profilePictureBtn" class="btn btn-primary btn-sm" value="Upload"><small id="" class="form-text text-danger">Upload Profile Picture here</small></form></p>
						</div>
					</div>
					<div class="row" id="updatePasswordOutput">
						
					</div>
				</div>
  		      </div>
		      <div class="tab-pane fade" id="v-pills-logout" role="tabpanel" aria-labelledby="v-pills-settings-tab">
		      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  		        <h1 class="h2">Are You sure you want to logout?</h1>
  		      	</div>
  		      	<div class="row">
  		      		<div class="col">
  		      			<a href="examflow_logout.php" class="btn btn-primary btn-lg">Yes</a>
  		      		</div>
  		      	</div>
		      </div>
	    </div>
	    </main>
	  </div>
	</div>
	<footer class="row mt-5">
		<div class="col-12 mt-4">
			<div class="col text-center">
				<p>&copy;Copyright <a href="index.php" class="text-decoration-none"><?php echo APPNAME." ".date('Y');?></a> | All right reserved</p>
			</div>
		</div>
	</footer>
	<!--Javascript Files jquery, popper, bootstrap-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" language="javascript">
		$(document).ready(function(){

			//change password visibility
			$('#eye').click(function(){
				var x = document.getElementById('studentPassword')
				if (x.type == 'password'){
					x.type = 'text'
				}else{
					x.type = 'password'
				}
			})
			//change password visibility

			//Begin fetching all exams exams by examiner for update
			$("#v-pills-result-tab").click(function(){
					var studentId = $('#student_id').val()
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: "studentViewResult=studentViewResult&student_id="+studentId,
					success: function(result){
						$("#studentViewResult").html(result);
						
					},
					error: function(error){
						console.log(error);
						
					}
				})
			})
			//End fetching all exams by examiner for update


			//Begin fetching all examinations student have been registered for
			$("#v-pills-examination-tab").click(function(){
					var studentId = $('#student_id').val()
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: "examInfo=examInfo&student_id="+studentId,
					success: function(result){
						$("#examInfo").html(result);
						
					},
					error: function(error){
						console.log(error);
						
					}
				})
			})
			//End fetching all examinations student have been registered for


			//Begin viewing of result by student
			jQuery(document).on('click', '#studentviewResult', function(){
				//alert("I got here");
				var exam_id = $(this).data('id');
				var exam_title = $(this).data('title');
				var exam_code = $(this).data('code');
				var student_id = $(this).data('student');
				var exam_date= $(this).data('date');
				//alert(exam_id+", "+exam_title+', '+exam_code)
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: "studentViewResultBtn=studentViewResultBtn&exam_id="+exam_id+"&exam_title="+exam_title+"&exam_code="+exam_code+"&student_id="+student_id+"&exam_date="+exam_date,
					success: function(result){
						$("#viewResultDiv").html(result);
					},
					error: function(error){
						console.log(error);
					}
				})
			});
			//End link to registration of student form


			//Begin submission of complain form
			$("#complainBtn").click(function(){
					var complainData = $("#complainForm").serialize();
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: complainData,
					success: function(result){
						$("#complainOutput").html(result);
						$('#complain').val("")
						$("#complainOutput").mouseover(function(){
							$(this).html("")
						})
					},
					error: function(error){
						console.log(error);
					}
				})
			})
			//End submission of complain form


			//Begin student to view thier exam passcode
			jQuery(document).on('click', '#studentViewPasscode', function(){
				//alert("I got here");
				var exam_id = $(this).data('exam');
				var student_id = $(this).data('student');
				//alert(exam_id+", "+student_id);
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: "studentPasscode=studentViewPasscode&exam_id="+exam_id+"&student_id="+student_id,
					success: function(result){
						$("#examPasscodeModalDiv").html(result);
					},
					error: function(error){
						console.log(error);
					}
				})
			});
			//End student to view thier exam passcode


			//Begin count of examination, question and result for student dashboard display
			const student_id = $("#student_id").val();

			$.ajax({
				url: "examflow_asynchronous.php",
				type: "POST",
				data: "studentExamCount=studentExamCount&student_id="+student_id,
				success: function(result){
					$("#examinationCount").html(result);
				},
				error: function(error){
					console.log(error);
				}
			})

			
			$.ajax({
				url: "examflow_asynchronous.php",
				type: "POST",
				data: "studentResultCount=studentResultCount&student_id="+student_id,
				success: function(result){
					$("#resultCount").html(result);
				},
				error: function(error){
					console.log(error);
				}
			})


			$.ajax({
				url: "examflow_asynchronous.php",
				type: "POST",
				data: "studentQuestionCount=studentQuestionCount&student_id="+student_id,
				success: function(result){
					$("#questionCount").html(result);
				},
				error: function(error){
					console.log(error);
				}
			})
			//End count of examination, question and result for student dashboard display


			//Begin clear profile picture upload error message
			jQuery(document).on('mouseover', '[id^=error_msg]',function(){
				//alert('I got here');
				 $(this).html('');
				
			})
			//End clear profile picture upload error message



			//Begin update of admin password
			$("#updatePasswordBtn").click(function(){
					
					var updatePassword = $("#updatePassword").serialize();
					//alert(updatePassword+"&student_id="+student_id)
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: updatePassword+"&student_id="+student_id,
					success: function(result){
						$("#updatePasswordOutput").html(result);
						$("#updatePasswordOutput").mouseover(function(){
							$(this).html('')
						})

					},
					error: function(error){
						console.log(error);
					}
				})
			})
			//End update of admin password


		})
	</script>
</body>
</html>