
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
	<!--Fontawesome Stylesheet-->
	<link href="fontawesome/css/all.css" type="text/css" rel="stylesheet">
	<!--External Stylesheet-->
	<link rel="stylesheet" type="text/css" href="">
	<!--Internal Stylesheet-->
	<style type="text/css">
		
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<form method="post" name="registerStudents">
					<div class="row form-group">
						<div class="col">
							<label>Exam title / header</label>
							<input type="text" name="examTitle" class="form-control" placeholder="Human Anatomy" value="<?php
								if(isset($_GET['exam_title'])){
									echo $_GET['exam_title'];
								}
							?>" disabled="">
							<small id="" class="form-text text-danger"></small>
						</div>
						<div class="col">
							<label>Exam code</label>
							<input type="text" name="examCode" class="form-control" placeholder="ANA208" value="<?php
								if(isset($_GET['exam_code'])){
									echo $_GET['exam_code'];
								}
							?>
							" disabled="">
							<small id="" class="form-text text-danger"></small>
						</div>
					</div>
					<div class="row form-group">
						<div class="col">
							<label>Student email</label>
							<input type="text" name="examTitle" class="form-control" placeholder="Danladibako@gmail.com" id="studentEmail">
							<small id="" class="form-text text-danger"></small>
						</div>
						<div class="col">
							<label>Student name</label>
							<input type="text" name="studentName" class="form-control" placeholder="Danladi Bako" id="studentName">
							<small id="" class="form-text text-danger"></small>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--Javascript Files jquery, popper, bootstrap-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" language="javascript">
		$(document).ready(function(){
			
		}
			)
	</script>
</body>
</html>