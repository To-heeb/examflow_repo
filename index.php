<?php
include 'examflow_constants.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage - <?php echo APPNAME; ?></title>
	<!--required meta tags-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--Bootstrap Stylesheet-->
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
	<!--Animate.css Stylesheet-->
	<link href="animate.css" type="text/css" rel="stylesheet">
	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&family=Satisfy&display=swap" rel="stylesheet">
	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="bootstrap-icons-1.5.0/font/bootstrap-icons.css">
	<!--Fontawesome Stylesheet-->
	<link href="fontawesome/css/all.css" type="text/css" rel="stylesheet">
	<!--External Stylesheet-->
	<link rel="stylesheet" type="text/css" href="">
	<style type="text/css">
		div{

			border: 0px solid red;
		}
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
		.cardDiv{
			box-shadow: 5px 5px grey;
		}
		.cardDiv:hover{

		}
		.carousel_img{
			opacity: 1;
		}
		.carousel-height{
			height:800px;
		}
		.carouselText{
			color: ;
			font-weight: lighter;
			background-color: rgba(166, 189, 240, 0.5);
		}
		.responsiveDiv{
			height: 370px; 
			width: 370px;
			border-radius: 50%;
			border: 5px solid #AAB2BD;
			position: relative;
		}
		#formDiv{
			min-height: 500px;
			background-image: url('exam_image/exam17.jpg');
			background-attachment: fixed;
		}
		.overlay {
		  position: absolute;
		  bottom: 0;
		  left: 0;
		  right: 0;
		  background-color: rgba(166, 189, 240, 0.9);
		  overflow: hidden;
		  width: 100%;
		  height: 100%;
		  border-radius: 50%;
		  -webkit-transform: scale(0);
		  -ms-transform: scale(0);
		  transform: scale(0);
		  -webkit-transition: .3s ease;
		  transition: .3s ease;
		}
		.overlayText {
		  color: black;
		  font-size: 35px;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  -webkit-transform: translate(-50%, -50%);
		  -ms-transform: translate(-50%, -50%);
		  transform: translate(-50%, -50%);
		  text-align: center;
		}
		#phoneImg:hover .overlay {
		  -webkit-transform: scale(1);
		  -ms-transform: scale(1);
		  transform: scale(1);
		}
		#tabImg:hover .overlay {
		  -webkit-transform: scale(1);
		  -ms-transform: scale(1);
		  transform: scale(1);
		}
		#computerImg:hover .overlay {
		  -webkit-transform: scale(1);
		  -ms-transform: scale(1);
		  transform: scale(1);
		}
		#phoneImg{
			background-image: url('exam_image/responsive1.png');
			background-repeat: no-repeat;
			background-color: white;
			background-position: center;
		}
		#tabImg{
			background-image: url('exam_image/responsive2.png');
			background-repeat: no-repeat;
			background-color: white;
			background-position: center;	
		}
		#computerImg{
			background-image: url('exam_image/responsive3.png');
			background-repeat: no-repeat;
			background-color: white;
			background-position: center;	
		}
		.loginDiv{
			min-height: 90px;
		}	
		#form-bg{
			background-color: lightgray;
			border-radius: 10px;
			box-shadow: 5px 5px 10px #A6BDF0;
			/*z-index: 1;*/
		}
		.card-body-color{
			background-color:  #A6BDF0;
		}
		#featureCardBorder1{
			border-left: 15px groove red;
		}
		#featureCardBorder1:hover{
			border-left: 15px groove red;
			color: white;
			background-color: red;
		}
		#featureCardBorder2{
			border-left: 15px groove orange;
		}
		#featureCardBorder2:hover{
			border-left: 15px groove orange;
			color: white;
			background-color: orange;
		}
		#featureCardBorder3{
			border-left: 15px groove green;
		}
		#featureCardBorder3:hover{
			border-left: 15px groove green;
			color: white;
			background-color: green;
		}
		#featureCardBorder4{
			border-left: 15px groove slateblue;
		}
		#featureCardBorder4:hover{
			border-left: 15px groove slateblue;
			color: white;
			background-color: slateblue;
		}
		#featureCardBorder5{
			border-left: 15px groove indigo;
		}
		#featureCardBorder5:hover{
			border-left: 15px groove indigo;
			color: white;
			background-color: indigo;
		}
		#featureCardBorder6{
			border-left: 15px groove blue;
		}
		#featureCardBorder6:hover{
			border-left: 15px groove blue;
			color: white;
			background-color: blue;
		}
		#featureCardBorder7{
			border-left: 15px groove brown;
		}
		#featureCardBorder7:hover{
			border-left: 15px groove brown;
			color: white;
			background-color: brown;
		}
		#featureCardBorder8{
			border-left: 15px groove violet;
		}
		#featureCardBorder8:hover{
			border-left: 15px groove violet;
			color: white;
			background-color: violet;
		}
		.focusDiv{
			border: 0px solid grey;
			min-height: 30px;
			border-radius: 10px;
			box-shadow: 0 4px 8px 2px rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.29);
		}
		.focusImg{
			display: block;
			margin-left: auto;
		    margin-right: auto;
		}
		#counterDiv{
			background-color: #37392E;
			border-radius: 15px;
		}
		.counts{
			margin: auto;
		}
		.numberDiv{
			width: 200px;
			height: 200px;
			border-radius: 100px;
			border: 1px solid black;
			background-color: #37392E;
			color: white;
			box-shadow: 0 4px 8px 2px rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.29);
		}
		#reviewCarousel{
			background-color: #AAAE8E;
			min-height: 300px;
		}
		.reviewerImg{
			display: block;
			margin-left: auto;
		    margin-right: auto;
		    border-radius: 50px;
		}
		footer{
			background: rgba(255, 255, 255, 0.7);
			background-color: #0B1D51;
			min-height: 100px;
			color: #AAAE8E;
		}
		#lowerFooter{
			background: rgba(11, 29, 81, 0.3) !important;
		}
		p > a{
			color: #AAAE8E;
		}
		@media screen and (max-width: 480px) {
		    .responsiveDiv{
		    	height: 350px;
		    	width: 350px;
		    }
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<!--Header-->
		<header class="row" id="header">
			<div class="col-12">
				<!--Navbar Header-->
				<nav class="navbar navbar-expand-lg navbar-light fixed-top font-weight-bold" id="navbar">
				  <a class="navbar-brand" href="#">	<img src="exam_image/exam3.png" alt="logo" id="logo"><span id="examflow">Exam<span id="f_examflow">f</span>low</span></a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse text-center justify-content-center text-justify" id="navbarNavDropdown">
				    <ul class="navbar-nav align-items-center">
				      <li class="nav-item active">
				        <a class="nav-link ml-md-3" href="index.php">HOME<span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link ml-md-3" href="examflow_login_signup.php?message=login">LOGIN</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link ml-md-3" href="examflow_login_signup.php?message=signup">SIGN UP</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link ml-md-3" href="#reviewCarousel">REVIEWS</a>
				      </li>
				      <li class="nav-item ml-md-3">
				        <a class="nav-link" href="#featuresDiv">FEATURES</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link ml-md-3" href="#aboutUs">ABOUT US</a>
				      </li>
				      <li class="nav-item">
				      	<!-- Modal Contact Us click here -->
				        <a class="nav-link"  href="" data-toggle="modal" data-target="#contactUsModal" data-whatever="@ContactUs">CONTACT US</a>
				      </li>
				    </ul>
				  </div>
				</nav>
			</div>
		</header>
		<!-- Contact Us Modal Start -->
		<div class="modal fade " id="contactUsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header" style="background-color: #0B1D51; color: white;">
		      	<h3 class="modal-title" id="exampleModalLabel">Contact Information</h3>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body" style="background-color: #A6BDF0;">
		        <form method="post" action="">
		          <div class="form-group">
		            <label for="recipient-name" class="col-form-label">Fullname:</label>
		            <input type="text" class="form-control" name="fullname" id="fullname">
		          </div>
		          <div class="form-group">
		            <label for="recipient-name" class="col-form-label">Email:</label>
		            <input type="email" class="form-control" name="fullname" id="fullname">
		          </div>
		          <div class="form-group">
		            <label for="recipient-name" class="col-form-label">Phone Number:</label>
		            <input type="text" class="form-control" name="phone" id="fullname">
		          </div>
		          <div class="form-group">
		            <label for="message-text" class="col-form-label">Message:</label>
		            <textarea class="form-control" id="message-text"></textarea>
		          </div>
		        </form>
		      </div>
		      <div class="modal-footer" style="background-color: #0B1D51; color: white;">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Send message</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Contact Us Modal End -->
		<!--Carousel Div-->
		<div class="row " id="carouselDiv">
			<div id="carouselExampleFade" class="carousel slide carousel-fade mb-md-5 mt-3" data-ride="carousel">
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img src="exam_image/exam8.jpg" class="d-block w-100 img-fluid carousel_img" alt="...">
			      <div class="carousel-caption d-none d-md-block mb-5">
		           	  <h1 class="display-1 carouselText" id="firstSlideText">Stress Free Exams</h1>
		              <p class="display-4 carouselText">Some representative placeholder content for the first slide.</p>
		              <p class="mb-5"></p>
		            </div>
			    </div>
			    <div class="carousel-item">
			      <img src="exam_image/exam12.jpg" class="d-block w-100 img-fluid carousel_img" alt="...">
			      <div class="carousel-caption d-none d-md-block mb-5">
		           	 <h1 class="display-1 carouselText" id="secondSlideText">Exam Center Freedom</h1>
		             <p class="display-4 carouselText">Some representative placeholder content for the second slide.</p>
	              </div>
			    </div>
			    <div class="carousel-item">
			      <img src="exam_image/exam13.jpg" class="d-block w-100 img-fluid carousel_img" alt="...">
			      <div class="carousel-caption d-none d-md-block mb-5 ">
		           	 <h1 class="display-1 carouselText" id="thirdSlideText">Exam Comfortablity</h1>
		             <p class="display-4 carouselText">Some representative placeholder content for the second slide.</p>
	              </div>
			    </div>
			    <div class="carousel-item">
			      <img src="exam_image/exam15.jpg" class="d-block w-100 img-fluid carousel_img" alt="...">
			      <div class="carousel-caption d-none d-md-block mb-5">
		           	 <h1 class="display-1 carouselText" id="fourthSlideText">Automated Result</h1>
		             <p class="display-4 carouselText">Some representative placeholder content for the second slide.</p>
	              </div>
			  	</div>
		     </div>
			  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
		<!-- EXAMFLOW HEADING -->
		<div class="row mt-5">
			<div class="col-md-3 col-12">
				<hr>
			</div>
			<div class="col text-center">
				<h3 >WELCOME TO THE EXAMFLOW APPLICATION</h3>
			</div>
			<div class="col-md-3 col-12">
				<hr>
			</div>
		</div>
		<!-- Cards -->
		<div class="row mt-5 align-content-centers">
			<div class="col justify-content-center ml-md-2 ml-5 mt-4">
				<div class="card rounded cardDiv" style="width: 18rem;">
				  <img src="exam_image/exam5.png" class="card-img-top" alt="...">
				  <div class="card-body card-body-color">
				    <h5 class="card-title">Examiner ease</h5>
				    <p class="card-text">Setting of examination has never been this easy for examiners but with examflow, examiner find ease.</p>
				  </div>
				</div>
			</div>
			<div class="col justify-content-center ml-md-2 ml-5 mt-4">
				<div class="card rounded cardDiv" style="width: 18rem;">
				  <img src="exam_image/exam7.png" class="card-img-top" alt="...">
				  <div class="card-body card-body-color">
				    <h5 class="card-title">Comfortability</h5>
				    <p class="card-text">Writing of exams exams has been an harship overtime but examflow has brougth comforts to it.</p>
				  </div>
				</div>
			</div>
			<div class="col justify-content-center ml-md-2 ml-5 mt-4">
				<div class="card rounded cardDiv" style="width: 18rem;">
				  <img src="exam_image/exam10.png" class="card-img-top" alt="...">
				  <div class="card-body card-body-color">
				    <h5 class="card-title">Student Access</h5>
				    <p class="card-text">It comes handy for students and makes examination hardship a thing of the past.</p>
				  </div>
				</div>
			</div>
			<div class="col justify-content-center ml-md-2 ml-5 mt-4">
				<div class="card rounded cardDiv" style="width: 18rem;">
				  <img src="exam_image/exam9.png" class="card-img-top" alt="...">
				  <div class="card-body card-body-color">
				    <h5 class="card-title">Admin Interaction</h5>
				    <p class="card-text">Exaflow application grants unlimited access to users to lay thier complain to admin.</p>
				  </div>
				</div>
			</div>
		</div>
		<div class="row mt-5 align-content-center" id="formDiv">
			<div class="col">
				<div class="responsiveDiv mt-5 ml-lg-4 ml-md-3 ml-5 rounded-circle" id="phoneImg">
					<div class="overlay">
						<div class="overlayText">Mobile Responsive</div>
					</div>
				</div>		
			</div>
			<div class="col">
				<div class="responsiveDiv mt-5 ml-lg-4 ml-md-3 ml-5 rounded-circle" id="tabImg">
					<div class="overlay">
						<div class="overlayText">Tablet Responsive</div>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="responsiveDiv mt-5 ml-lg-4 ml-md-3 ml-5 rounded-circle" id="computerImg">
					<div class="overlay">
						<div class="overlayText">Computer Responsive</div>
					</div>
				</div>
			</div>
		</div>
		<!-- FEATURES -->
		<div class="row mt-md-5 mt-4" id="featuresDiv">
			<div class="col-md-5">
				<hr>
			</div>
			<div class="col-md-2 text-center display-4" >FEATURES</div>
			<div class="col-md-5">
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col col-md-4 col-lg-3 mt-5">
				<div class="card ml-3 rounded" style="width: 18rem;" id="featureCardBorder1">
				  <div class="card-body">
				    <h5 class="card-title">Student Validation</h5>
				    <hr>
				    <p class="card-text">Student details are throughly verified before and after each examination preventing impersonation amd malpractices.</p>
				  </div>
				</div>
			</div>
			<div class="col col-md-4 col-lg-3 mt-5">
				<div class="card ml-3 rounded" style="width: 18rem;" id="featureCardBorder2">
				  <div class="card-body">
				    <h5 class="card-title">Automated Result</h5>
				    <hr>
				    <p class="card-text">Examiner are saved the stress of marking questions with examflow, the marking process will be handled by examflow.</p>
				  </div>
				</div>
			</div>
			<div class="col col-md-4 col-lg-3 mt-5">
				<div class="card ml-3 rounded" style="width: 18rem;" id="featureCardBorder3">
				  <div class="card-body">
				    <h5 class="card-title">Secured Browser</h5>
				     <hr>
				    <p class="card-text">Special security architecture is used to allow for Web browsing that is more protected from various kinds of cyberattacks.</p>
				  </div>
				</div>
			</div>
			<div class="col col-md-4 col-lg-3 mt-5">
				<div class="card ml-3 rounded" style="width: 18rem;" id="featureCardBorder4">
				  <div class="card-body">
				    <h5 class="card-title">Question Variety</h5>
				     <hr>
				    <p class="card-text">An examiner has an option to select from a variety of questions which makes it easy for examiners to carry out. </p>
				  </div>
				</div>
			</div>
			<div class="col col-md-4 col-lg-3 mt-5">
				<div class="card ml-3 rounded" style="width: 18rem;" id="featureCardBorder5">
				  <div class="card-body">
				    <h5 class="card-title">Admin Support</h5>
				    <hr>
				    <p class="card-text">Admin are at the sevices of the users round the clock to recieve complains, render assitance and give feedbacks.</p>
				  </div>
				</div>
			</div>
			<div class="col col-md-4 col-lg-3 mt-5">
				<div class="card ml-3 rounded" style="width: 18rem;" id="featureCardBorder6">
				  <div class="card-body">
				    <h5 class="card-title">Proctoring Technology</h5>
				    <hr>
				    <p class="card-text">Examination are closely monitiored on examflow to prevent cheating and other irregularities.</p>
				  </div>
				</div>
			</div>
			<div class="col col-md-4 col-lg-3 mt-5">
				<div class="card ml-3 rounded" style="width: 18rem;" id="featureCardBorder7">
				  <div class="card-body">
				    <h5 class="card-title">Secured Data</h5>
				    <hr>
				    <p class="card-text">Data security means  alot to us, we don't give out data of exmaflow user to unauthorized sources.</p>
				  </div>
				</div>
			</div>
			<div class="col col-md-4 col-lg-3 mt-5">
				<div class="card ml-3 rounded" style="width: 18rem;" id="featureCardBorder8">
				  <div class="card-body">
				    <h5 class="card-title">Highly Scalable</h5>
				    <hr>
				    <p class="card-text">Examflow application can handle a large increase in users, workload without undue strain.</p>
				  </div>
				</div>
			</div>
		</div>
		<!-- FOCUS -->
		<div class="row mt-md-5 mt-4" id="">
			<div class="col-md-5">
				<hr>
			</div>
			<div class="col-md-2 text-center display-4" >FOCUS</div>
			<div class="col-md-5">
				<hr>
			</div>
		</div>
		<div class="row align-content-center mt-4 ml-2">
			<div class="col-md-4 ">
				<div class="focusDiv mb-3 rounded" style="max-width: 23rem;">
				  <div class="card-body">
				  	<img src="exam_image/focus1.png" class="focusImg" alt="">
				    <p class="text-center text-dark mt-1">Recruiters</p>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="focusDiv mb-3 rounded" style="max-width: 23rem;">
				  <div class="card-body">
				  	<img src="exam_image/focus2.png" alt="" class="focusImg">
				    <p class="text-center text-dark mt-1">Home Schoolers</p>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="focusDiv mb-3 rounded" style="max-width: 23rem;">
				  <div class="card-body">
				  	<img src="exam_image/focus5.png" alt="" class="focusImg">
				    <p class="text-center text-dark mt-1">Schools</p>
				  </div>
				</div>
			</div>
		</div>
		<div class="row align-content-center mt-4 ml-2">
			<div class="col-md-4 ">
				<div class="focusDiv mb-3 rounded" style="max-width: 23rem;">
				  <div class="card-body">
				  	<img src="exam_image/focus6.png" alt="" class="focusImg">
				    <p class="text-center text-dark mt-1">Coaching Institution</p>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="focusDiv mb-3 rounded" style="max-width: 23rem;">
				  <div class="card-body">
				  	<img src="exam_image/focus3.png" alt="" class="focusImg">
				    <p class="text-center text-dark mt-1">College and University</p>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="focusDiv mb-3 rounded" style="max-width: 23rem;">
				  <div class="card-body">
				  	<img src="exam_image/focus8.png" alt="" class="focusImg">
				    <p class="text-center text-dark mt-1">Distance Learning</p>
				  </div>
				</div>
			</div>
		</div>
		<!-- COUNTER -->
		<!-- <div class="row mt-5" >
			<div class="col-6 offset-3" >
				<div class="text-center col-12 pb-1" id="counterDiv">			
					<h3 class="text-light" >Our Numbers</h3>
				</div>
				<div class="row mt-5 align-content-center">
					<div class="col-12 col-lg-4 mt-3">
						<div class="numberDiv">
							<p class="display-4 text-center counts mt-5">2335+</p>
						</div>
						<h4 class="text-center text-muted text-light mt-2">Examination Created</h4>
					</div>
					<div class="col-12 col-lg-4 mt-3">
						<div class="numberDiv">
							<p class="display-4 text-center counts mt-5">2335+</p>
						</div>
						<h4 class="text-center text-muted text-light mt-2">Registered Examiner</h4>
					</div>
					<div class="col-12 col-lg-4 mt-3">
						<div class="numberDiv">
							<p class="display-4 text-center counts mt-5">2335+</p>
						</div>
						<h4 class="text-center text-muted text-light mt-2">Questions Created</h4>
					</div>
				</div>
			</div>
		</div> -->
		<!-- FAQS Accordion -->
		<div class="row mt-5 mb-5" id="faq">
			<div class="offset-md-3 offset-1 col-md-6 col-10">
				<h3 class="text-center mb-5" >Frequently Asked Questions (FAQs)</h3>
				<div class="accordion" id="accordionExample">
				  <div class="card">
				    <div class="card-header" id="headingOne">
				      <h2 class="mb-0">
				        <button class="btn btn-link btn-block text-left text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				          What is an Online Examination?
				        </button>
				      </h2>
				    </div>
				    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
				      <div class="card-body card-body-color">
				        <p>Online examination, also known as virtual examination, is conducted remotely on a computer or mobile device with high-speed internet. Like a classroom exam, it is time-bound and usually supervised through a webcam and proctor, making it cheating-free, secure and easily scalable.</p>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingTwo">
				      <h2 class="mb-0">
				        <button class="btn btn-link btn-block text-left collapsed text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				          What is an Online Examination System?
				        </button>
				      </h2>
				    </div>
				    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				      <div class="card-body card-body-color">
				        <p>An online examination system allows centers for learning across seniority levels to plan and execute end-to-end virtual assessments. Such an exam software has in-built features to enable controllers of examination to plan the grading scheme, candidate and evaluator slotting, AI-enabled invigilation mechanisms and automated evaluation result declaration mechanisms. It replicates the entire offline physical examination process with greater ease and efficiency, making it a seamless exercise for all involved.</p>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingThree">
				      <h2 class="mb-0">
				        <button class="btn btn-link btn-block text-left collapsed text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				          How does examflow online application work?
				        </button>
				      </h2>
				    </div>
				    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
				      <div class="card-body card-body-color">
				       	<p>An online examination system replicates a physical, center-based examination. The difference being that every activity is taken remotely, via a platform. It can be managed from anywhere, eliminating the hassles associated with physical examinations. It constitutes every feature required to plan, host and evaluate examinations of all kinds, enabling educators to save significant time and financial resources invested otherwise in offering center-based assessments. It has a slew of automated features that help moot the grading system, question paper type, invite test-takers, authenticate their candidature, offer uncompromised exams and evaluate with ease.</p>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingFour">
				      <h2 class="mb-0">
				        <button class="btn btn-link btn-block text-left collapsed text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
				          How much will i pay to use examflow online exam application?
				        </button>
				      </h2>
				    </div>
				    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
				      <div class="card-body card-body-color">
				       	<p>Exam flow is totally free and efficient for all users around the globe.</p>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingFive">
				      <h2 class="mb-0">
				        <button class="btn btn-link btn-block text-left collapsed text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
				          What are the advantages of using online examination system?
				        </button>
				      </h2>
				    </div>
				    <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
				      <div class="card-body card-body-color">
				       	<p>Advantages of an online examination system-</p>
       	                  <ol type="a">
       	                      <li><p>Seamless and easy setup of the exam on the online platform</p></li>
       	                      <li><p>Diverse question paper formats and endless randomization of questions</p></li>
       	                      <li><p>Easy for administrators with seamless candidate slotting</p></li>
       	                      <li><p>Smooth coordination with test-takers with customized calendar invite</p></li>
       	                      <li><p>Highly scalable</p></li>
       	                      <li><p>More generous and open-ended timelines possible</p></li>
       	                      <li><p>No hassles of procuring examination centers</p></li>
       	                      <li><p>Superlative invigilation with low invigilator to candidate ratio</p></li>
       	                      <li><p>Automative grading</p></li>
       	                      <li><p>More airtight</p></li>
       	                  </ol>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingSix">
				      <h2 class="mb-0">
				        <button class="btn btn-link btn-block text-left collapsed text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
				          Why is examflow the best online examination platform?
				        </button>
				      </h2>
				    </div>
				    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
				      <div class="card-body card-body-color">
				       	<p>Examflow is a stressfree online examination platform that is free and very efficient. Check users <a href="#reviewCarousel" class="text-decoration-none">reviews</a> about us.</p>
				      </div>
				    </div>
				  </div>
				</div>
			</div>
		</div>
		<!--REVIEWS-->
		<div class="row" id="reviewCarousel">
			<div id="carouselExampleControls" class="carousel slide mt-4" data-ride="carousel">
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			     	<div class="row align-content-center">
			     		<div class="col-sm-12 col-md-4">
			     			<img src="exam_image/avatar4.png" alt="" class="reviewerImg" height="100" width="100">
			     			<div class="text-center mt-5">
			     				<p>This is a nice appilcation and i recommend it for every examiner.</p>
			     			</div>
			     		</div>
			     		<div class="col-sm-12 col-md-4">
			     			<img src="exam_image/avatar5.png" alt="" class="reviewerImg" height="100" width="100">
			     			<div class="text-center mt-5">
			     				<p>This is a nice appilcation and i recommend it for every examiner.</p> 	
			     			</div>
			     		</div>
			     		<div class="col-sm-12 col-md-4">
			     			<img src="exam_image/avatar1.png" alt="" class="reviewerImg" height="100" width="100">
			     			<div class="text-center mt-5">
			     				<p>This is a nice appilcation and i recommend it for every examiner..</p>
			     			</div>
			     		</div>
			     	</div>
			    </div>
			    <div class="carousel-item">
			     	<div class="row align-content-center">
			     		<div class="col-sm-12 col-md-4 reviewDiv">
			     			<img src="exam_image/avatar1.png" alt="" class="reviewerImg" height="100" width="100">
			     			<div class="text-center mt-5">
			     				<p>This is a nice appilcation and i recommend it for every examiner.</p>
			     			</div>
			     		</div>
			     		<div class="col-sm-12 col-md-4 reviewDiv">
			     			<img src="exam_image/avatar2.png" alt="" class="reviewerImg" height="100" width="100">
			     			<div class="text-center mt-5">
			     				<p>This is a nice appilcation and i recommend it for every examiner.</p>
			     			</div>
			     		</div>
			     		<div class="col-sm-12 col-md-4 reviewDiv">
			     			<img src="exam_image/avatar3.png" alt="" class="reviewerImg" height="100" width="100">
			     			<div class="text-center mt-5">
			     				<p>This is a nice appilcation and i recommend it for every examiner.</p>
			     			</div>
			     		</div>
			     	</div>
			    </div>
			    <div class="carousel-item">
			      <div class="row align-content-center">
			     		<div class="col-sm-12 col-md-4">
			     			<img src="exam_image/avatar3.png" alt="" class="reviewerImg" height="100" width="100">
			     			<div class="text-center mt-5">
			     				<p>This is a nice appilcation and i recommend it for every examiner.</p>
			     			</div>
			     		</div>
			     		<div class="col-sm-12 col-md-4">
			     			<img src="exam_image/avatar1.png" alt="" class="reviewerImg" height="100" width="100">
			     			<div class="text-center mt-5">
			     				<p>This is a nice appilcation and i recommend it for every examiner.</p>
			     			</div>
			     		</div>
			     		<div class="col-sm-12 col-md-4">
			     			<img src="exam_image/avatar2.png" alt="" class="reviewerImg" height="100" width="100">
			     			<div class="text-center mt-5">
			     				<p>This is a nice appilcation and i recommend it for every examiner.</p>
			     			</div>
			     		</div>
			     	</div>
			    </div>
			  </div>
			</div>
		</div>
     	<!-- FOOTER -->
		<footer class="row pt-4 d-flex">
			<div class="col-2 text-left">
				<h5>Section</h5>
				<ul class="nav flex-column">
				  <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
				  <li class="nav-item mb-2"><a href="#featuresDiv" class="nav-link p-0 text-muted">Features</a></li>
				  <li class="nav-item mb-2"><a href="#reviewCarousel" class="nav-link p-0 text-muted">Reviews</a></li>
				  <li class="nav-item mb-2"><a href="#faq" class="nav-link p-0 text-muted">FAQs</a></li>
				  <li class="nav-item mb-2"><a href="#aboutUs" class="nav-link p-0 text-muted">About</a></li>
				</ul>
			</div>
			<div class="col-4  text-left">
				<h4 id="aboutUs">ABOUT US</h4>
				<p class="text-muted"><?php echo APPNAME;?> is with the mission to make life smarter. We are built to change the ICT and educational sectors in Africa and specifically Nigeria by developing internationally accepted solutions that can compete at any level.</p>
			</div>
			<div class="col-5">
				<form>
     	         <h5>Subscribe to our newsletter</h5>
     	         <p>Monthly digest of whats new and exciting from us.</p>
     	         <div class="d-flex w-100 gap-2">
     	           <label for="newsletter1" class="visually-hidden sr-only">Email address</label>
     	           <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
     	           <button class="btn btn-primary btn-sm" type="submit">Subscribe</button>
     	         </div>
     	       </form>
     	       <h5 class="mt-3">Follow Us</h5>
     	       <p style="color: white;"><a href=""><i class="fab fa-facebook-square fa-2x"></i></a>&nbsp;<a href=""><i class="fab fa-twitter-square fa-2x"></i></a>&nbsp;<a href=""><i class="fab fa-instagram-square fa-2x"></i></a>&nbsp;<a href=""><i class="fab fa-youtube-square fa-2x"></i></a>&nbsp;<a href=""><i class="fab fa-whatsapp-square fa-2x"></i></a>&nbsp;<a href=""><i class="fab fa-google-plus-square fa-2x"></i></a></p>
			</div>
			<hr width="90%" size="2">
			<div class="col-12" id="lowerFooter">
				<div class="col text-center">
					<p>&copy;Copyright <?php echo APPNAME." ".date('Y');?> | All rights reserved | <a href="">Terms and Condition</a> | <a href="">Privacy Policy</a></p>
					<p></p>
				</div>
			</div>
		</footer>
	</div>
	<!--Javascript Files jquery, popper, bootstrap-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" language="javascript">
		$(document).ready(function(){
			$("#firstSlideText").addClass('animate__animated animate__zoomInDown animate__delay-1s')
			$("#secondSlideText").addClass('animate__animated animate__zoomInDown animate__delay-1s')
			$("#thirdSlideText").addClass('animate__animated animate__zoomInDown animate__delay-1s')
			$("#fourthSlideText").addClass('animate__animated animate__zoomInDown animate__delay-1s')
		})
	</script>
</body>
</html>