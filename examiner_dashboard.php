<?php
include 'examflow_constants.php';

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
<body>
	<header class="row" id="header">
		<!--Navbar Header-->
		<div class="col-12">
			<nav class="navbar navbar-expand-lg navbar-light font-weight-bold" id="navbar">
			   <a class="navbar-brand" href="gui_index.html"><img src="exam_image/exam3.png" alt="logo" id="logo"><span id="examflow">Exam<span id="f_examflow">f</span>low</span></a>
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
			      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			      <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
			    </form>
			    <ul class="list-style-type-none navbar-nav">
			       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <img src="exam_image/avatar1.png" alt="mdo" width="32" height="32" class="rounded-circle">
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
	      		<img src="exam_image/avatar1.png" alt="" height="70" width="70" class="rounded-circle ml-4">
	      		<span>Examiner</span><br>
	      		<span>Oyekola Toheeb</span>
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
	            <a class="nav-link" href="#" id="v-pills-result-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-result" aria-selected="false">
	              <span data-feather="shopping-cart"></span><i class="fas fa-scroll"></i>
	              Results
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#" id="v-pills-saved-tab" data-toggle="pill" role="tab" aria-controls="v-pills-saved" aria-selected="false">
	              <span data-feather="users"></span><i class="fas fa-save"></i>
	              Saved
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#" id="v-pills-new_exam-tab" data-toggle="pill" role="tab" aria-controls="v-pills-new_exam" aria-selected="false">
	              <span data-feather="bar-chart-2"></span><i class="fas fa-quidditch"></i>
	              New Examination
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#" id="v-pills-profile-tab" data-toggle="pill" role="tab" aria-controls="v-pills-profile" aria-selected="false">
	              <span data-feather="layers"></span><i class="fas fa-user-alt"></i>
	              Profile
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#" id="v-pills-logout-tab" data-toggle="pill" role="tab" aria-controls="v-pills-logout" aria-selected="false">
	              <span data-feather="layers"></span><i class="fas fa-sign-out-alt"></i>
	              Logout
	            </a>
	          </li>
	        </ul>
	        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
	          <span>Saved reports</span>
	          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
	            <span data-feather="plus-circle"></span>
	          </a>
	        </h6>
	        <ul class="nav flex-column mb-2">
	          <li class="nav-item">
	            <a class="nav-link" href="#">
	              <span data-feather="file-text"></span>
	              Current month
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#">
	              <span data-feather="file-text"></span>
	              Last quarter
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#">
	              <span data-feather="file-text"></span>
	              Social engagement
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#">
	              <span data-feather="file-text"></span>
	              Year-end sale
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
  		          <div class="btn-group mr-2">
  		            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
  		            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
  		          </div>
  		          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
  		            <span data-feather="calendar"></span>
  		            This week
  		          </button>
  		        </div>
  		      </div>
		      </div>
		      <div class="tab-pane fade" id="v-pills-examination" role="tabpanel" aria-labelledby="v-pills-examination-tab">
		      	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  		        <h1 class="h2">Examination</h1>
  		        <div class="btn-toolbar mb-2 mb-md-0">
  		          <a href="examflow_newexam.php" class="btn btn-outline-secondary">
  		            Create new Examiantion
  		          </a>
  		        </div>
  		      </div>
  		      <div class="row">
		      		<div class="offset-2">
		      			<div class="table-responsive-sm">
		      			<table class="table table-hover table-light table-bordered table-striped">
		      				<thead>
		      					<tr>
		      						<th>S/N</th>
		      						<th>Examination Code</th>
		      						<th>Examination Title</th>
		      						<th>Examination Subject</th>
		      						<th>No of Questions</th>
		      						<th>No of Registered students</th>
		      						<th>Action</th>
		      					</tr>
		      				</thead>
		      				<tbody>
		      					<tr>
		      						<td>1</td>
		      						<td>GST 419</td>
		      						<td>General Studies</td>
		      						<td>English Language</td>
		      						<td>50</td>
		      						<td>200</td>
		      						<td>
		      							<a href="" class="btn btn-primary btn-sm"></a>
		      						</td>
		      					</tr>
		      				</tbody>
		      			</table>
		      			</div>
		      		</div>
		      	</div>
		      </div>
		      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
		      	
		      </div>
		      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
		      	
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
		$(document).ready(
  			function(){}
			)
	</script>
</body>
</html>