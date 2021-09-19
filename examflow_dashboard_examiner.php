<?php session_start();
include 'examflow_constants.php';
if (empty($_SESSION['examiner_id'])) {
header("Location: examflow_login_signup.php?message=login");
exit;
}

$fullname = $_SESSION['examiner_lname']." ".$_SESSION['examiner_fname'];
$email = $_SESSION['examiner_email'];
$acctType = $_SESSION['acctType2'];
$examiner_id = $_SESSION['examiner_id'];
$examiner_image = $_SESSION['examiner_image'];


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
		$output = $obj->examinerUpdateProfilePicture($filetemp, $file_ext_lowerCase, $examiner_id);
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
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedCon	tent" aria-expanded="false" aria-label="Toggle navigation">
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
		          <img src="examflow_profilepictures/<?php echo $examiner_image ??'avatar.png';?>" width="32" height="32" class="rounded-circle">
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
	      	<div class="align-items-center ">
	      		<img src="examflow_profilepictures/<?php echo $examiner_image ??'avatar.png';?>" alt="" height="80" width="80" class="rounded-circle ml-4">
	      		<span><?php echo $_SESSION['acctType2']; ?></span><br>
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
	              <span data-feather="users"></span><i class="fas fa-save"></i>
	              Saved Exams
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#v-pills-students" id="v-pills-students-tab" data-toggle="pill" role="tab" aria-controls="v-pills-students" aria-selected="false">
	              <span data-feather="file"></span><i class="fas fa-users"></i>
	              Register Students	
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#v-pills-new-exam" id="v-pills-new-exam-tab" data-toggle="pill" role="tab" aria-controls="v-pills-new_exam" aria-selected="false" >
	              <span data-feather="file-text"></span><i class="fas fa-folder-plus"></i>
	              	New Examination
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#v-pills-examiner-guide" id="v-pills-examiner-guide-tab" data-toggle="pill" role="tab" aria-controls="v-pills-examiner-guide" aria-selected="false">
	              <span data-feather="bar-chart-2"></span><i class="fas fa-directions"></i>
	              Examiner Guide
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#v-pills-complain" id="v-pills-complain-tab" data-toggle="pill" role="tab" aria-controls="v-pills-suggest" aria-selected="false">
	              <span data-feather="layers"></span><i class="fas fa-comments"></i>
	              Complains
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
  		      <div id="updateMsg">
  		      	<?php
  		      		if (isset($_GET['updateMsg'])){
  		      			echo $_GET['updateMsg'];
  		      		}
  		      		if (isset($_GET['pictureMsg'])) {
  		      			echo $_GET['pictureMsg'];
  		      		}

  		      	?>
  		      </div>
  		      <div class="row">
				<div class="col">
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
					   <h4 class="card-title text-center border-bottom">Questions</h4>
					    <h1 class="card-text text-center" style="font-size: 80px;" id="questionCount">5</h1>
					  </div>
					</div>
				</div>
				<div class="row mt-3">
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
  		          <a href="examflow_newexam.php" class="btn btn-outline-secondary">
  		            Examination
  		          </a>
  		        </div>
  		      	</div>
  		     	<div class="row">
		      		<div class="col">
		      			<div class="table-responsive" id="allExamsDiv">
		      				
		      			</div>
		      		</div>
		      	</div>
		      	<!-- Begin Modal for examiner view more exam detail-->
		      	<div class="modal fade" id="viewMoreDetailsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		      	  <div class="modal-dialog modal-lg modal-dialog-scrollable">
		      	    <div class="modal-content">
		      	      <div class="modal-header">
		      	        <h5 class="modal-title" id="staticBackdropLabel">Examination Details</h5>
		      	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		      	          <span aria-hidden="true">&times;</span>
		      	        </button>
		      	      </div>
		      	      <div class="modal-body">
		      	      	<div class="row">
		      			  <div class="col">
		      			    <div id="viewMoreDetailsModalDiv">
		      				
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
		      	<!-- End Modal for examiner view more exam detail -->
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
		      			<div class="table-responsive" id="viewResultDiv">
		      				
		      			</div>
		      		</div>
		      	</div>
		      </div>
		      <div class="tab-pane fade" id="v-pills-saved" role="tabpanel" aria-labelledby="v-pills-settings-tab">
		      	 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  		        <h1 class="h2">Saved Examinations</h1>
  		        <div class="btn-toolbar mb-2 mb-md-0">
  		          <a href="#" class="btn btn-outline-secondary">
  		            Saved Examination
  		          </a>
  		        </div>
  		      	</div>
  		      	<div class="row">
  		        	<div class="col">
  		        		<p>Please add all questions before updating examination, once an examination is updated more questions can't be added</p>
  		        	</div>
  		        </div>
  		      	<div class="row">
		      		<div class="offset-1">
		      			<div class="table-responsive" id="savedExamDiv">
		      			
		      			</div>
		      		</div>
		      	</div>
		      	
		      </div>
		      <div class="tab-pane fade" id="v-pills-students" role="tabpanel" aria-labelledby="v-pills-students-tab">
		      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  		        <h1 class="h2">Register student</h1>
  		        </div>
  		        <div class="row">
  		        	<div class="col">
  		        		<p>Please note that an examination must have been updated before student can be registered for that examination</p>
  		        	</div>
  		        </div>
  		        <div class="row">
  		        	<div class="offset-1 col-8">
  		        		<div id="registrationForm">
  		        			
  		        		</div>
  		        	</div>
  		        </div>
  		        <!-- Begin Modal for list of registered student-->
  		        <div class="modal fade" id="listRegisteredStudentsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  		          <div class="modal-dialog modal-lg modal-dialog-scrollable">
  		            <div class="modal-content">
  		              <div class="modal-header">
  		                <h5 class="modal-title" id="staticBackdropLabel">Registered Students</h5>
  		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  		                  <span aria-hidden="true">&times;</span>
  		                </button>
  		              </div>
  		              <div class="modal-body">
  		              	<div class="row">
  		        		  <div class="col">
  		        		    <div id="listRegisteredStudentsDiv">
  		        			
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
  		        <!-- End Modal for list of registered student -->
  		        <div class="row">
  		        	<div class="offset-1 col">
		      			<div class="table-responsive" id="registerStudentDiv">
		      			
		      			</div>
		      		</div>
  		        </div>
  		      </div>
		      <div class="tab-pane fade" id="v-pills-new-exam" role="tabpanel" aria-labelledby="v-pills-settings-tab">
		      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  		        <h1 class="h2">New Examination</h1>
  		        </div>
  		        <div>
  		        	<form action="" method="post" id="newExam">
						<div class="row form-group">
							<div class="col">
								<label>Exam title / header</label>
								<input type="text" name="examTitle" class="form-control" placeholder="Human Anatomy" id="examTitle">
								<small id="" class="form-text text-danger"></small>
							</div>
							<div class="col">
								<label>Exam code</label>
								<input type="text" name="examCode" class="form-control" placeholder="ANA208" id="examCode">
								<small id="" class="form-text text-danger"></small>
							</div>
						</div>
						<div class="row form-group">
							<div class="col">
								<label>Exam Subject / Course</label>
								<select name="examSubject" class="form-control"  id="examSubjectInput">
									<option value="">Select Subject</option>	
								</select>
								<small id="" class="form-text text-danger"></small>
							</div>
							<div class="col">
								<label>Registered Students</label>
								<input type="file" name="registeredStudents" class="form-control" placeholder="" id="registeredStudents" disabled="">
							</div>
						</div>
						<div class="row form-group">
							<div class="col">
								<label>Start time</label>
								<input type="datetime-local" name="startExamTime" class="form-control" disabled="">
							</div>
							<div class="col">
								<label>End time</label>
								<input type="datetime-local" name="endExamTime" class="form-control" placeholder="" disabled="">
							</div>
						</div>
						<div class="row form-group">
							<div class="col">
								<label>Exam Duration</label>
								<div class="row">
								<div class="col">
								<select name="examDurationHours" class="form-control" disabled="">
									<option>Select Hours</option>
									<?php
									for ($i=0; $i <= 24 ; $i++) { 
										?>
										<option value="<?php echo $i ??'0'; ?>"><?php 
										if ($i<=1) {echo $i." hr";}else{ echo $i." hrs";}
										 ?></option>
										}
									<?php
									}			
									?>
								</select>
								</div>
								<div class="col">
								<select name="examDurationMinutes" class="form-control" disabled="">
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
								<label>Result release</label>
								<input type="datetime-local" name="resultReleaseDate" class="form-control" disabled="">
							</div>
						</div>
						<div class="row justify-content-end">
							<div class="col-1 mt-3 mb-2 ">
								<input type="button" name="saveExam" class="btn btn-primary" value="Save" id="saveExam">
								<input type="hidden" name="saveExam" value="saveExam">
								<input type="hidden" name="examinerId" id="examinerId" value="<?php echo $_SESSION['examiner_id'] ;?>">
							</div>
						</div>
					</form>	
					<div class="row">
						<div class="col">
							<div id="saveExamOutput">
								
							</div>
						</div>
					</div>
  		        </div>
  		      </div>
		      <div class="tab-pane fade" id="v-pills-examiner-guide" role="tabpanel" aria-labelledby="v-pills-settings-tab">
		      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  		        <h1 class="h2">Examiner Guide</h1>
  		        </div>
  		        <div class="row">
  		        	<div class="col">
  		        		<h4>Examflow manual for examiners</h4>
  		        		<ul class="mt-2" style="line-height: 2.0">
  		        			<li>New examinations should created for instantiating an examination, this can be found on the "<strong>New Examination</strong>" tab.</li>
  		        			<li>As much <strong>questions</strong> as possible can be added to an examination. </li>
  		        			<li>Addition of questions  can be found when the "<strong>Saved Exams</strong>" tab is clicked, there lies the "<strong>Add Question</strong>" button</li>
  		        			<li>On the saved examination tab questions can be previewed with the "<strong>Preview</strong>" button for the examiner to have a feel of how the questions will look like on the student end.</li>
  		        			<li>Also on the "<strong>Saved Exams</strong>" tab examination can be updated or deleted with the "<strong>Update</strong>" or "<strong>Delete</strong>" buttons.</li>
  		        			<li><b>N.B:</b> All examination questions must have been added before updating an examination.</li>
  		        			<li>Examiners can register thier students and view the list of registered student onclick of the "<strong>Register Students</strong>" tab. </li>
  		        			<li>Examiners can also delete one or more registered student on the "<strong>Register Student</strong>" tab after clicking on list student</li>
  		        			<li><b>N.B:</b> Student can only be registered for an examintion if that examination have been updated on the "<strong>Saved Exams</strong>" tab. </li>
  		        			<li>All Examination result can be viewed by the examiner on the "<strong>Result</strong>" tab.</li>
  		        			<li>The "<strong>View Result</strong>" button of each examination wil lead an examiner to a page where result can be viewed</li>
  		        			<li><b>N.B: </b>When an examination result should be released is determined by the examiner when updating the examination</li>
  		        			<li>All details about an examination can be viewed in the "<strong>Examinations</strong>" tab.</li>
  		        			<li>Clicking on <strong>More Details</strong> show the examiner number of registered students and number of questions.</li>
  		        		</ul>
  		        	</div>
  		        </div>
  		      </div>
		      <div class="tab-pane fade" id="v-pills-complain" role="tabpanel" aria-labelledby="v-pills-complain-tab">
		      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  		        <h1 class="h2">Complain</h1>
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
        			<div style="width: 200px; height: 200px; background-color: red; z-index: 1; margin-top: 60px; border: 4px solid white;" class="rounded-circle position-relative img-fluid">
        				<img src="examflow_profilepictures/<?php echo $examiner_image ??'avatar.png';?>" style="width: 200px; height: 200px;" class="img-fluid rounded-circle">
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
							<input type="hidden" name="student_id" value="<?php echo $_SESSION['examiner_id'];?>" id='examiner_id'>
							<p><input type="text" name="" value="<?php echo $fullname; ?>" class="form-control-sm bg-muted" readonly></p>
							<p><input type="text" name="" value="<?php echo $email; ?>" class="form-control-sm bg-muted" readonly></p>
							<p><form method="post" action="" id="updatePassword"><i class="fas fa-eye p-2" size='2x' id="eye" style="border: 1px solid black;"></i><input type="password" name="password" value="" id="examinerPassword"><input type="hidden" name="examinerUpdatePassword" value="examinerUpdatePassword"><input type="button" name="updatePasswordBtn" id="updatePasswordBtn" class="btn btn-sm btn-primary" value="Update"></form></p>
							<p><input type="text" name="" value="<?php echo $acctType; ?>" class="form-control-sm bg-muted" readonly></p>
							<p><form method="post" action="" enctype="multipart/form-data"><input type="file" name="profilePicture" class="form-control-sm"><input type="submit" name="profilePictureBtn" class="btn btn-primary btn-sm" value="Update"><small id="" class="form-text text-danger">Upload Profile Picture here</small></form></p>
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
  		      			<ul>
  		      				<li>Please save your works before logging out</li>
  		      				<li>Examflow wishes you a nice time.</li>
  		      			</ul>
  		      			<a href="examflow_logout.php" class="btn btn-primary btn-lg">Yes</a>
  		      		</div>
  		      	</div>
		      </div>
	   	 </div>
	    </main>
	  </div>
	</div>
	
	<footer class="row">
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
				var x = document.getElementById('examinerPassword')
				if (x.type == 'password'){
					x.type = 'text'
				}else{
					x.type = 'password'
				}
			})
			//change password visibility


			//Begin save New Exam using Ajax Method
			$('#saveExam').click(function(){

				//storing form data in array with serialize
				var examFormData = $('#newExam').serialize();
				//alert(examFormData);
				var exam_subject = $('#examSubjectInput').val();
				//using ajax method
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: examFormData,
					success: function(result){
						$("#saveExamOutput").html(result);
						//empty the form fields
						$('#examTitle').val("");
						$('#examCode').val("");
					},
					error: function(error){
						console.log(error);
						$('#saveExamOutput').html('Oops! New examination creation failed, Plese try again later ');
					}
				})
			})
			//End save New Exam using Ajax Method


			//Begin getting subjects from database	

				//using ajax method
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: "subjectSearch=inputSubject",	
					success: function(result){
						$("#examSubjectInput").append(result);

						//empty the form fields
						
					},
					error: function(error){
						console.log(error);
						$('#saveExamOutput').html('Oops! New examination creation failed, Plese try again later ');
					},
				})
			//End getting subjects from database	


			//Begin fetching all exams exams by examiner for update
			$("#v-pills-saved-tab").click(function(){

				//setting refresh timer
				setInterval(function(){
						var examinerId = $('#examinerId').val();
					$.ajax({
						url: "examflow_asynchronous.php",
						type: "POST",
						data: "outputExam=savedExaminations&examinerId="+examinerId,
						success: function(result){
							$("#savedExamDiv").html(result);
							
						},
						error: function(error){
							console.log(error);
							
						}
					})
				}, 2000)
			})
			//End fetching all exams by examiner for update


			//Begin fetching all exams exams by examiner for update
			$("#v-pills-examination-tab").click(function(){
					var examinerId = $('#examinerId').val();
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: "allExams=allExaminations&examinerId="+examinerId,
					success: function(result){
						$("#allExamsDiv").html(result);
						
					},
					error: function(error){
						console.log(error);
						
					}
				})
			})
			//End fetching all exams by examiner for update


			//Begin registration of students table
			$("#v-pills-students-tab").click(function(){
					var examinerId = $('#examinerId').val();
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: "registerStudentTable=Registration&examinerId="+examinerId,
					success: function(result){
						$("#registerStudentDiv").html(result);
					},
					error: function(error){
						console.log(error);
					}
				})
			})
			//End registration of students



			//Begin link to registration of student form
			jQuery(document).on('click', '[id^=getRegistrationForm]', function(){
				var exam_id = $(this).data('id');
				var exam_title = $(this).data('title');
				var exam_code = $(this).data('code');
				//alert(exam_id+", "+exam_title+', '+exam_code)
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: "getRegistrationForm=Registration&exam_id="+exam_id+"&exam_title="+exam_title+"&exam_code="+exam_code,
					success: function(result){
						$("#registrationForm").html(result);
					},
					error: function(error){
						console.log(error);
					}
				})
			});
			//End link to registration of student form


			//Begin get student name synchrnously
			jQuery(document).on('click', '#registerStudent', function(){
				var studentRegistrationData = $("#studentRegistrationForm").serialize();
				//alert(studentRegistrationData);
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: studentRegistrationData,
					success: function(result){
						$("#registrationOutput").html(result);
						$("#studentEmail").val("");
						$("#studentName").val("");
						$("#registrationOutput").click(function(){
							$(this).html("")
						})
					},
					error: function(error){
						console.log(error);
					}				
				})
			});
			//End get student name synchrnously


			//Begin get student name upon entering email job
			jQuery(document).on('change', '#studentEmail', function(){
				var studentEmail = $(this).val();
				//alert(studentEmail);
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: "studentEmail="+studentEmail+"&getStudentName=StudentName",
					success: function(result){
						$("#studentName").val(result);
						
					},
					error: function(error){
						console.log(error);
					}				
				})
			})
			//End get student name upon entering email job

			
			//Begin list of registered student
			jQuery(document).on('click', '#listRegisteredStudentsBtn',function(){
				var exam_id = $(this).data('id');
				//alert('This is serious');
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: "listStudents=listRegisteredStudents&exam_id="+exam_id,
					success: function(result){
						$("#listRegisteredStudentsDiv").html(result);
					
					},
					error: function(error){
						console.log(error);
					}				
				})
			})
			//End list of registered student


			//Begin view examination list to see exam result 
			$("#v-pills-result-tab").click(function(){
					var examinerId = $('#examinerId').val();
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: "examinerViewResult=examinerViewResult&examinerId="+examinerId,
					success: function(result){
						$("#viewResultDiv").html(result);
					},
					error: function(error){
						console.log(error);
					}
				})
			})
			//End view examination list to see exam result 


			//Begin delete examination
			jQuery(document).on('click', '#deleteExamination',function(){
				//alert('I got here');
				var deleteExam = confirm("Are you sure you want to delete this examination?");
				if (deleteExam == true) {
						var exam_id = $(this).data('id');
					$.ajax({
						url: "examflow_asynchronous.php",
						type: "POST",
						data: "deleteExamination=deleteExamination&exam_id="+exam_id,
						success: function(result){
							alert(result);
						
						},
						error: function(error){
							console.log(error);
						}				
					})
				}
			})

			//End delete examination
			

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


			//Begin view more examination details by examiner
			jQuery(document).on('click', '#viewMoreDetails',function(){
				//alert('I got here');
				var exam_id = $(this).data('id');
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: "examinerViewMoreDetails=viewMoreDetails&exam_id="+exam_id,
					success: function(result){
						$("#viewMoreDetailsModalDiv").html(result);
					
					},
					error: function(error){
						console.log(error);
					}				
				})
				
			})
			//End view more examination details by examiner



			//Begin clear profile picture upload error message
			jQuery(document).on('mouseover', '[id^=error_msg]',function(){
				//alert('I got here');
				 $(this).html('');
				
			})
			//End clear profile picture upload error message


			//Begin count of examination, question and result for student dashboard display
			const examiner_id = $('#examiner_id').val();
			$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: "examinerExamCount=examinerExamCount&examiner_id="+examiner_id,
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
					data: "examinerResultCount=examinerResultCount&examiner_id="+examiner_id,
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
					data: "examinerQuestionCount=examinerQuestionCountt&examiner_id="+examiner_id,
					success: function(result){
						$("#questionCount").html(result);
					
					},
					error: function(error){
						console.log(error);
					}				
				})
			//End count of examination, question and result for student dashboard display


			//Begin update of admin password
			$("#updatePasswordBtn").click(function(){
					var updatePassword = $("#updatePassword").serialize();
					//alert(updatePassword+"&examiner_id="+examiner_id)
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: updatePassword+"&examiner_id="+examiner_id,
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

			//Begin************************* job
			//End ************************** job

			//Begin************************* job
			//End ************************** job

			//Begin************************* job
			//End ************************** job

			//clear message
			$("#updateMsg").mouseover(function(){
				$(this).html('');
			})


		})
	</script>
</body>
</html>

<!-- Begin Modal for examiner view more exam detail-->
<!-- <div class="modal fade" id="viewMoreDetailsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Examination Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="row">
		  <div class="col">
		    <div id="viewMoreDetailsModalDiv">
			
		    </div>
	     </div>
	   </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->
<!-- End Modal for examiner view more exam detail -->



<!-- //Begin list of students and thier score
/*jQuery(document).on('click', '#examinerViewResult',function(){
	//alert('I got here');
	var exam_id = $(this).data('id');
	$.ajax({
		url: "examflow_asynchronous.php",
		type: "POST",
		data: "examinerViewResultBtn=examinerViewResultBtn&exam_id="+exam_id,
		success: function(result){
			$("#viewResultModalDiv").html(result);
		
		},
		error: function(error){
			console.log(error);
		}				
	})
})*/
//End list of students and thier score -->