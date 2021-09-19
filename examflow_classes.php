<?php
date_default_timezone_set('Africa/Lagos');
/**********************************************/
/***** Author: Oyekola Toheeb ****************/
/***** Program: examflow Class Definition ****/
/***** Date: August/20/2021 ******************/
/*********************************************/

include_once 'examflow_constants.php';

# Begin  Users class definition
class Users{
	//member variable
	public $dbcon;

	//member construct functions/methods 
	function __construct(){

	//connect to database
	$this->dbcon = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASENAME);
	if ($this->dbcon->connect_error)  {
		//logging of error into a file
		$connection_errors = 'connection_errors.txt';
		$error_msg = "Connection Error of class Users ".$this->dbcon->connect_error."\n";
		file_put_contents($connection_errors, $error_msg, FILE_APPEND);
		die("Conneciton Failure: the reason for is ".$this->dbcon->connect_error);
		}
	}



	//method for user registration as students
	function registerUserStudent($fname, $lname, $email, $password, $phoneNumber){
		$pwd = md5(md5($password));
		$sql = "INSERT INTO students SET student_fname = '$fname', student_lname = '$lname', student_email = '$email', student_password ='$pwd', student_phone = '$phoneNumber'";

		$result = $this->dbcon->query($sql);
		if ($this->dbcon->error) {
			//logging of error into a file
			$registrationFile = 'registration_error.txt';
			$error_msg = $this->dbcon->error." for registration ".$fname.' '.$lname." as a student on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($registrationFile, $error_msg, FILE_APPEND);
			 return "<div class='alert alert-danger'>"."There is an error: ".$this->dbcon->error."</div>";
		}else{
			$message = "<div class='alert alert-primary'>Registration successful, You will recieve a link in your email for authentication. Click <a href='examflow_login_signup.php?message=login'>here</a> to login </div>";
				header("Location: examflow_registration_success.php?msg=$message");
				exit;
		}
		}

	

	//method for student login
	function studentLogin($email, $password){
		$pwd = md5(md5($password));
		$sql = "SELECT * FROM students WHERE student_email ='$email' AND student_password = '$pwd'";

		$result = $this->dbcon->query($sql);
		if ($this->dbcon->error) {
			//logging of error into a file
			$loginFile = 'login_error.txt';
			$error_msg = $this->dbcon->error." for login of student with email".$email." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($loginFile, $error_msg, FILE_APPEND);
			 return "<div class='alert alert-danger'>"."There is an error: ".$this->dbcon->error."</div>";
		}elseif($result->num_rows > 0){
			$studentData = $result->fetch_assoc();
			return $studentData;
		}else{
			return "<div class='alert alert-danger'>You don't have an account on Examflow as a Student. Please click <a href='examflow_login_signup.php'>here</a> to register.</div>";
		}

	}


	//method for user registration as examiner
	function registerUserExaminer($fname, $lname, $email, $password, $phoneNumber){
		$pwd = md5(md5($password));
		$sql = "INSERT INTO examiners(examiner_fname, examiner_lname, examiner_email, examiner_password, examiner_phone) VALUES('$fname', '$lname', '$email', '$pwd', '$phoneNumber')";

		$result = $this->dbcon->query($sql);
		if ($this->dbcon->error) {
			//logging of error into a file
			$registrationFile = 'registration_error.txt';
			$error_msg = $this->dbcon->error." for registration of ".$fname.' '.$lname." as an examiner on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($registrationFile, $error_msg, FILE_APPEND);
			 return "<div class='alert alert-danger'>"."There is an error ".$this->dbcon->error."</div>";
		}else{
			$message = "<div class='alert alert-primary'>Registration successful, Please check your email you will recieve a link to sign up.</div>";
				header("Location: examflow_registration_success.php?msg=$message");
				exit;
		}
	}



	//method for examiner login
	function examinerLogin($email, $password){
		$pwd = md5(md5($password));
		$sql = "SELECT * FROM examiners WHERE examiner_email ='$email' AND examiner_password = '$pwd'";

		$result = $this->dbcon->query($sql);
		if ($this->dbcon->error) {
			//logging of error into a file
			$loginFile = 'login_error.txt';
			$error_msg = $this->dbcon->error." for login of ".$email." as an examiner on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($loginFile, $error_msg, FILE_APPEND);
			 return "<div class='alert alert-danger'>"."There is an error ".$this->dbcon->error."</div>";
		}elseif($result->num_rows > 0){
			$examinerData = $result->fetch_assoc();
			return $examinerData;
		}else{
			return "<div class='alert alert-danger'>You don't have an account on Examflow as an Examiner. Please click <a href='examflow_login_signup.php'>here</a> to register.</div>";
		}

	}



	//method for admin creation
	function registerUserAdmin($fname, $lname, $email, $password, $phoneNumber, $adminType){
		$pwd = md5(md5($password));
		$sql = "INSERT INTO admins SET admin_fname = '$fname', admin_lname = '$lname', admin_email = '$email', admin_password ='$pwd', admin_phone = '$phoneNumber', admin_type = (SELECT admin_type_id FROM admin_type WHERE admin_type = '$adminType')";

		$result = $this->dbcon->query($sql);
		if ($this->dbcon->error) {
			//logging of error into a file
			$registrationFile = 'admin_reg_error.txt';
			$error_msg = $this->dbcon->error." for creation of ".$fname.' '.$lname." as an admin on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($registrationFile, $error_msg, FILE_APPEND);
			 return "<div class='alert alert-danger'>"."New Admin creation failed, please try again later. ".$this->dbcon->error."</div>";
		}else{
			$message = "<div class='alert alert-primary'>New Admin successfully created, an authenticaton email will be sent to the new admin.</div>";
				exit;
		}
	}


	//method for admin login
	function adminLogin($email, $password){

		$pwd = md5(md5($password));
		$sql = "SELECT * FROM admins WHERE admin_email ='$email' AND admin_password = '$pwd'";
		$result = $this->dbcon->query($sql);
		if ($this->dbcon->error) {
			//logging of error into a file
			$loginFile = 'login_error.txt';
			$error_msg = $this->dbcon->error." for login of ".$email." as an admin on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($loginFile, $error_msg, FILE_APPEND);
			 //return "<div class='alert alert-danger'>"."There is an error ".$this->dbcon->error."</div>";
		}elseif($result->num_rows > 0){
			$adminData = $result->fetch_assoc();
			return $adminData;
		}else{
			return "<div class='alert alert-danger'>You don't have an account as an Admin on Examflow. Please click <a href='examflow_login_signup.php'>here</a> to register as an Examiner or Student.</div>";
		}
	}


	//method to upload profile picture for examiner
	function examinerUpdateProfilePicture($filetemp, $file_ext_lowerCase, $examiner_id){
		$profilePictureName = rand().time()."."."$file_ext_lowerCase";
		$destination = "examflow_profilepictures/".$profilePictureName;

		move_uploaded_file($filetemp, $destination);

		//update category table based on catid
		$sql = "UPDATE examiners SET examiner_image = '$profilePictureName' WHERE examiner_id = '$examiner_id'";
		$result = $this->dbcon->query($sql);
		if ($this->dbcon->error) {
			//logging of error into a file
 			$profilepicture_upload_errors = 'profilepicture_upload_errors.txt';
			$error_msg = "Examiner with id ".$examiner_id." is unable to upload profile picture because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($profilepicture_upload_errors, $error_msg, FILE_APPEND);

		}elseif($this->dbcon->affected_rows == 1) {
			$msg = "<div class='alert alert-success'>Profile picture successfully uploaded</div>";

			//redirect to listcategory.php page
			header("Location: examflow_dashboard_examiner.php?pictureMsg=$msg");
			exit;
		}else{
			return "<div class='alert alert-danger' id='error_msg'>Unable to upload profile picture, please try again later</div>";
		}
	}


	//method to upload profile picture for student
	function studentUpdateProfilePicture($filetemp, $file_ext_lowerCase, $student_id){
		$profilePictureName = rand().time()."."."$file_ext_lowerCase";
		$destination = "examflow_profilepictures/".$profilePictureName;

		move_uploaded_file($filetemp, $destination);

		//update category table based on catid
		$sql = "UPDATE students SET student_image = '$profilePictureName' WHERE student_id = '$student_id'";
		$result = $this->dbcon->query($sql);
		if ($this->dbcon->error) {
			//logging of error into a file
 			$profilepicture_upload_errors = 'profilepicture_upload_errors.txt';
			$error_msg = "Student with id ".$student_id." is unable to upload profile picture because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($profilepicture_upload_errors, $error_msg, FILE_APPEND);

		}elseif($this->dbcon->affected_rows == 1) {
			$msg = "<div class='alert alert-success'>Profile picture successfully uploaded</div>";

			//redirect to listcategory.php page
			header("Location: examflow_dashboard_student.php?pictureMsg=$msg");
			exit;
		}else{
			return "<div class='alert alert-danger'>Unable to upload profile picture, please try again later</div>";
		}
	}



	//method to upload profile picture for admin
	function adminUpdateProfilePicture($filetemp, $file_ext_lowerCase, $admin_id){
		$profilePictureName = rand().time()."."."$file_ext_lowerCase";
		$destination = "examflow_profilepictures/".$profilePictureName;

		move_uploaded_file($filetemp, $destination);

		//update category table based on catid
		$sql = "UPDATE admins SET admin_image = '$profilePictureName' WHERE admin_id = '$admin_id'";
		$result = $this->dbcon->query($sql);
		if ($this->dbcon->error) {
			//logging of error into a file
 			$profilepicture_upload_errors = 'profilepicture_upload_errors.txt';
			$error_msg = "Admin with id ".$admin_id." is unable to upload profile picture because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($profilepicture_upload_errors, $error_msg, FILE_APPEND);

		}elseif($this->dbcon->affected_rows == 1) {
			$msg = "<div class='alert alert-success'>Profile picture successfully uploaded</div>";

			//redirect to listcategory.php page
			header("Location: examflow_dashboard_admin.php?pictureMsg=$msg");
			exit;
		}else{
			return "<div class='alert alert-danger' id='error_msg'>Unable to upload profile picture, please try again later</div>";
		}
	}


	//method for admin to update password
 	function adminUpdatePassword($admin_id, $password){

 		$pwd = md5(md5($password));
 		//write sql
 		$sql= "UPDATE admins SET admin_password = '$pwd' WHERE admin_id = '$admin_id'";
 		$result = $this->dbcon->query($sql);
		if ($this->dbcon->error) {
			//logging of error into a file
 			$update_password_errors = 'update_password_errors.txt';
			$error_msg = "Admin with id ".$admin_id." is unable to upload password because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($update_password_errors, $error_msg, FILE_APPEND);
		}elseif($this->dbcon->affected_rows == 1) {
			return "<div class='alert alert-success'> Password successfully uploaded</div>";

		}elseif($this->dbcon->affected_rows == 0){
			return "<div class='alert alert-info'>No change made</div>";
		}else{
			return "<div class='alert alert-danger'>Unable to update password, please try again later.</div>";
		}
 	}


 	//method for examiner to update password
 	function examinerUpdatePassword($examiner_id, $password){

 		$pwd = md5(md5($password));
 		//write sql
 		$sql= "UPDATE examiners SET examiner_password = '$pwd' WHERE examiner_id = '$examiner_id'";
 		$result = $this->dbcon->query($sql);
		if ($this->dbcon->error) {
			//logging of error into a file
 			$update_password_errors = 'update_password_errors.txt';
			$error_msg = "Examiner with id ".$examiner_id." is unable to upload password because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($update_password_errors, $error_msg, FILE_APPEND);
		}elseif($this->dbcon->affected_rows == 1) {
			return "<div class='alert alert-success'> Password successfully uploaded</div>";

		}elseif($this->dbcon->affected_rows == 0){
			return "<div class='alert alert-info'>No change made</div>";
		}else{
			return "<div class='alert alert-danger'>Unable to update password, please try again later.</div>";
		}
 	}


 	//method for student to update password
 	function studentUpdatePassword($student_id, $password){

 		$pwd = md5(md5($password));
 		//write sql
 		$sql= "UPDATE students SET student_password = '$pwd' WHERE student_id = '$student_id'";
 		$result = $this->dbcon->query($sql);
		if ($this->dbcon->error) {
			//logging of error into a file
 			$update_password_errors = 'update_password_errors.txt';
			$error_msg = "Studnet with id ".$student_id." is unable to upload password because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($update_password_errors, $error_msg, FILE_APPEND);
		}elseif($this->dbcon->affected_rows == 1) {
			return "<div class='alert alert-success'> Password successfully uploaded</div>";

		}elseif($this->dbcon->affected_rows == 0){
			return "<div class='alert alert-info'>No change made</div>";
		}else{
			return "<div class='alert alert-danger'>Unable to update password, please try again later.</div>";
		}
 	}



}
# End of Users class definition



# Begin Examination class definition
 class Examination{

 	//member variable
 	public $dbcon;
 	public $subject_id;

 	//member construct functions/methods
	function __construct(){

	//connect to database
	$this->dbcon = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASENAME);
	if ($this->dbcon->connect_error) {
		//logging of error into a file
		$connection_errors = 'connection_errors.txt';
		$error_msg = "Connection Error of class Examination ".$this->dbcon->connect_error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($connection_errors, $error_msg, FILE_APPEND);
		die("Connection Failure: the reason for is ".$this->dbcon->connect_error);
		}
	}


 	//method for new examination creation
 	function createNewExamination($exam_code, $exam_title, $examiner_id, $subject_name){
 		//write sql query
 		$sql = "INSERT INTO examinations SET examiner_id = '$examiner_id', subject_id = (SELECT subject_id FROM subjects WHERE subject_name = '$subject_name'), exam_code = '$exam_code', exam_title = '$exam_title'";
 		//execute the query
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error) {
 			//logging of error into a file
 			$examination_creation_errors = 'examination_creation_errors.txt';
			$error_msg = "Unable to create new examination because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($examination_creation_errors, $error_msg, FILE_APPEND);
			//return "<div class='alert alert-danger'>Oops! Unable to create new examination. Please try again later.</div>";
 		}elseif($this->dbcon->affected_rows > 0) {
 			return "<div class='alert alert-success'> Examination successfully created, check Saved Exams to add questions and update examination</div>";
 		}else{
 			return "<div class='alert alert-danger'>Oops! Unable to create new examination. Please try again later.</div>";
 		}
 	}


 	//method to update examination
 	function updateExamination($exam_start_time, $exam_end_time, $exam_result_date, $exam_instruction, $exam_duration, $exam_id){
 		//write sql query
 		$sql = "UPDATE examinations SET exam_start_time = '$exam_start_time', exam_end_time = '$exam_end_time', exam_result_date = '$exam_result_date', exam_instruction = '$exam_instruction', exam_duration = '$exam_duration' WHERE exam_id = '$exam_id'";
 		//execute sql query
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->affected_rows == 1) {
 			$msg = "<div class='alert alert-success'>Examination have been successfully updated.</div>";
			//redirect to examiner dashboard page
			header("Location: examflow_dashboard_examiner.php?updateMsg=$msg");
 		}elseif($this->dbcon->affected_rows == 0){
			return "Oops! Examination was not updated, Please try again.";
		}else{
			$examination_creation_errors = 'examination_creation_errors.txt';
			$error_msg = "Unable update examination because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($examination_creation_errors, $error_msg, FILE_APPEND);
			return "Could not update examination ".$this->dbcon->error;
		}
 	}


 	//method for fetch all examination created by an examiner
 	function registerStudent($student_email, $student_name, $exam_id, $exam_title){
 		$student_passcode = rand(); 
 		$sql = "INSERT INTO registered_students(student_id, exam_id, student_exam_passcode) VALUES((SELECT student_id FROM students WHERE student_email = '$student_email'), (SELECT exam_id FROM examinations WHERE exam_id = '$exam_id'), '$student_passcode')";
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error){
 			//logging of error into a file
 			$student_registration_errors = 'student_registration_errors.txt';
			$error_msg = "Unable to Register student with email ".$student_email ." for examination with exam id ".$exam_id." because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($student_registration_errors, $error_msg, FILE_APPEND);
			return "<div class='alert alert-danger'>Unable to register student, please try again.</div>";
 		}elseif($this->dbcon->affected_rows > 0) {
 			return "<div class='alert alert-success'>".$student_name." has been successfully registered for ".$exam_title ." examination</div>";
 			$registration_id = $this->dbcon->insert_id;
 			$exampasscode = $student_passcode.".".$registration_id;
 			$student_email_passcode = $student_passcode.".".$registration_id;
 			$receiver_address = $student_email;
			$subject = "Examination on examflow";
			$message = "You have been registered to sit for ".$exam_title." and your examination passcode is ".$exampasscode." Please check your dashboard for the examination date, Wish you all the best. ";
			$headers ="From: examflow@gmail.com";

			mail($receiver_address, $subject, $message, $headers);
 		}else{
 			return "<div class='alert alert-info'>No record of student found, please inform student to register on Examflow platform inorder to sit for this examination.</div>";
 		}
 	}


 	//method to fetch student name when registering email
 	function getStudentName($student_email){
 		//write sql query
 		$sql = "SELECT CONCAT(student_lname,' ',student_fname) AS fullname FROM students WHERE student_email = '$student_email'";
 		//execute the query
 		$result = $this->dbcon->query($sql);
 		$rows = array();
 		if ($this->dbcon->error){
 			//logging of error into a file
 			$student_registration_errors = 'student_registration_errors.txt';
			$error_msg = "Unable to fetch name of student with email ".$student_email ." because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($student_registration_errors, $error_msg, FILE_APPEND);
 		}elseif($this->dbcon->affected_rows > 0) {
 			return $result->fetch_all();
 			/*while ($row = $result->fetch_array()) {
 				$rows[] = $row;
 			}
 			return $rows;*/
 		}else{
 			return 'No record found';
 		}
 	}

 	//method to fetch student all registered student form an examination


 	//method for student to login for an examination an examination
 	function studentExamLogin($student_exam_passcode, $registration_id, $student_email){
 		$exam_status = 0;
 		$sql="SELECT students.*, registered_students.*, examinations.* FROM students JOIN registered_students ON students.student_id = registered_students.student_id JOIN examinations ON registered_students.exam_id = examinations.exam_id WHERE student_exam_passcode = '$student_exam_passcode' AND registration_id = '$registration_id' AND exam_status = '$exam_status' AND student_email = (SELECT student_email FROM students WHERE student_email = '$student_email') /*AND exam_start_time <= NOW() AND  exam_end_time >= NOW()*/";
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error) {
 			$exam_login_errors = 'exam_login_errors.txt';
			$error_msg = "Student with the email '".$student_email."' is unable to login because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($exam_login_errors, $error_msg, FILE_APPEND);
			//return $error_msg;
			return "<div class='alert alert-danger'>Oops! Something went wrong, please try to login again.</div>";
 		}elseif($this->dbcon->affected_rows == 1) {
 			while ($row = $result->fetch_assoc()) {
 			$examLoginData[] = $row;	
 			}
 			return $examLoginData;
 		}else{
 			return "<div  class='alert alert-danger'><ul>You are not eligible to sit for this examination for one of these reason:<li>Wrong email or exam passcode.</li><li>Exam duration exceeded</li><li>Previously logged in for the examination</li><ul></div>";
 		}
 	}


 	//method to fetch all examination created by an examiner for updating
 	function getAllExaminationsByExaminer($examiner_id){
 		//write sql query
 		$sql = "SELECT examinations.*, subjects.subject_name FROM examinations LEFT JOIN subjects ON examinations.subject_id = subjects.subject_id WHERE examiner_id = (SELECT examiner_id FROM examiners WHERE examiner_id = '$examiner_id') ORDER BY exam_created_at DESC;";
 		//execute the query
 		$result = $this->dbcon->query($sql);
 		$rows = array();
 		if ($this->dbcon->error) {
 			$examination_creation_errors = 'examination_creation_errors.txt';
			$error_msg = "Unable to get all examinations by examiner with examiner id ".$examiner_id." because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($examination_creation_errors, $error_msg, FILE_APPEND);
			return "<div class='alert alert-danger'>Oops! Something went wrong, please refresh your browser or try again later.</div>";
 		}elseif($this->dbcon->affected_rows > 0) {
 			while ($row = $result->fetch_assoc()) {
 				$rows[] = $row; 
 			/* $rows = $result->fetch_all(MYSQLI_ASSOC);
 			 return $rows;*/
			}
			return $rows;
 		}else{
 			return "<div class='alert alert-danger'>Oops! Something went wrong, unable to fetch data, please refresh your browser or try again later.</div>";
 	}

 }


 	//method to fetch all examiner for admin viewing
 	function getAllExaminersForAdmin(){
 		//write sql query
 		$sql = "SELECT * FROM examiners ORDER BY examiner_lname DESC;";
 		//execute the query
 		$result = $this->dbcon->query($sql);
 		$rows = array();
 		if ($this->dbcon->error) {
 			$examiner_details_errors = 'examiner_details_errors.txt';
			$error_msg = "Unable to get all examiner details because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($examiner_details_errors, $error_msg, FILE_APPEND);
			return "<div class='alert alert-danger'>Oops! Something went wrong, please refresh your browser or try again later.</div>";
			//return $error_msg;
 		}elseif($this->dbcon->affected_rows > 0) {
 			while ($row = $result->fetch_assoc()) {
 				$rows[] = $row; 
 			/* $rows = $result->fetch_all(MYSQLI_ASSOC);
 			 return $rows;*/
			}
			return $rows;
 		}else{
 			return "<div class='alert alert-danger'>Oops! Something went wrong, unable to fetch data, please refresh your browser or try again later.</div>";
 	}


 }


 	//method to fetch all examiner for admin viewing
 	function getAllStudentsForAdmin(){
 		//write sql query
 		$sql = "SELECT * FROM students ORDER BY student_lname DESC;";
 		//execute the query
 		$result = $this->dbcon->query($sql);
 		$rows = array();
 		if ($this->dbcon->error) {
 			$student_details_errors = 'student_details_errors.txt';
			$error_msg = "Unable to get all students details because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($student_details_error, $error_msg, FILE_APPEND);
			return "<div class='alert alert-danger'>Oops! Something went wrong, please refresh your browser or try again later.</div>";
			return $error_msg;
 		}elseif($this->dbcon->affected_rows > 0) {
 			while ($row = $result->fetch_assoc()) {
 				$rows[] = $row; 
 			/* $rows = $result->fetch_all(MYSQLI_ASSOC);
 			 return $rows;*/
			}
			return $rows;
 		}else{
 			return "<div class='alert alert-danger'>Oops! Something went wrong, unable to fetch data, please refresh your browser or try again later.</div>";
 	}

 }


 	//method to fetch all examination for admin viewing
 	function getAllExamForAdmin(){
 		//write sql query
 		$sql = "SELECT examiners.*, examinations.*, subjects.subject_name FROM examiners JOIN examinations ON examiners.examiner_id = examinations.examiner_id LEFT JOIN subjects ON examinations.subject_id = subjects.subject_id ORDER BY exam_created_at DESC;";
 		//execute the query
 		$result = $this->dbcon->query($sql);
 		$rows = array();
 		if ($this->dbcon->error) {
 			$examination_creation_errors = 'examination_creation_errors.txt';
			$error_msg = "Unable to get all examinations because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($examination_creation_errors, $error_msg, FILE_APPEND);
			return "<div class='alert alert-danger'>Oops! Something went wrong, please refresh your browser or try again later.</div>";
 		}elseif($this->dbcon->affected_rows > 0) {
 			while ($row = $result->fetch_assoc()) {
 				$rows[] = $row; 
 			/* $rows = $result->fetch_all(MYSQLI_ASSOC);
 			 return $rows;*/
			}
			return $rows;
 		}else{
 			return "<div class='alert alert-danger'>Oops! Something went wrong, unable to fetch data, please refresh your browser or try again later wefubioubef.</div>";
 	}

 }



  	//method to fetch all examination for admin viewing
  	function getAllExamForAdminForViewResult(){
  		//write sql query
  		$sql = "SELECT examiners.*, examinations.*, subjects.subject_name FROM examiners JOIN examinations ON examiners.examiner_id = examinations.examiner_id LEFT JOIN subjects ON examinations.subject_id = subjects.subject_id WHERE NOW() >= exam_result_date ORDER BY exam_created_at DESC;";
  		//execute the query
  		$result = $this->dbcon->query($sql);
  		$rows = array();
  		if ($this->dbcon->error) {
  			$result_view_errors = 'result_view_errors.txt';
 			$error_msg = "Unable to get all examinations because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
 			file_put_contents($result_view_errors, $error_msg, FILE_APPEND);
 			return "<div class='alert alert-danger'>Oops! Something went wrong, please refresh your browser or try again later.</div>";
  		}elseif($this->dbcon->affected_rows > 0) {
  			while ($row = $result->fetch_assoc()) {
  				$rows[] = $row; 
  			/* $rows = $result->fetch_all(MYSQLI_ASSOC);
  			 return $rows;*/
 			}
 			return $rows;
  		}else{
  			return "<div class='alert alert-info'>No result has been released yet, please check back in a while.</div>";
  	}

  }


 	//method to fetch all examination created by an examiner for updating
 	function getAllExamination($examiner_id){
 		//write sql query
 		$sql = "SELECT examinations.*, subjects.subject_name FROM examinations LEFT JOIN subjects ON examinations.subject_id = subjects.subject_id WHERE examiner_id = (SELECT examiner_id FROM examiners WHERE examiner_id = '$examiner_id') AND exam_created_at = exam_updated_at ORDER BY exam_created_at DESC;";
 		//execute the query
 		$result = $this->dbcon->query($sql);
 		$rows = array();
 		if ($this->dbcon->error) {
 			$examination_creation_errors = 'examination_creation_errors.txt';
			$error_msg = "Unable to get all examinations because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($examination_creation_errors, $error_msg, FILE_APPEND);
			return "<div class='alert alert-danger'>Oops! Something went wrong, please refresh your browser or try again later.</div>";
 		}elseif($this->dbcon->affected_rows > 0) {
 			while ($row = $result->fetch_assoc()) {
 				$rows[] = $row; 
 			/* $rows = $result->fetch_all(MYSQLI_ASSOC);
 			 return $rows;*/
			}
			return $rows;
 		}else{
 			return "<div class='alert alert-info'>No saved examination currently for addition of questions, updating examination and examination preview.</div>";
 	}

 }


 	//method to fetch all examination sitted by student;
 	function getExamInfoForStudent($student_id){
 		//write sql query
 		$sql = "SELECT registered_students.*, examinations.*, subjects.subject_name FROM registered_students RIGHT JOIN examinations ON registered_students.exam_id = examinations.exam_id JOIN subjects ON examinations.subject_id = subjects.subject_id WHERE student_id = (SELECT student_id FROM students WHERE student_id = '$student_id') AND NOW() < exam_end_time ORDER BY exam_created_at DESC ;";
 		//execute the query
 		$result = $this->dbcon->query($sql);
 		$rows = array();
 		if ($this->dbcon->error) {
 			$examination_fetch_errors = 'examination_fetch_errors.txt';
			$error_msg = "Unable get all examinations by student_id with id ".$student_id." because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($examination_fetch_errors, $error_msg, FILE_APPEND);
			return "<div class='alert alert-danger'>Oops! Something went wrong, unable to fetch examinations or try again later.</div>";
 		}elseif($this->dbcon->affected_rows > 0) {
 			while ($row = $result->fetch_assoc()) {
 				$rows[] = $row; 
			}
			return $rows;
 		}else{
 			return "<div class='alert alert-info'>No examination coming up soon </div>";
 	}
 	}



 	//method to fetch all examination sitted by student;
 	function getAllExamsByStudentForResults($student_id){
 		//write sql query
 		$sql = "SELECT registered_students.*, examinations.*, subjects.subject_name FROM registered_students RIGHT JOIN examinations ON registered_students.exam_id = examinations.exam_id JOIN subjects ON examinations.subject_id = subjects.subject_id WHERE student_id = (SELECT student_id FROM students WHERE student_id = '$student_id') AND NOW() >= exam_result_date ORDER BY exam_created_at DESC ;";
 		//execute the query
 		$result = $this->dbcon->query($sql);
 		$rows = array();
 		if ($this->dbcon->error) {
 			$examination_fetch_errors = 'examination_fetch_errors.txt';
			$error_msg = "Unable get all examinations by student_id with id ".$student_id." because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($examination_fetch_errors, $error_msg, FILE_APPEND);
			return "<div class='alert alert-danger'>Oops! Something went wrong, unable to fetch examinations or try again later.</div>";
 		}elseif($this->dbcon->affected_rows > 0) {
 			while ($row = $result->fetch_assoc()) {
 				$rows[] = $row; 
			}
			return $rows;
 		}else{
 			return "<div class='alert alert-info'>No result has been released yet, please check back in a while.</div>";
 	}
 	}


	 //method for fetch all examination created by an examiner
 	function getAllExaminationForStudentRegistration($examiner_id){
 		//write sql query
 		$sql = "SELECT examinations.*, subjects.subject_name FROM examinations LEFT JOIN subjects ON examinations.subject_id = subjects.subject_id WHERE examiner_id = (SELECT examiner_id FROM examiners WHERE examiner_id = '$examiner_id') AND exam_start_time IS NOT NULL AND  exam_start_time > NOW() ORDER BY exam_created_at DESC;";
 		//execute the query
 		$result = $this->dbcon->query($sql);
 		$rows = array();
 		if ($this->dbcon->error) {
 			$examination_creation_errors = 'examination_creation_errors.txt';
			$error_msg = "Unable to get all examinations because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($examination_creation_errors, $error_msg, FILE_APPEND);
			return "<div class='alert alert-danger'>Oops! Something went wrong, please refresh your browser or try again later.</div>";
 		}elseif($this->dbcon->affected_rows > 0) {
 			while ($row = $result->fetch_assoc()) {
 				$rows[] = $row; 
			}
			return $rows;
 		}else{
 			return "<div class='alert alert-info'>No new examination for student registration</div>";
 			/*"<div class='alert alert-danger'>Please make sure you have updated examination.</div>"*/
 	}

 }


 	//method to get the list of all registered student fo an examination
 	function getAllRegisteredStudent($exam_id){
 		$sql = "SELECT students.*, registered_students.* FROM students JOIN registered_students ON students.student_id = registered_students.student_id WHERE exam_id = (SELECT exam_id FROM examinations WHERE exam_id = '$exam_id')";
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error){
 			//logging of error into a file
 			$student_registration_errors = 'student_registration_errors.txt';
			$error_msg = "Unable to get list of registered students because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($student_registration_errors, $error_msg, FILE_APPEND);
 		}elseif($result->num_rows > 0) {
 			while ($row = $result->fetch_assoc()) {
 				$rows[] = $row; 
			}
			return $rows;
 		}elseif($result->num_rows == 0){
 			return "<div class='alert alert-info'>No student registered for this examination yet.</div>";
 		}else{
 			return "<div class='alert alert-danger'>Oops! Something went wrong, unable to get all examinations, please try again later.</div>";
 		}

 	}


 	//method to start examination after reading general instruction
 	function startExamination($registration_id, $student_id, $exam_id){
 		$exam_status = 1;
 		$sql = "UPDATE registered_students SET exam_status = '$exam_status' WHERE registration_id = '$registration_id' AND student_id = '$student_id' AND exam_id = '$exam_id' ";
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error){
 			//logging of error into a file
 			$exam_start_errors = 'exam_start_errors.txt';
			$error_msg = "Student with the id ".$student_id." is unable to start exam because".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			return $error_msg;
			file_put_contents($exam_login_errors, $error_msg, FILE_APPEND);
 		}elseif($this->dbcon->affected_rows == 1){
 			return "success";
 		}else{
 			return "<div class='alert alert-info'>You can't continue with this examination because you have previously login for this examination.</div>";
 		}
 	}



 	//method to submit student Examination option
 	function studentExamOptions($studentAnswers, $student_id, $exam_id){

	foreach ($studentAnswers as $key => $value) {
	 echo $key."<br>";
	$sql = "INSERT INTO student_answer SET  exam_id = (SELECT exam_id FROM examinations WHERE exam_id = '$exam_id'), student_id=(SELECT student_id FROM students WHERE student_id = '$student_id'), question_id=(SELECT question_id FROM questions WHERE question_id = '$key'), student_answers = '$value'";

		$result = $this->dbcon->query($sql);
		}
 		if ($this->dbcon->error) {
		//logging of error into a file
		$examination_submission_errors = 'examination_submission_errors.txt';
		$error_msg = "Student with the student id ".$student_id." is unable to submit examination because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($examination_submission_errors, $error_msg, FILE_APPEND);
		}else{
			$sql2 = "SELECT student_answers FROM student_answer WHERE exam_id = (SELECT exam_id FROM examinations WHERE exam_id = '$exam_id') AND student_id = (SELECT student_id FROM students WHERE student_id = '$student_id') ";
			$sql3 = "SELECT question FROM questions WHERE exam_id = (SELECT exam_id FROM examinations WHERE exam_id = '$exam_id') ";
			$result2 = $this->dbcon->query($sql2);
			$result3 = $this->dbcon->query($sql3);
			if ($this->dbcon->error) {
			//logging of error into a file
			$examination_submission_errors = 'examination_submission_errors.txt';
			$error_msg = "Unable to get total or attempted questions is because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($examination_submission_errors, $error_msg, FILE_APPEND);}


			/*aQ = attemptedQuestions
			tQ = totalQuestions */

			$aQ = $result2->num_rows;
			$tQ = $result3->num_rows;

			$success = "Examination successfully submitted";
			header("Location: examflow_examlogout.php?msg=$success&aQ=$aQ&tQ=$tQ");
			exit;
		}
 		
 	}


 	//method to view result of an examination by student
 	function studentViewResult($student_id, $exam_id){
 		//write sql query
 		$sql = "SELECT options.*, questions.*, student_answer.* FROM options LEFT JOIN questions ON options.question_id = questions.question_id JOIN student_answer ON questions.question_id = student_answer.question_id WHERE student_id = (SELECT student_id FROM students WHERE student_id = '$student_id') AND questions.exam_id = (SELECT exam_id FROM examinations WHERE exam_id = '$exam_id')";
 		//execute the query
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error) {
		//logging of error into a file
		$result_view_errors = 'result_view_errors.txt';
		$error_msg = "Student with id ".$student_id." is unable to view result because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($result_view_errors, $error_msg, FILE_APPEND);
		}elseif($result->num_rows > 0){
 			while ($row = $result->fetch_assoc()) {
 				$rows[] = $row; 
			}
			return $rows;
 		}else{
 			return "<div class='alert alert-info'>Result is not available, please checkback in while</div>";
 		}
 	}


 	//method to get total mark of an examination
 	function getExamTotalMark($exam_id){
 		//write sql query
 		$sql="SELECT SUM(question_mark) AS totalMark FROM questions WHERE exam_id = (SELECT exam_id FROM examinations WHERE exam_id = '$exam_id')";
 		//execute the query
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error) {
		//logging of error into a file
		$exam_score_errors = 'result_view_errors.txt';
		$error_msg = "Unable to fetch total mark of examination with id ".$exam_id." because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($exam_score_errors, $error_msg, FILE_APPEND);
		}elseif($result->num_rows > 0){
 			while ($row = $result->fetch_assoc()) {
 				$rows[] = $row; 
			}
			return $rows;
 		}
 	}


	//method for fetch all examination created by an examiner
 	function getAllExamsByExaminerForResults($examiner_id){
 		//write sql query
 		$sql = "SELECT examinations.*, subjects.subject_name FROM examinations LEFT JOIN subjects ON examinations.subject_id = subjects.subject_id WHERE examiner_id = (SELECT examiner_id FROM examiners WHERE examiner_id = '$examiner_id') AND NOW() >= exam_result_date ORDER BY exam_created_at DESC;";
 		//execute the query
 		$result = $this->dbcon->query($sql);
 		$rows = array();
 		if ($this->dbcon->error) {
 			$examination_creation_errors = 'examination_creation_errors.txt';
			$error_msg = "Unable to get all examinations because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
			file_put_contents($examination_creation_errors, $error_msg, FILE_APPEND);
			return "<div class='alert alert-danger'>Oops! Something went wrong, please refresh your browser or try again later.</div>";
 		}elseif($this->dbcon->affected_rows > 0) {
 			while ($row = $result->fetch_assoc()) {
 				$rows[] = $row; 
			}
			return $rows;
 		}else{
 			return "<div class='alert alert-info'>Result is not available, please checkback in while</div>";
 			
 	}

 }


 	//method to get total number of registered student for an examination
 	function totalRegisteredStudent($exam_id){
 		//write sql
 		$sql = "SELECT COUNT(registration_id) AS registeredStudents FROM registered_students WHERE exam_id = (SELECT exam_id FROM examinations WHERE exam_id = '$exam_id')";
 		$rows = array();
 		//execute $sql;
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error){
 			//logging of error into a file
 			$count_registered_student_errors = 'count_registered_student_errors.txt';
			$error_msg = "Unable to fetch total number of registered student of examination with id ".$exam_id." because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($count_registered_student_errors, $error_msg, FILE_APPEND);
 		}elseif($result->num_rows > 0){
 			while ($row = $result->fetch_assoc()) {
 				$rows[] = $row; 
			}
			return $rows;
 		}
 	}


 	//method to get total number of questions for an examination
 	function totalNumberOfQuestion($exam_id){
 		//write sql
 		$sql = "SELECT COUNT(question) AS noOfQuestions FROM questions WHERE exam_id = (SELECT exam_id FROM examinations WHERE exam_id = '$exam_id')";
 		$rows = array();
 		//execute $sql;
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error){
 			//logging of error into a file
 			$count_questions_errors = 'count_questions_errors.txt';
			$error_msg = "Unable to fetch total number of questions for examination with id ".$exam_id." because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($count_questions_errors, $error_msg, FILE_APPEND);
 		}elseif($result->num_rows > 0){
 			while ($row = $result->fetch_assoc()) {
 				$rows[] = $row; 
			}
			return $rows;
 		}
 	}


 	//method to get student passcode for an examination
 	function getStudentPasscode($student_id, $exam_id){
 		//wriet sql
 		$sql = "SELECT student_exam_passcode, registration_id FROM registered_students WHERE student_id = (SELECT student_id FROM students WHERE student_id = '$student_id') AND exam_id = (SELECT exam_id FROM examinations WHERE exam_id = '$exam_id')";
 		$rows = array();
 		//execute $sql;
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error){
 			//logging of error into a file
 			$get_passcode_errors = 'get_passcode_errors.txt';
			$error_msg = "Unable to go the passcode of student with id of ".$student_id." in exam with id".$exam_id." because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($get_passcode_errors, $error_msg, FILE_APPEND);
 		}elseif($result->num_rows > 0){
 			while ($row = $result->fetch_assoc()) {
 				$rows[] = $row; 
			}
			return $rows;
 		}
 	}


 	//method to mark student examination
 	function examinerViewResult($exam_id){
 		//write sql
 		$sql = "SELECT students.*, registered_students.*  FROM students JOIN registered_students ON students.student_id = registered_students.student_id WHERE registered_students.exam_id = (SELECT exam_id FROM examinations WHERE exam_id = '$exam_id') ORDER BY  student_lname";
 		$rows = array();
 		//execute $sql;
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error){
 			//logging of error into a file
 			$result_view_errors = 'result_view_errors.txt';
			$error_msg = "Examiner unable to view result of examination  with id ".$exam_id." because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($result_view_errors, $error_msg, FILE_APPEND);
 		}elseif($result->num_rows > 0){
 			while ($row = $result->fetch_assoc()) {
 				$rows[] = $row; 
			}
			return $rows;
 		}
 	
 	}
 	

 	//method to delete an examination
 	function deleteExamination($exam_id){
 		//write sql
 		$sql = "DELETE FROM examinations WHERE exam_id = '$exam_id'";
 		//execute $sql;
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error){
 			//logging of error into a file
 			$exam_delete_errors = 'exam_delete_errors.txt';
			$error_msg = "Examiner unable to delete an examination  with id ".$exam_id." because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($exam_delete_errors, $error_msg, FILE_APPEND);
 		}elseif($this->dbcon->affected_rows == 1){
 			return "Examination successfully deleted";
 		}elseif($this->dbcon->affected_rows == 0){
 			return "Oop! Something went wrong unable to delete examination";
 		}
 		}

	//method to count all examinations for admin dashboard
	function adminCountTotalExams(){
		//write sql
		$sql = "SELECT COUNT(exam_id) AS totalExams FROM examinations";
		//execute $sql;
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error){
 			//logging of error into a file
 			$exam_count_errors = 'exam_count_errors.txt';
			$error_msg = "Unable to count all examination for admin dashboard display because ".$exam_id." because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($exam_count_errors, $error_msg, FILE_APPEND);
 	}elseif($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}
	}

	//method to count all students for admin dashboard
	function adminCountTotalStudents(){
		//write sql
		$sql = "SELECT COUNT(student_id) AS totalStudents FROM students";
		//execute $sql;
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error){
 			//logging of error into a file
 			$student_count_errors = 'student_count_errors.txt';
			$error_msg = "Unable to count all student for admin dashboard display because ".$exam_id." because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($student_count_errors, $error_msg, FILE_APPEND);
 	}elseif($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}
	}

	//method to count all questions for admin dashboard
	function adminCountTotalQuestions(){
		//write sql
		$sql = "SELECT COUNT(question_id) AS totalQuestions FROM questions";
		//execute $sql;
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error){
 			//logging of error into a file
 			$question_count_errors = 'question_count_errors.txt';
			$error_msg = "Unable to count all questions for admin dashboard display because ".$exam_id." because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($question_count_errors, $error_msg, FILE_APPEND);
 	}elseif($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}
	}


	//method to count all examinations for student dashboard
	function studentCountTotalExams($student_id){
		//write sql
		$sql = "SELECT COUNT(exam_id) AS studentTotalExams FROM registered_students WHERE student_id = (SELECT student_id FROM students WHERE student_id = '$student_id')";
		//execute $sql;
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error){
 			//logging of error into a file
 			$exam_count_errors = 'exam_count_errors.txt';
			$error_msg = "Unable to count all examination for student with id ".$student_id." to display on dashboard because ".$exam_id." because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($exam_count_errors, $error_msg, FILE_APPEND);
 	}elseif($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}
	}


	//method to count all results for student dashboard
	function studentCountTotalResult($student_id){
		//write sql
		$sql = "SELECT COUNT(registered_students.exam_id) AS studentTotalResult, examinations.* FROM registered_students JOIN examinations ON registered_students.exam_id = examinations.exam_id WHERE student_id = (SELECT student_id FROM students WHERE student_id = '$student_id') /*AND NOW() >= exam_result_date*/";
		//execute $sql;
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error){
 			//logging of error into a file
 			$result_count_errors = 'result_count_errors.txt';
			$error_msg = "Unable to count all result for student with id ".$student_id." to display on dashboard because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($result_count_errors, $error_msg, FILE_APPEND);
 	}elseif($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}
	}



	//method to count all results for student dashboard
	function studentCountTotalQuestion($student_id){
		//write sql
		$sql = "SELECT COUNT(question_id) AS studentTotalQuestions FROM student_answer WHERE student_id = (SELECT student_id FROM students WHERE student_id = '$student_id')";
		//execute $sql;
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error){
 			//logging of error into a file
 			$question_count_errors = 'question_count_errors.txt';
			$error_msg = "Unable to count all attempted questions for student with id ".$student_id." to display on dashboard because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($question_count_errors, $error_msg, FILE_APPEND);
 	}elseif($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}
	}


	//method to count all examination for examiners dashboard
	function examinerCountTotalExams($examiner_id){
		//write sql
		$sql = "SELECT COUNT(exam_id) AS examinerTotalExams FROM examinations WHERE examiner_id = (SELECT examiner_id FROM examiners WHERE examiner_id = '$examiner_id')";
		//execute $sql;
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error){
 			//logging of error into a file
 			$exam_count_errors = 'exam_count_errors.txt';
			$error_msg = "Unable to count all examinations by examiner with id ".$examiner_id." to display on dashboard because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($exam_count_errors, $error_msg, FILE_APPEND);
 	}elseif($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}
	}


	//method to count all examination for examiners dashboard
	function examinerCountTotalResult($examiner_id){
		//write sql
		$sql = "SELECT COUNT(exam_id) AS examinerTotalResults FROM examinations WHERE examiner_id = '$examiner_id' /*AND NOW() >= exam_result_date*/ ";
		//execute $sql;
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error){
 			//logging of error into a file
 			$result_count_errors = 'result_count_errors.txt';
			$error_msg = "Unable to count all examination result by examiner with id ".$examiner_id." to display on dashboard because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($result_count_errors, $error_msg, FILE_APPEND);
 	}elseif($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}
	}


	//method to count all examination for examiners dashboard
	function examinerCountTotalQuestions($examiner_id){
		//write sql
		$sql = "SELECT COUNT(question) AS examinerTotalQuestions, examinations.* FROM questions JOIN examinations   ON questions.exam_id = examinations.exam_id WHERE examiner_id = '$examiner_id' ";
		//execute $sql;
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error){
 			//logging of error into a file
 			$question_count_errors = 'question_count_errors.txt';
			$error_msg = "Unable to count all examinations by examiner with id ".$examiner_id." to display on dashboard because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($exam_count_errors, $error_msg, FILE_APPEND);
 	}elseif($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}
	}



	//method to get examination duration
	function getExaminationDuration($exam_id){
		//write sql query
		$sql = "SELECT exam_duration FROM examinations WHERE exam_id = '$exam_id'";
		//execute sql query
		$result = $this->dbcon->query($sql);

		if ($this->dbcon->error){
 			//logging of error into a file
 			$exam_duration_errors = 'exam_duration_errors.txt';
			$error_msg = "Unable to get examination duration by with exam id ".$examiner_id." because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($exam_duration_errors, $error_msg, FILE_APPEND);
	 	}elseif($result->num_rows == 1) {
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}
	}



   //Begin Sanitize input
	public function sanitizeInputs($data){
		$data = trim($data);
		$data = addslashes($data);
		$data = htmlspecialchars($data);

		return $data; 
	}	
	//End Sanitize input
}
 # End Examination class definition



 
 # Begin Subject class definition
 class Subjects{

 	//member variable
 	public $dbcon;
 	public $subject_id;


 	function __construct(){
 	//connect to database
 	$this->dbcon = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASENAME);
	if ($this->dbcon->connect_error) {
		//logging of error into a file
		$connection_errors = 'connection_errors.txt';
		$error_msg = "Connection Error of class Subjects ".$this->dbcon->connect_error."\n";
		file_put_contents($connection_errors, $error_msg, FILE_APPEND);
		die("Connection Failure: the reason for is ".$this->dbcon->connect_error);
		}
 	}


 	//method to add new subject by Admin
 	function addNewSubject($subject_name){
 	//inserting subject into database 
	$sql = "INSERT INTO subjects SET subject_name = '$subject_name'";
	//execute query
	$result = $this->dbcon->query($sql);

	if ($this->dbcon->error) {
		//logging of error into a file
		$subject_errors = 'subject_errors.txt';
		$error_msg = "Unable create subject ".$subject_name." because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($subject_errors, $error_msg, FILE_APPEND);
		return "<div class='alert alert-danger'> Error: ".$this->dbcon->error."</div>";
	}elseif($this->dbcon->affected_rows > 0) {
		return "<div class='alert alert-success'>$subject_name successfully registered</div>";
	}else{
		return "<div class='alert alert-info'>Oops! Unable to add new subject. Please try again later</div>";
	}

 	}


	//method to get the subject Id
	function getSubjects(){
	//write the query
	$sql = "SELECT * FROM subjects";
	//execute the query
	$result = $this->dbcon->query($sql);
		$rows = array();
	if( $this->dbcon->error) {
		//logging of error into a file
		$subject_errors = 'subject_errors.txt';
		$error_msg = "Unable get Subject Id ".$subject_name." because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($subject_errors, $error_msg, FILE_APPEND);
		//return "<div alert alert-danger> Error: ".$this->dbcon->error."</div>";
	}elseif($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}else{
		return "<div class='alert alert-info'>Subject not available will be created in a while</div>";
		
	}
	}


	//method to get all subjects
	function getAllSubjects(){
		//write sql query
		$sql = "SELECT * FROM subjects ORDER BY subject_name";
		//return $sql;
		//execute sql query
		$result = $this->dbcon->query($sql);

		if ($this->dbcon->error) {
		$subject_errors = 'subject_errors.txt';
		$error_msg = "Unable get Subject all subjects because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($subject_errors, $error_msg, FILE_APPEND);
		return "<div alert alert-danger> Error: ".$this->dbcon->error."</div>";
		}elseif($result->num_rows > 0){
			return $result->fetch_all(MYSQLI_ASSOC);
		}else{

		}
	}


	//method to delete subject
	function deleteSubject($subject_id){

	}


	//Begin Sanitize input
	public function sanitizeInputs($data){
		$data = trim($data);
		$data = addslashes($data);
		$data = htmlspecialchars($data);

		return $data; 
	}	
	//End Sanitize input
 }
 # End Subject class definition



# Begin Question class definition
 class Questions{
 	public $dbcon;

 	function __construct(){
 	//connect to database
 	$this->dbcon = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASENAME);
	if ($this->dbcon->connect_error) {
		//logging of error into a file
		$connection_errors = 'connection_errors.txt';
		$error_msg = "Connection Error of class Questions ".$this->dbcon->connect_error."\n";
		file_put_contents($connection_errors, $error_msg, FILE_APPEND);
		die("Connection Failure: the reason for is ".$this->dbcon->connect_error);
	}
 	}


 	//Begin Sanitize input
	public function sanitizeInputs($data){
		$data = trim($data);
		$data = addslashes($data);
		$data = htmlspecialchars($data);

		return $data; 
	}	
	//End Sanitize input


 	//method to insert options
 	public function insertOptions($question_id, $option_name, $option_value, $option_correct){
 		//write sql query
 		$sql = "INSERT INTO options SET question_id = (SELECT question_id FROM questions WHERE question_id = '$question_id' ), option_name = '$option_name', option_value = '$option_value', option_correct = '$option_correct'";
 		//execute the query
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error) {
		//logging of error into a file
		$question_errors = 'option_errors.txt';
		$error_msg = "Unable to insert option because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($question_errors, $error_msg, FILE_APPEND);
		return "<div alert alert-danger> Error: ".$this->dbcon->error."</div>";
		}elseif($this->dbcon->affected_rows > 0){
			$message[] = "<div class='alert alert-success'>Option has been successfully added</div>";
		}else{
			$message_error[] =  "<div class='alert alert-danger'>Oops! Something went wrong, please try again later</div>";
			return $message_error;
			exit;
		}
 	}


 	//method to insert question to database
 	function insertQuestion($question, $question_mark, $question_type_name, $exam_id, $instruction, $option_name, $option_correct){
 		//write sql query
 		$sql= "INSERT INTO questions SET question = '$question', question_mark = '$question_mark', question_type = (SELECT question_type_id FROM question_type WHERE question_type_name = '$question_type_name'), exam_id = (SELECT exam_id FROM examinations WHERE exam_id = '$exam_id'), instruction = '$instruction'";
 		//execute the query
 		$result = $this->dbcon->query($sql);
 		$message = array();
 		if ($this->dbcon->error) {
		$question_errors = 'question_errors.txt';
		$error_msg = "Unable insert question because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($question_errors, $error_msg, FILE_APPEND);
		return "<div alert alert-danger> Error: ".$this->dbcon->error."</div>";
		}elseif($this->dbcon->affected_rows > 0) {
			$question_id = $this->dbcon->insert_id; 
		/*return "<div class='alert alert-success'>Question successfully added</div>";*/
			if ($question_type_name == 'Multichoice Question' || $question_type_name == 'Objective Question') {
				//looping the option of with radio button to insert database
				foreach ($option_name as $key => $value) {
					/*echo "<pre>";
					var_dump($option_name);
					echo "</pre>";*/

					if ($key == $option_correct) {
						$correct = 1;
					}else{
						$correct = 0;
					}

					//sanitize the input $value
					$value = $this->sanitizeInputs($value);
				//calling the function to insert into option table
				 $this->insertOptions($question_id, $key, $value, $correct);
				}
			}elseif($question_type_name == 'Fill in the blank'){
			 	$option_value = $option_name;
				$this->insertOptions($question_id, $option_name, $option_value, $option_correct);
			}else{
				return "<div class='alert alert-success'>Question successfully added, Please take note, theory questions will be manually marked by the examiner.</div>";
			}
			$message[] = "<div class='alert alert-success'>Question has been successfully added</div>";
			return $message;
		}else{
			return "<div class='alert alert-info'>Oops! Unable to save question. Please try again later.</div>";
		}
 }



 	//method to fetch and display all question
 	function displayAllQuestions($exam_id){
 		//write sql query
 		$sql = "SELECT questions.*, question_type.*  FROM questions JOIN question_type ON questions.question_type = question_type.question_type_id WHERE exam_id = '$exam_id'";
 		//execute the query
 		$result = $this->dbcon->query($sql);
 		if ($this->dbcon->error) {
		$question_errors = 'question_erroSrs.txt';
		$error_msg = "Unable fetch all questions because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($question_errors, $error_msg, FILE_APPEND);
		return $this->dbcon->error;
		}elseif($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
      }else{
 			return "<div class='alert alert-danger'>Oops! Something went wrong, unable to display questions, please wait for while and try again later.</div>";
 	}

  }


  //method to get question options
  public function getOptions($question_id){
  	$sql = "SELECT * FROM options WHERE question_id = '$question_id'";
  	$result = $this->dbcon->query($sql);
  	if ($this->dbcon->error) {
		//logging of error into a file
		$question_errors = 'option_errors.txt';
		$error_msg = "Unable to select option because ".$this->dbcon->error." on ".date('l F Y h:i:s A')."."."\n";
		file_put_contents($question_errors, $error_msg, FILE_APPEND);
		return "<div alert alert-danger> Error: ".$this->dbcon->error."</div>";
		}elseif($this->dbcon->affected_rows > 0){
			while ($row = $result->fetch_assoc()) {
				$rows[] = $row;
		}
		return $rows;
		}else{
			return "<div class='alert alert-danger'>Oops! Unable to fetch option.</div>";
		}
  }
}
# End Question class definition



# Begin ****** class definition
class Sanitize{

	//Begin Sanitize input
	public function sanitizeInputs($data){
		$data = trim($data);
		$data = addslashes($data);
		$data = htmlspecialchars($data);

		return $data; 
	}	

	//End Sanitize input
}
# End ****** class definition

# Begin ****** class definition
# End ****** class definition
?>
