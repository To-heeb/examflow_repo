<?php session_start();
include_once 'examflow_constants.php';
include_once 'examflow_classes.php';

if (empty($_SESSION['admin_id'])) {
	header("Location: examflow_login_signup.php?message=login");
	exit;

}


$fullname = $_SESSION['admin_lname']." ".$_SESSION['admin_fname'];
$email = $_SESSION['admin_email'];
$acctType = $_SESSION['acctType1'];
$admin_id = $_SESSION['admin_id'];
$admin_image = $_SESSION['admin_image']; 


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
		$output = $obj->adminUpdateProfilePicture($filetemp, $file_ext_lowerCase, $admin_id);
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
		          <img src="examflow_profilepictures/<?php echo $admin_image ??'avatar.png';?>" alt="mdo" width="32" height="32" class="rounded-circle">
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
	      		<img src="examflow_profilepictures/<?php echo $admin_image ??'avatar.png';?>" alt="" height="80" width="80" class="rounded-circle ml-4">
	      		<span><?php echo $_SESSION['acctType1']; ?></span><br>
	      		<span><?php echo $fullname; ?></span>
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
	            <a class="nav-link" href="#v-pills-examiner" id="v-pills-examiner-tab" data-toggle="pill" role="tab" aria-controls="v-pills-saved" aria-selected="false">
	              <span data-feather="users"></span><i class="fas fa-user-friends"></i>
	              Examiners
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#v-pills-students" id="v-pills-students-tab" data-toggle="pill" role="tab" aria-controls="v-pills-examiner_guide" aria-selected="false">
	              <span data-feather="bar-chart-2"></span><i class="fas fa-users"></i>
	              Students
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#v-pills-subjects" id="v-pills-subjects-tab" data-toggle="pill" role="tab" aria-controls="v-pills-examiner_guide" aria-selected="false">
	              <span data-feather="bar-chart-2"></span><i class="fas fa-tags"></i>
	              Subjects/Courses
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#v-pills-add-admin" id="v-pills-add-admin-tab" data-toggle="pill" role="tab" aria-controls="v-pills-add-admin" aria-selected="false">
	              <span data-feather="layers"></span><i class="fas fa-user-plus"></i>
	              Add admin
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
					    <h4 class="card-title text-center border-bottom">Students</h4>
					    <h1 class="card-text text-center" style="font-size: 80px;" id="studentCount">5</h1>
					  </div>
					</div>
				</div>
				<div class="col mt-3">
					<div class="card dashboard-card" style="width: 18rem;">
					  <div class="card-body">
					   <h4 class="card-title text-center border-bottom" >Questions</h4>
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
		      			<div class="table-responsive" id="viewExamDiv">
		      			
		      			</div>
		      		</div>
		      	</div>
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
  		      	<div>
  		      	<div class="row">
		      		<div class="offset-1 col-10">
		      			<div class="table-responsive" id="viewResultDiv">
		      				
		      			</div>
		      		</div>
		      	</div>
  		      	</div>
		      </div>
		      <div class="tab-pane fade" id="v-pills-examiner" role="tabpanel" aria-labelledby="v-pills-examiner-tab">
		      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  		        <h1 class="h2">Examiner</h1>
  		        </div>
  		          <div class="row">
		      		<div class="col">
			      	<div class="table-responsive" id="viewExaminerDiv">
			      			
			      	</div>
		      	  </div>
  		        </div>
  		      </div>
		       <div class="tab-pane fade" id="v-pills-students" role="tabpanel" aria-labelledby="v-pills-students-tab">
		      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  		        <h1 class="h2">Students</h1>
  		        </div>
  		         <div class="row">
		      		<div class="col">
			      	<div class="table-responsive" id="viewStudentsDiv">
			      			
			      	</div>
		      	  </div>
		      	</div>
  		      </div>
		      <div class="tab-pane fade" id="v-pills-subjects" role="tabpanel" aria-labelledby="v-pills-subjects-tab">
		      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  		        <h1 class="h2">Courses</h1>
  		        <div class="btn-toolbar mb-2 mb-md-0">
  		          <div class="btn-group mr-2">
  		          	<span class="text-lead mr-1">Add New Subject</span>
	        		<input type="text" name="addSubject" id="addSubject" class="mr-1 form-control-sm" >
  		            <button type="button" name="addSubjectBtn" id="addSubjectBtn" class="btn btn-primary btn-sm">Add Subject</button>
  		          </div>
  		        </div>
  		        </div>
  		        <div class="row mt-5">
  		        	<div class="col-12" id="outputMsg">
  		        		
  		        	</div>
		      	</div>
		      	<div class="row mb-5">
		      		<div class="offset-1 col-9">
		      			<div class="table-responsive" id="getsubjectDiv">
		      				
		      			</div>
		      		</div>
		      	</div>
  		      </div>
		      <div class="tab-pane fade" id="v-pills-add-admin" role="tabpanel" aria-labelledby="v-pills-settings-tab">
		      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  		        <h1 class="h2">Add Admin</h1>
  		        </div>
  		        <div class="row">
  		        	<div class="col">
  		        	<form action="" method="post" id="newAdmin">
						<div class="row form-group">
							<div class="col">
								<label>Firstname</label>
								<input type="text" name="adminFname" class="form-control" placeholder="Firstname" id="adminFname">
							</div>
							<div class="col">
								<label>Lastname</label>
								<input type="text" name="adminLname" class="form-control" placeholder="Lastname" id="adminLname">
							</div>
						</div>
						<div class="row form-group">
							<div class="col">
								<label>Email</label>
								<input type="email" name="adminEmail" class="form-control" placeholder="Email" id="adminEmail">
							</div>
							<div class="col">
								<label>Confirm Email</label>
								<input type="email" name="adminCEmail" class="form-control" placeholder="Confirm Email" id="adminCEmail">
							</div>
						</div>
						<div class="row form-group">
							<div class="col">
								<label>Password</label>
								<input type="password" name="adminPassword" class="form-control" placeholder="Password" id="adminPassword">
								<small id="" class="form-text text-danger">The lastname of the new admin should be made the password</small>
							</div>
							<div class="col">
								<label>Confirm Password</label>
								<input type="password" name="adminCPassword" class="form-control" placeholder="Confirm Password" id="adminCPassword">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
								<label class="">Phone Number</label>
								<div class="row">
									<div class="col-4">
									<select name="countryCode" class="form-control" id="countryCode">
										<option value="">Country code</option>
										<?php
											include 'country_dialing_codes.php';
										
										foreach ($dialing_code as $key => $value) {

										?>
											<option value="<?php echo '+'.$value?>"><?php echo "+".$value; ?></option>
										
										<?php
										}
										?>
									</select>
									</div>
								<div class="col">
									<input type="text" name="phone" class="form-control" placeholder="Phone Number" id="phone">
								</div>
							</div>
							</div>
							</div>
							<div class="col">
								
							</div>
						</div>
						<div class="row ">
							<div class="col-1 mt-3 mb-4">
								<input type="button" name="addAdmin" class="btn btn-primary mr-auto" value="Add Admin" id="addAdmin">
								<input type="hidden" name="newAdmin" value="addNewAdmin">
								<input type="hidden" name="adminType" value="Regular">
							</div>
						</div>
					</form>	
					<div class="row">
						<div class="col">
							<div id="addAdminOutput">
								
							</div>
						</div>
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
        			<div style="width: 200px; height: 200px; background-color: red; z-index: 1; margin-top: 60px; border: 4px solid white;" class="rounded-circle position-relative">
        				<img src="examflow_profilepictures/<?php echo $admin_image ??'avatar.png';?>" class="img-fluid rounded-circle ">
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
							<p><input type="text" name="" value="<?php echo $fullname; ?>" class="form-control-sm bg-muted" readonly></p>
							<p><input type="text" name="" value="<?php echo $email; ?>" class="form-control-sm bg-muted" readonly></p>
							<input type="hidden" name="admin_id" id="admin_id" value="<?php echo $admin_id ?>" >
							<p><form method="post" action="" id="updatePassword"><i class="fas fa-eye p-2" size='2x' id="eye" style="border: 1px solid black;"></i><input type="password" name="password" class="" value="" id="adminPassword"><input type="hidden" name="adminUpdatePassword" value="adminUpdatePassword"><input type="button" name="updatePasswordBtn" class="btn btn-sm btn-primary" id="updatePasswordBtn" value="Update"></form></p>
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
				var x = document.getElementById('adminPassword')
				if (x.type == 'password'){
					x.type = 'text'
				}else{
					x.type = 'password'
				}
			})
			//change password visibility


			/*function myFunction() {
			    var x = document.getElementById("myPassword");
			    if (x.type === "password") {
			        x.type = "text";
			    } else {
			        x.type = "password";
			    }
			}*/


			//Begin Add Subject by Admin
			$("#addSubjectBtn").click(function(){
				var newSubject = $('#addSubject').val();
				var newSubjectBtn = $(this).val();
				//alert(newSubject);

				$.ajax({
				type: "POST",
				url: "examflow_asynchronous.php",
				data: "subject="+ newSubject+"&subjectBtn="+newSubjectBtn,
				success: function(msg){
					$('#outputMsg').html(msg);
					$("#addSubject").val('')
				},
				error: function(errors){	
					console.log(errors);
				}
				})
			})
			//End Add Subject by Admin


			//Begin get all Examination for Admin
			$("#v-pills-examination-tab").click(function(){
				//alert(newSubject);

				$.ajax({
				type: "POST",
				url: "examflow_asynchronous.php",
				data: "adminViewExam=adminViewExam",
				success: function(msg){
					$('#viewExamDiv').html(msg);
					
				},
				error: function(errors){	
					console.log(errors);
				}
				})
			})
			//End get all examination for Admin



			//Beign get all examiner for Admin
			$("#v-pills-examiner-tab").click(function(){
				//alert(newSubject);

				$.ajax({
				type: "POST",
				url: "examflow_asynchronous.php",
				data: "adminViewExaminers=adminViewExaminers",
				success: function(msg){
					$('#viewExaminerDiv').html(msg);
					
				},
				error: function(errors){	
					console.log(errors);
				}
				})
			})
			//End get all examiner for Admin


			//Begin get all students for Admin
			$("#v-pills-students-tab").click(function(){
				//alert(newSubject);

				$.ajax({
				type: "POST",
				url: "examflow_asynchronous.php",
				data: "adminViewStudents=adminViewStudents",
				success: function(msg){
					$('#viewStudentsDiv').html(msg);
					
				},
				error: function(errors){	
					console.log(errors);
				}
				})
			})
			//End get all students for Admin


			//Begin Fetch all subjects and output on the table
			$("#v-pills-subjects-tab").click(function(){
				//alert('Nice Once');

				//setting refresh timer
				setInterval(function(){

					$.ajax({

					type: "POST",
					url: "examflow_asynchronous.php",
					data: "getSubjects=getSubjects",
					success: function(msg){
						//$output = "<?php ?>"
						$('#getsubjectDiv').html(msg);
						
					},
					error: function(error){
						console.log(error);
					}
					})
				}, 1500)
				
			})
			//End Fetch all subjects and output on the table


			//Begin add New Admin using Ajax Method
			$('#addAdmin').click(function(){

				//storing form data in array with serialize
				var newAdminData = $('#newAdmin').serialize();
				//alert(newAdminData);

				//using ajax method
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: newAdminData,
					success: function(result){
						$("#addAdminOutput").html(result);
						//empty the form fields
						$('#adminFname').val("");
						$('#adminLname').val("");
						$('#adminEmail').val("");
						$('#adminCEmail').val("");
						$('#adminPassword').val("");
						$('#adminCPassword').val("");
						$('#countryCode').val("");
						$('#phone').val("");
						$("#addAdminOutput").click(function(){
							$(this).html("")
						})
					},
					error: function(error){
						console.log(error);
						
					}
				})
			})
			//End add New Admin using Ajax Method


			//Begin view examination list to see exam result 
			$("#v-pills-result-tab").click(function(){

				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: "adminViewResult=adminViewResult",
					success: function(result){
						$("#viewResultDiv").html(result);
					},
					error: function(error){
						console.log(error);
					}
				})
			})
			//End view examination list to see exam result


			//Begin count of examination, question and student for admin dash board display
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: "adminExamCount=adminExamCount",
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
					data: "adminStudentCount=adminStudentCount",
					success: function(result){
						$("#studentCount").html(result);
					},
					error: function(error){
						console.log(error);
					}
				})


				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: "adminQuestionCount=adminQuestionCount",
					success: function(result){
						$("#questionCount").html(result);
					},
					error: function(error){
						console.log(error);
					}
				})
			
			//End count of examination, question and student for admin dash board display


			//Begin clear profile picture upload error message
			jQuery(document).on('mouseover', '[id^=error_msg]',function(){
				//alert('I got here');
				 $(this).html('');
				
			})
			//End clear profile picture upload error message


			//Begin update of admin password
			$("#updatePasswordBtn").click(function(){
					const admin_id = $('#admin_id').val();
					var updatePassword = $("#updatePassword").serialize();
					//alert(updatePassword+"&admin_id="+admin_id)
				$.ajax({
					url: "examflow_asynchronous.php",
					type: "POST",
					data: updatePassword+"&admin_id="+admin_id,
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