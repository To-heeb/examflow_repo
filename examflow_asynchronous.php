<?php
include_once 'examflow_classes.php';


#Begin creating a new exam by the examiner
if (isset($_POST['saveExam'])) {
	
	if (empty($_POST['examTitle'])) {
		 $message1 = "<div class='alert alert-danger'>Exam title field is required</div>";
		$errors[] = $message1;
	}
	if (empty($_POST['examCode'])) {
		$message2 = "<div class='alert alert-danger'>Exam Code field is required</div>";
		$errors[] = $message2;
	}
	if (empty($_POST['examSubject'])) {
		$message3 = "<div class='alert alert-danger'>Exam Subject field is required</div>";
		$errors[] = $message3;
	}

	if (isset($errors)) {
		
		foreach ($errors as $key => $value) {
			echo $value;
		}
	}

	if (empty($errors)) {

		$exam_code = strtoupper($_POST['examCode']);
		$exam_title = ucwords(strtolower(trim($_POST['examTitle'])),' ');
		$examiner_id = $_POST['examinerId'];
		$exam_subject = $_POST['examSubject'];


		
		//Instantiating object of class Examination for createNewExamination method
		$objectCreateExamination = new Examination();

		$output = $objectCreateExamination->createNewExamination($exam_code, $exam_title, $examiner_id, $exam_subject);

		echo $output; 
	}

}
#End creating a new exam by the examiner


#Begin creating of new subject by admin
if (isset($_POST['subjectBtn'])) {

	if (empty($_POST['subject'])) {
		echo "<div class='alert alert-danger'>Field must not be empty to add a new subject</div>";
	}else{
	 $subject_name = ucwords(strtolower(trim($_POST['subject'])), ' ');

	 	//Instantiating object of class Subject for createNewSubject method
		$objectAddSubject = new Subjects();
		$output = $objectAddSubject->addNewSubject($subject_name);

		echo $output;
	}
}
#End creating a new subject by the by admin


#Begin Fetching all the subject to a table
if (isset($_POST['getSubjects'])) {
	//Instantiating object of class Subject for createNewSubject method
	$objectGetSubject = new Subjects();
	$output = $objectGetSubject->getAllSubjects();

	$getSubjects = '';
	if (is_array($output)) {
		$getSubjects .= "<table class='table table-hover table-striped table-light table-bordered'><thead class='bg-secondary text-light'><tr><th>S/N</th><th>Registered Examination Subject</th><th>Registration Date</th></tr></thead><tbody>";
		 foreach($output as $key => $value) {
		$getSubjects .= "<tr><td>".++$key."</td><td>".$value['subject_name']."</td><td>".$value['subject_created_at']."</td>";
		$getSubjects .= "</tr>";
				}
		$getSubjects .= "</tbody></table>";
		echo $getSubjects;
	}else{
		echo $output;
	}
}
#End Fetching all the subject to a table


	
#Begin searching for subject
if (isset($_POST['subjectSearch'])) {
	$subject_name = $_POST['subjectSearch'];
	//Istantiating object of class Subject for createNewSubject method
	$objectGetSubject = new Subjects();
	$output = $objectGetSubject->getSubjects();

	if (is_array($output)) {
			$subjects = '';
		foreach ($output as $key => $value) {
			$subjects .= "<option value = '".$value['subject_name']."'>";
			$subjects .= $value['subject_name']."</option>";
		}
			echo $subjects;
		}else{
			echo $output;
		}

		

}
#End searching for subject



#Begin fetching of all exams by examiner for update
if (isset($_POST['outputExam'])) {
	$examinerId = $_POST['examinerId'];
	//Istantiating object of class Examinations for getAllExamination method
	$objectGetSubject = new Examination();
	$output = $objectGetSubject->getAllExamination($examinerId);
	
	$examination = '';
	if (is_array($output)) {
		$examination .= "<table class='table table-hover table-striped table-light table-bordered'><thead class='bg-secondary text-light'><tr><th>S/N</th><th>Examination code</th><th>Examination Title</th><th>Examination Subject</th><th>Action</th></tr></thead><tbody>";
		 foreach($output as $key => $value) {
		$examination .= "<tr><td>".++$key."</td><td>".$value['exam_code']."</td><td>".$value['exam_title']."</td><td>".$value['subject_name']."</td><td>";
		$examination .= "<a href='examflow_addquestion.php?";
		$examination .= "exam_id=".$value['exam_id'];
		$examination .= "' class='btn btn-primary btn-sm mt-1' id='addQuestion'>Add Questions</a>&nbsp;<a href='examflow_preview_exam.php?";
		$examination .= "exam_title=".$value['exam_title']."&exam_id=".$value['exam_id'];
		$examination .= "' class='btn btn-dark btn-sm mt-1' id='previewExamination'>Preview Exam</a>&nbsp;";
		$examination .= "<a href='examflow_update_exam.php?";
		$examination .=  "exam_title=".$value['exam_title']."&exam_code=".$value['exam_code']."&exam_subject=".$value['subject_name']."&exam_id=".$value['exam_id'];
		$examination .= "'";
		$examination .= " class='btn btn-info btn-sm  mt-1' id='updateExamination'>Update</a>";
		$examination .= "&nbsp;<a class='btn btn-danger btn-sm mt-1' id='deleteExamination' data-id='".$value['exam_id']."'>Delete</a></td></tr>";
				}
		$examination .= "</tbody></table>";
		echo $examination;
	}else{
		echo $output;
	}
}
#End fetching of all exams by examiner for update



#Begin Deleting an exams by examiner.
if (isset($_POST['deleteExamination'])) {
	$exam_id = $_POST['exam_id'];
//Instantiating object of class Examinations for getAllExamination method
	$objdeleteExamination = new Examination;
	$output = $objdeleteExamination->deleteExamination($exam_id);

	echo $output;
}
#End Deleting an exams by examiner.





#Begin fetching of all exams by examiner for update
if (isset($_POST['allExams'])) {
	$examinerId = $_POST['examinerId'];
	//Instantiating object of class Examinations for getAllExamination method
	$objectGetSubject = new Examination();
	$output = $objectGetSubject->getAllExaminationsByExaminer($examinerId);
	
	$allExaminations = '';
	if (is_array($output)) {
		$allExaminations .= "<table class='table table-hover table-striped table-light table-bordered'><thead class='bg-secondary text-light'><tr><th>S/N</th><th>Examination code</th><th>Examination Title</th><th>Examination Subject</th><th>Start Time</th><th>End Time</th><th>Action</th></tr></thead><tbody>";
		 foreach($output as $key => $value) {
		$allExaminations .= "<tr><td>".++$key."</td><td>".$value['exam_code']."</td><td>".$value['exam_title']."</td><td>".$value['subject_name']."</td>";
		$allExaminations .= "<td>".$value['exam_start_time']."</td><td>".$value['exam_end_time']."</td><td><a href='#' data-id='".$value['exam_id']."' class='btn btn-dark btn-sm' id='viewMoreDetails' data-toggle='modal' data-target='#viewMoreDetailsModal'>More Details</a></td></tr>";
				}
		$allExaminations .= "</tbody></table>";
		echo $allExaminations;
	}else{
		echo $output;
	}
}
#End fetching of all exams by examiner for update



#Begin fetching of all exams for student registration
if (isset($_POST['registerStudentTable'])) {
	$examinerId = $_POST['examinerId'];
	//Instantiating object of class Examinations for getAllExamination method
	$objectGetSubject = new Examination();
	$output = $objectGetSubject->getAllExaminationForStudentRegistration($examinerId);
	
	$examination = '';
	if (is_array($output)) {
		$examination .= "<table class='table table-hover table-striped table-light table-bordered'><thead class='bg-secondary text-light'><tr><th>S/N</th><th>Examination code</th><th>Examination Title</th><th>Examination Subject</th><th>Action</th></tr></thead><tbody>";
		 foreach($output as $key => $value) {
		$examination .= "<tr><td>".++$key."</td><td data-id='exam_code'>".$value['exam_code']."</td><td>".$value['exam_title']."</td><td>".$value['subject_name']."</td><td>";
		$examination .= "<a href='#'";
		$examination .="data-id='".$value['exam_id']."' data-title='".$value['exam_title']."' data-code='".$value['exam_code']."' data-subject='exam_subject=".$value['subject_name'];
		$examination .="' class='btn btn-primary btn-sm' id='getRegistrationForm".$value['exam_id'];
		$examination .= "'>Register Student</a>&nbsp;<a href='#' class='btn btn-warning btn-sm' data-id='";
		$examination .= $value['exam_id'];
		$examination .="' data-toggle='modal' data-target='#listRegisteredStudentsModal' id='listRegisteredStudentsBtn'>List students</a></td></tr>";
				}
		$examination .= "</tbody></table>";
		echo $examination;
	}else{
		echo $output;
	}
}
#End fetching of all exams for student registration.


# Begin student registration
if (isset($_POST['getRegistrationForm'])) {
	$exam_code = $_POST['exam_code'];
	$exam_id = $_POST['exam_id'];
	$exam_title = $_POST['exam_title'];

	$getStudentRegistered = '';
	$getStudentRegistered .= "<form method='post' name='registerStudent' id='studentRegistrationForm'><div class='row form-group'><div class='col'><label>Exam title / header</label><input type='text' name='examTitle'";
	$getStudentRegistered .= "value='".$exam_title; 
	$getStudentRegistered .= "' class='form-control' placeholder='Human Anatomy' value='' disabled></div><div class='col'><label>Exam code</label><input type='text' name='examCode'"; 
	$getStudentRegistered .= "value='".$exam_code;
	$getStudentRegistered .= "' class='form-control' placeholder='ANA208' disabled></div></div>";

	$getStudentRegistered .= "<div class='row form-group'><div class='col'><label>Student email</label><input type='text' name='studentEmail' class='form-control' placeholder='Danladibako@gmail.com' id='studentEmail'></div><div class='col'><label>Student name</label><input type='text' name='studentName' class='form-control' placeholder='Danladi Bako' id='studentName'></div></div><div class='row form-group'><input type='button' id='registerStudent' class='ml-3 btn btn-info btn-sm' value='Register'><input type='hidden' name='exam_id'";
	$getStudentRegistered .= "value='".$exam_id;
	$getStudentRegistered .= "'><input type='hidden' name='exam_title'";
	$getStudentRegistered .= "value='".$exam_title;
	$getStudentRegistered .="'><input type='hidden' name='registerStudentForm'></div><div id='registrationOutput'></div></form><input type='hidden' name='getStudentName'>";

echo $getStudentRegistered;
}
# End student registration form



# Begin fetch student name when registering student
if (isset($_POST['getStudentName'])) {
	
	$student_email = $_POST['studentEmail'];

	//Instantiating object of class Examination for 
	$objectgetStudentNam = new Examination();

	$output = $objectgetStudentNam->getStudentName($student_email);

	if (is_array($output)) {
		foreach ($output as $key => $value) {

			echo $value[0];
		}
		}else{
			echo $output;
		}
	}
# End to fetch student name when registering email


# Begin registration of student to database
if (isset($_POST['registerStudentForm'])) {

	//Validate the form
	if (empty($_POST['studentEmail']) || empty($_POST['studentName'])) {
		echo "<div class='alert alert-danger'>Both fields are required for registration</div>";
	}else{
		$studentEmail = $_POST['studentEmail'];
		$studentName = $_POST['studentName'];
		$exam_title = $_POST['exam_title'];
		$exam_id = $_POST['exam_id'];
		//Instantiating object of class Examination for 
		$object = new Examination;
		$output = $object->registerStudent($studentEmail, $studentName, $exam_id, $exam_title);
		echo $output;
	}
}
# End registration of student to database


# Begin list of registered student
if (isset($_POST['listStudents'])) {
	$exam_id = $_POST['exam_id'];
	//Instantiating object of class Examinations for getAllExamination method
	$objectListOfRegisteredStudents = new Examination();
	$output = $objectListOfRegisteredStudents->getAllRegisteredStudent($exam_id);
	/*echo "<pre>";
	var_dump($output);
	echo "</pre>";*/

	$listStudents = '';
	if (is_array($output)) {
		$listStudents .= "<table class='table table-hover table-striped table-light table-bordered'><thead class='bg-secondary text-light'><tr><th>S/N</th><th>Student Name</th><th>Registration Date</th><th>Action</th></tr></thead><tbody>";
		 foreach($output as $key => $value) {
		$listStudents .= "<tr><td>".++$key."</td><td>".$value['student_lname']." ".$value['student_fname']."</td><td>".$value['registered_at']."</td><td>";
		$listStudents .= "<a href='#' class='btn btn-danger btn-sm' data-id='";
		$listStudents .= $value['exam_id'];
		$listStudents .="' data-toggle='modal' id='listRegisteredStudentsBtn'>Delete Student</a></td></tr>";
				}
		$listStudents .= "</tbody></table>";
		echo $listStudents;
	}else{
		echo $output;
	}
}
# End list of registered student



# Begin Adding new question to database
if (isset($_POST['addQuestion'])) {
	/*echo "<pre>";
	var_dump($_POST);
	echo "</pre>";*/
	if ($_POST['questionType'] == 'Objective Question' ) {

		//Validation for Objective Question Form
		if (empty($_POST['instruction']) || empty($_POST['question'])) {
		   $message1 = "<div class='alert alert-danger'>Instruction and Question fields are required for a new question to be saved</div>";
		  $errorObj[] = $message1;
		}
		
		foreach ($_POST["objOption"] as $key => $value) {
			if (empty($value)){			
			 $message = "<div class='alert alert-danger'>All Option fields are required</div>";
			  $errorObj[] = $message;
			}
		}

		if (empty($_POST['questionMarkObj'])) {
				$message6 = "<div class='alert alert-danger'>Please assign a mark to the question</div>";
		  $errorObj[] = $message6;
		}
		
		if (!isset($_POST['radioOptionObj'])) {
			$radioOptionError = "<div class='alert alert-danger'>Please select the correct option with the radio button</div>";
		  $errorObj[] = $radioOptionError;
		}

		if (isset($errorObj)) {
			foreach ($errorObj as $key => $value){ 
				echo $value; }
		}

		if (empty($errorObj)) {

			//Istantiating object of class Questions for insertQuestion method
			$qstObj = new Questions;

			$question = $qstObj->sanitizeInputs($_POST['question']);
			$question_mark = $_POST["questionMarkObj"];
			$question_type_name = $_POST["questionType"];
			$exam_id = $_POST["exam_id"];
			$instruction = $qstObj->sanitizeInputs($_POST["instruction"]);
			$option_name = $_POST["objOption"];
			$option_correct = $_POST['radioOptionObj'];

			// calling a function of class class Questions
			$output = $qstObj->insertQuestion($question, $question_mark, $question_type_name, $exam_id, $instruction, $option_name, $option_correct);

			if (is_array($output)) {
				foreach ($output as $key => $value) {
					echo $value;
				}
			}else{
				echo $output;
			}
		}

	}elseif($_POST['questionType'] == 'Multichoice Question') {
		
		//Validation for Multichoice  Question Form
		if (empty($_POST['instruction']) || empty($_POST['question'])) {
		   $message1 = "<div class='alert alert-danger'>Instruction and Question fields are required for a new question to be saved</div>";
		  $errorMcq[] = $message1;
		}
		
		foreach ($_POST["mcqOption"] as $key => $value) {
			if (empty($value)){			
			 $message = "<div class='alert alert-danger'>All Option fields are required</div>";
			  $errorMcq[] = $message;
			}
		}

		if (empty($_POST['questionMarkMcq'])) {
				$message3 = "<div class='alert alert-danger'>Please assign a positive mark to the question</div>";
				$errorMcq[] = $message3;
		}
		if (empty($_POST['negativeQuestionMark'])) {
			$message4 = "<div class='alert alert-danger'>Please assign a negative mark to the question</div>";
		}
		
		if (!isset($_POST['radioOptionMcq'])) {
			$radioOptionError = "<div class='alert alert-danger'>Please select the correct option from the radio button</div>";
			$errorMcq[] = $radioOptionError;
		}

		if (isset($errorMcq)) {
			foreach ($errorMcq as $key => $value) 
				echo $value;
		}

		if (empty($errorMcq)) {
			//Istantiating object of class Questions for insertQuestion method
			$qstMcq = new Questions;

			$question = $qstMcq->sanitizeInputs($_POST['question']);
			$question_mark = $_POST["questionMarkFib"];
			$question_type_name = $_POST["questionType"];
			$exam_id = $_POST["exam_id"];
			$instruction = $qstMcq->sanitizeInputs($_POST["instruction"]);
			$option_name = $_POST["mcqOption"];
			$option_correct = $_POST['radioOptionMcq'];
	

			// calling a function of class class Questions
			$output = $qstMcq->insertQuestion($question, $question_mark, $question_type_name, $exam_id, $instruction, $option_name, $option_correct);


			if (is_array($output)) {
				foreach ($output as $key => $value) {
					echo $value;
				}
			}else{
				echo $output;
			}

		}
	}elseif($_POST['questionType'] == 'Fill in the blank') {

		//Validation for Fill in the blank Question Form
		if (empty($_POST['instruction']) || empty($_POST['question'])) {
		   $message1 = "<div class='alert alert-danger'>Instruction and Question fields are required for a new question to be saved</div>";
		  $errorFib[] = $message1;
		}
		if (empty($_POST['questionMarkFib'])){
			$message2 = "<div class='alert alert-danger'>Please assign a mark to the question</div>";
			$errorFib[] = $message2;
		}
		if (empty($_POST['fillInTheBlankAnswer'])) {
			$message3 = "<div class='alert alert-danger'>Please fill in the correct answer in the field</div>";
			$errorFib[] = $message3;
		}
		if (isset($errorFib)) {
			foreach ($errorFib as $key => $value) 
				echo $value;
		}

		if (empty($errorFib)) {
			//Instantiating object of class Questions for insertQuestion method
			$qstFib = new Questions;

			$question = $qstFib->sanitizeInputs($_POST['question']);
			$question_mark = $_POST["questionMarkFib"];
			$question_type_name = $_POST["questionType"];
			$exam_id = $_POST["exam_id"];
			$instruction = $qstFib->sanitizeInputs($_POST["instruction"]);
			$option_name = $_POST["fillInTheBlankAnswer"];
			$option_name = ucwords(strtolower(trim($option_name)));
			$option_correct = 1;

			$output = $qstFib->insertQuestion($question, $question_mark, $question_type_name, $exam_id, $instruction, $option_name, $option_correct);


			if (is_array($output)) {
				foreach ($output as $key => $value) {
					echo $value;
				}
			}else{
				echo $output;
			}


		}
	}elseif($_POST['questionType'] == 'Theory Question') {
		
		//Validation for Theory Question Form
		if (empty($_POST['instruction']) || empty($_POST['question'])) {
		   $message1 = "<div class='alert alert-danger'>Instruction and Question fields are required for a new question to be saved</div>";
		  $errorThe[] = $message1;
		}

		if (empty($_POST['questionMarkThe'])) {
			$message2 = "<div class='alert alert-danger'>Please assign a mark to the question</div>";
			$errorThe[] = $message2;
		}

		if (isset($errorThe)) {
			foreach ($errorThe as $key => $value) 
				echo $value;
		}

		if (empty($errorThe)) {

			//Istantiating object of class Questions for insertQuestion method
			$qstThe = new Questions;

			$question = $qstThe->sanitizeInputs($_POST['question']);
			$question_mark = $_POST["questionMarkThe"];
			$question_type_name = $_POST["questionType"];
			$exam_id = $_POST["exam_id"];
			$instruction = $qstThe->sanitizeInputs($_POST["instruction"]);
			$option_name = " ";
			$option_correct = " ";
			// calling a function of class class Questions
			$output = $qstThe->insertQuestion($question, $question_mark, $question_type_name, $exam_id, $instruction, $option_name, $option_correct);


			if (is_array($output)) {
				foreach ($output as $key => $value) {
					echo $value;
				}
			}else{
				echo $output;
			}
		}
	}else{
	 		echo "<div class='alert alert-danger'>Please select a question type</div>";
	}
}
#End Adding new qustion to database


#Begin Get all examination done by student  for result
if (isset($_POST['studentViewResult'])) {
	$student_id = $_POST['student_id'];
	//Instantiating object of class Examination for getAllExamsByStudentForResults method
	$objResult = new Examination;
	$output = $objResult->getAllExamsByStudentForResults($student_id);
	$studentExam = '';
	if (is_array($output)) {
		$studentExam .= "<table class='table table-hover table-striped table-light table-bordered'><thead class='bg-secondary text-light'><tr><th>S/N</th><th>Examination code</th><th>Examination Title</th><th>Examination Subject</th><td>Exam Date</td><th>Action</th></tr></thead><tbody>";
		 foreach($output as $key => $value) {
		$studentExam .= "<tr><td>".++$key."</td><td>".$value['exam_code']."</td><td>".$value['exam_title']."</td><td>".$value['subject_name']."</td><td>".$value['exam_start_time']."</td><td>";
		$studentExam .= "<a href='#'";
		$studentExam .="data-id='".$value['exam_id']."' data-title='".$value['exam_title']."' data-code='".$value['exam_code']."' data-subject='".$value['subject_name']."' data-student='".$value['student_id']."' data-date='".$value['exam_start_time'];
		$studentExam .= "' class='btn btn-primary btn-sm mt-1' id='studentviewResult' data-toggle='modal' data-target='#studentviewResultModal' >View Result</a>";
		$studentExam .= "</td></tr>";
				}
		$studentExam .= "</tbody></table>";
		echo $studentExam;
	}else{
		echo $output;
	}

}
#End Get all examination done by student for result


#Begin fetching all examinations student have been registered for
if (isset($_POST['examInfo'])) {
	$student_id = $_POST['student_id'];
	//Instantiating object of class Examination for getExamInfoForStudent method
	$objExamInfo = new Examination;
	$output = $objExamInfo->getExamInfoForStudent($student_id);
	$studentExamInfo = '';
	if (is_array($output)) {
		$studentExamInfo .= "<table class='table table-hover table-striped table-light table-bordered'><thead class='bg-secondary text-light'><tr><th>S/N</th><th>Examination code</th><th>Examination Title</th><th>Examination Subject</th><th>Start Time</th><th>End Time</th><th>Action</th></tr></thead><tbody>";
		 foreach($output as $key => $value) {
		$studentExamInfo .= "<tr><td>".++$key."</td><td>".$value['exam_code']."</td><td>".$value['exam_title']."</td><td>".$value['subject_name']."</td>";
		$studentExamInfo .= "<td>".$value['exam_start_time']."</td>";
		$studentExamInfo .= "<td>".$value['exam_end_time']."</td>";
		$studentExamInfo .= "<td><a href='#' class='btn btn-info btn-sm' data-student='".$student_id."' data-exam='".$value['exam_id']."' data-toggle='modal' data-target='#examPasscodeModal' id='studentViewPasscode'>View Passcode</a></td></tr>";
				}
		$studentExamInfo .= "</tbody></table>";
		echo $studentExamInfo;
	}else{
		echo $output;
	}
}
#End fetching all examinations student have been registered for


#Begin View Result by Student
if (isset($_POST['studentViewResultBtn'])) {
	$exam_code = $_POST['exam_code'];
	$exam_id = $_POST['exam_id'];
	$exam_title = $_POST['exam_title'];
	$student_id = $_POST['student_id'];
	$exam_date = $_POST['exam_date'];

	//Instantiating object of class Examination for getAllExamsByStudentForResults method
	$objViewResult = new Examination;
	$output = $objViewResult->studentViewResult($student_id, $exam_id);
	/*echo "<pre>";
	print_r($output);
	echo "</pre>";*/
	if (is_array($output)) {

	//Calling getExamTotalMark method of class Examination
	$output2 = $objViewResult->getExamTotalMark($exam_id);

	foreach ($output2 as $key => $value) {
		$totalScore = $value['totalMark'];
	}
	$score = array();
	foreach ($output as $key => $value) {
	
	if ($value['option_name'] == $value['student_answers'] AND $value['option_correct'] == 1 ) {
		
		$score[] = $value['question_mark'];
		//echo $value['question_mark']."<br>";
		//echo $key."<br>";
			}
		}
		$studentScore = array_sum($score);
		echo "<div class='alert alert-info'>Your scored ".$studentScore." out of ".$totalScore." in ".$exam_title." that took place on ".$exam_date."</div>";
	}else{
		echo "<div class='alert alert-info'>You were Absent this examination.</div>";
	}
	/**/
	
	
}
#End View result by Student


#Begin view examination list to see exam result for examiner
if (isset($_POST['examinerViewResult'])) {
	$examiner_id = $_POST['examinerId'];
	//Instantiating object of class Examination for getAllExamsByExaminerForResults method
	$objResult = new Examination;
	$output = $objResult->getAllExamsByExaminerForResults($examiner_id);

	$examinerExam = '';
	if (is_array($output)) {
		$examinerExam .= "<table class='table table-hover table-striped table-light table-bordered'><thead class='bg-secondary text-light'><tr><th>S/N</th><th>Examination code</th><th>Examination Title</th><th>Examination Subject</th><th>Exam Date</th><th>Action</th></tr></thead><tbody>";
		 foreach($output as $key => $value) {
		$examinerExam .= "<tr><td>".++$key."</td><td data-id='exam_code'>".$value['exam_code']."</td><td>".$value['exam_title']."</td><td>".$value['subject_name']."</td><td>".$value['exam_start_time']."</td><td>";
		$examinerExam .= "<a href='examflow_examiner_view_student_result.php?exam_id=";
		$examinerExam .=$value['exam_id']."&exam_title=".$value['exam_title']."&exam_code=".$value['exam_code']."&exam_subject=".$value['subject_name']."'";
		$examinerExam .= "' class='btn btn-primary btn-sm mt-1' id='examinerViewResult' >View Result</a>";
		$examinerExam .="</td></tr>";
				}
		$examinerExam .= "</tbody></table>";
		echo $examinerExam;
	}else{
		echo $output;
	}

}
#End view examination list to see exam result for examiner


#Begin View Result by Examiner
if (isset($_POST['examinerViewResultPage'])) {
	//echo "I got here";
	$exam_id = $_POST['exam_id'];
	$student_id = $_POST['student_id'];
	$exam_title = $_POST['exam_title'];
	$student_name = $_POST['student_name'];

	//Instantiating object of class Examination for examinerViewResult method but the method used here is the student method because i am too lazy to do another one for the examiner afterall they are exactly the same thing


	$objViewStudentResult = new Examination;
	$output = $objViewStudentResult->studentViewResult($student_id, $exam_id);


	/*echo "<pre>";
	print_r($output);
	echo "</pre>";*/

	//echo "I got here";
	if (is_array($output)) {

	//Calling getExamTotalMark method of class Examination
	$output2 = $objViewStudentResult->getExamTotalMark($exam_id);

	foreach ($output2 as $key => $value) {
		$totalScore = $value['totalMark'];
	}

	$score = array();
	foreach ($output as $key => $value) {
	
	if ($value['option_name'] == $value['student_answers'] AND $value['option_correct'] == 1 ) {
		
		$score[] = $value['question_mark'];
		//echo $value['question_mark']."<br>";
		//echo $key."<br>";
			}
		}
		$studentScore = array_sum($score);
		echo "<div class='alert alert-info'>".$student_name." scored ".$studentScore." out of ".$totalScore." in ".$exam_title." exam</div>";
	}else{
		echo "<div class='alert alert-info'>".$student_name."  was absent for ".$exam_title." examination</div>";
	}

}
#End View Result by Examiner


#Begin fetching all examinations for admin view
if (isset($_POST['adminViewExam'])) {
	//Instantiating object of class Examination for examinerViewResult method
	$objResult = new Examination;
	$output = $objResult->getAllExamForAdmin();

		$adminViewExam = '';
	if (is_array($output)) {
		$adminViewExam .= "<table class='table table-hover table-striped table-light table-bordered'><thead class='bg-secondary text-light'><tr><th>S/N</th><th>Examination code</th><th>Examination Title</th><th>Examiner Name</th><th>Examination Subject</th><th>Start Time</th><th>End Time</th></tr></thead><tbody>";
		 foreach($output as $key => $value) {
		$adminViewExam .= "<tr><td>".++$key."</td><td>".$value['exam_code']."</td><td>".$value['exam_title']."</td><td>".$value['examiner_lname']."  ".$value['examiner_fname']."</td><td>".$value['subject_name']."</td>";
		$adminViewExam .= "<td>".$value['exam_start_time']."</td><td>".$value['exam_end_time']."</td></tr>";
				}
		$adminViewExam .= "</tbody></table>";
		echo $adminViewExam;
	}else{
		echo $output;
	}
}
#End fetching all examinations for admin view



#Begin view examination list to see exam result for admin
if (isset($_POST['adminViewResult'])) {
	//Instantiating object of class Examination for examinerViewResult method
	$objResult = new Examination;
	$output = $objResult->getAllExamForAdminForViewResult();

		$adminViewResult = '';
	if (is_array($output)) {
		$adminViewResult .= "<table class='table table-hover table-striped table-light table-bordered'><thead class='bg-secondary text-light'><tr><th>S/N</th><th>Examination code</th><th>Examination Title</th><th>Examination Subject</th><th>Exam Date</th><th>Action</th></tr></thead><tbody>";
		 foreach($output as $key => $value) {
		$adminViewResult .= "<tr><td>".++$key."</td><td>".$value['exam_code']."</td><td>".$value['exam_title']."</td><td>".$value['subject_name']."</td>";
		$adminViewResult .= "<td>".$value['exam_start_time']."</td><td><a href='examflow_admin_view_student_result.php?exam_id=";
		$adminViewResult .=$value['exam_id']."&exam_title=".$value['exam_title']."&exam_code=".$value['exam_code']."&exam_subject=".$value['subject_name']."'";
		$adminViewResult .= "' class='btn btn-secondary btn-sm'>View Result</a></td></tr>";
				}
		$adminViewResult .= "</tbody></table>";
		echo $adminViewResult;
	}else{
		echo $output;
	}
}
#End view examination list to see exam result for admin


#Begin View Student's Result by Admin
if (isset($_POST['adminViewResultPage'])) {
	//echo "I got here";
	$exam_id = $_POST['exam_id'];
	$student_id = $_POST['student_id'];
	$exam_title = $_POST['exam_title'];
	$student_name = $_POST['student_name'];

	//Instantiating object of class Examination for adminViewResult method but the method used here is the student method because i am too lazy to do another one for the examiner afterall they are exactly the same thing

	$objViewStudentResult = new Examination;
	$output = $objViewStudentResult->studentViewResult($student_id, $exam_id);


	/*echo "<pre>";
	print_r($output);
	echo "</pre>";*/

	//echo "I got here";
	if (is_array($output)) {

	//Calling getExamTotalMark method of class Examination
	$output2 = $objViewStudentResult->getExamTotalMark($exam_id);

	foreach ($output2 as $key => $value) {
		$totalScore = $value['totalMark'];
	}

	$score = array();
	foreach ($output as $key => $value) {
	
	if ($value['option_name'] == $value['student_answers'] AND $value['option_correct'] == 1 ) {
		
		$score[] = $value['question_mark'];
		//echo $value['question_mark']."<br>";
		//echo $key."<br>";
			}
		}
		$studentScore = array_sum($score);
		echo "<div class='alert alert-info'>".$student_name." scored ".$studentScore." out of ".$totalScore." in ".$exam_title." exam</div>";
	}else{
		echo "<div class='alert alert-info'>Result is yet to be released, please check back in a while</div>";
	}

}
#End View Student's Result by Admin


#Begin fetching all examiners for admin view
if (isset($_POST['adminViewExaminers'])) {
	//Instantiating object of class Examination for examinerViewResult method
	$objResult = new Examination;
	$output = $objResult->getAllExaminersForAdmin();

		$adminViewExaminers = '';
	if (is_array($output)) {
		$adminViewExaminers .= "<table class='table table-hover table-striped table-light table-bordered'><thead class='bg-secondary text-light'><tr><th>S/N</th><th>Examiner Name</th><th>Examiner Email</th><th>Phone Number</th></tr></thead><tbody>";
		 foreach($output as $key => $value) {
		$adminViewExaminers .= "<tr><td>".++$key."</td><td>".$value['examiner_lname']."  ".$value['examiner_fname']."</td><td>".$value['examiner_email']."</td>";
		$adminViewExaminers .= "<td>".$value['examiner_phone']."</td></tr>";
				}
		$adminViewExaminers .= "</tbody></table>";
		echo $adminViewExaminers;
	}else{
		echo $output;
	}
}
#End fetching all examiners for admin view



#Begin fetching all students for admin view
if (isset($_POST['adminViewStudents'])) {

	//Instantiating object of class Examination for examinerViewResult method 
	$objResult = new Examination;
	$output = $objResult->getAllStudentsForAdmin();

		$adminViewStudents = '';
	if (is_array($output)) {
		$adminViewStudents .= "<table class='table table-hover table-striped table-light table-bordered'><thead class='bg-secondary text-light'><tr><th>S/N</th><th>Examiner Name</th><th>Examiner Email</th><th>Phone Number</th></tr></thead><tbody>";
		 foreach($output as $key => $value) {
		$adminViewStudents .= "<tr><td>".++$key."</td><td>".$value['student_lname']."  ".$value['student_fname']."</td><td>".$value['student_email']."</td>";
		$adminViewStudents .= "<td>".$value['student_phone']."</td></tr>";
				}
		$adminViewStudents .= "</tbody></table>";
		echo $adminViewStudents;
	}else{
		echo $output;
	}
}
#End fetching all students for admin view


#Begin add new Admin
if (isset($_POST['newAdmin'])) {


	$firstname = ucfirst(strtolower(trim($_POST["adminFname"])));
	$lastname = ucfirst(strtolower(trim($_POST["adminLname"])));
	$email = strtolower(trim($_POST["adminEmail"]));
	$confirm_email = strtolower(trim($_POST["adminCEmail"]));
	$password = trim($_POST["adminPassword"]);
	$confirm_password = trim($_POST["adminCPassword"]);
	$countryCode = trim($_POST["countryCode"]);
	$phone = trim($_POST["phone"]);
	$phoneNumber = $countryCode.$phone;
	$adminType = $_POST['adminType'];

	//Validating each field
		if (empty($firstname)) {
			$message1 = "<div class='alert alert-danger'>Firstname is required</div>";
			$errors[] = $message1;
		}
		if (empty($lastname)) {
			$message2 = "<div class='alert alert-danger'>Lastname is required</div>";
			$errors[] = $message2;
		}
		if (empty($email)) {
			$message3 = "<div class='alert alert-danger'>Email is required</div>";
			$errors[] = $message3;
		}
		if (empty($confirm_email)) {
			$message4 = "<div class='alert alert-danger'>Confirm Email field is required</div>";
			$errors[] = $message4;
		}
		if (empty($password)) {
			$message5 = "<div class='alert alert-danger'>Password is required</div>";
			$errors[] = $message5;
		}
		if (empty($confirm_password)) {
			$message6 = "<div class='alert alert-danger'>Confirm password field is required</div>";
			$errors[] = $message6;
		}
		if (empty($countryCode)) {
			$message8 = "<div class='alert alert-danger'>Country code is required</div>";
			$errors[] = $message8;
		}
		if (empty($phone)) {
			$message9 = "<div class='alert alert-danger'>Phone number is required</div>";
			$errors[] = $message9;
		}

		/*echo "<pre>";
		var_dump($errors);
		echo "</pre>";*/

		//checking for mismatch in email and password field
		if ($email <> $confirm_email) {
			$message10 = "<div class='alert alert-danger'>Both Email and Confirm Email fields must match.</div>";
			$errors[] = $message10;
		}
		if ($password != $confirm_password) {
			$message11 = "<div class='alert alert-danger'>Both Password and Confirm Passwords fields must match.</div>";
			$errors[] = $message11;
		}

		if (isset($errors)) {
			foreach ($errors as $key => $value) {
				echo $value;
			}
		}


		if (empty($errors)) {
		
		//Instantiating object of class User for registerUserAdmin method
		$object = new Users;
		$output = $object->registerUserAdmin($firstname, $lastname, $email, $password, $phoneNumber, $adminType);
		echo $output;
		}
}
#End add new Admin


#Begin submission of complain form
if (isset($_POST['complainCheck'])) {

	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$complain = $_POST['complain'];

	if (!empty($complain)) {
		$receiver_address = "examflow@gmail.com";
		$subject = "Complain";
		$message = $complain;
		$headers ="From: ".$email;

		@mail($receiver_address, $subject, $message, $headers);

		echo "<div class='alert alert-info'>Thanks for lodging your complain to Us, Complain successfully sent your will recieve a feedback via your email</div>";
	}else{
		echo "<div class='alert alert-danger'>An empty message field can't be sent please, fill it appropiately. </div>";
	}
}
#End submission of complain form



#Begin view more examination details by examiner
if (isset($_POST['examinerViewMoreDetails'])) {
	$exam_id = $_POST['exam_id'];

	//Instantiating object of class Examination  
	$objResult = new Examination;

	//Calling totalRegisteredStudent method of class Examination
	$output = $objResult->totalRegisteredStudent($exam_id);

	if (is_array($output)) {
		foreach ($output as $key => $value) {
		$totalRegisteredStudent = $value['registeredStudents'];
	}
	}

	//Calling totalNumberOfQuestion method of class Examination
	$output2 = $objResult->totalNumberOfQuestion($exam_id);

	if (is_array($output2)) {
		foreach ($output2 as $key => $value) {
		$totalNumberOfQuestion = $value['noOfQuestions'];
		}
	}

	//I can also add the total mark for the examintion here

	$viewMoreDetails = '';
	$viewMoreDetails .= "<table class='table table-hover table-striped table-light table-bordered'><thead class='bg-secondary text-light'><tr><th>No of Registered Students</th><th>No of Questions</th></tr></thead><tbody>";
	$viewMoreDetails .= "<tr><td>". $totalRegisteredStudent ."</td><td>". $totalNumberOfQuestion."</td>";
	$viewMoreDetails .= "</tr>";
	$viewMoreDetails .= "</tbody></table>";
	echo $viewMoreDetails;


}
#End view more examination details by examiner


#Begin student to view thier exam passcode
if (isset($_POST['studentPasscode'])) {
	$exam_id = $_POST['exam_id'];
	$student_id = $_POST['student_id'];

	//Instantiating object of class Examination  
	$objResult = new Examination;
	$output = $objResult->getStudentPasscode($student_id, $exam_id);

	if (is_array($output)) {
		foreach ($output as $key => $value) {
			$studentPasscode = $value['student_exam_passcode'].".".$value['registration_id'];
		}
	}

	echo "<div class='alert alert-info btn-lg'>Your exam passcode for this is :  '".$studentPasscode."'</div><div class='alert alert-danger'><ul><li>Do not reveal your examination passcode to anyone</li><li>You can only login once for this examination, please avoid logging in before the examination time else you will be disqualified from writing this examination</li></ul></div>";
}
#End student to view thier exam passcode


#Begin count of examination, question and student for admin dash board display
if (isset($_POST['adminExamCount'])) {
	//Instantiating object of class Examination  
	$obj = new Examination;
	$output = $obj->adminCountTotalExams();
	foreach ($output as $key => $value) {
		echo $value['totalExams'];
	}
}

if (isset($_POST['adminStudentCount'])) {
	//Instantiating object of class Examination
	$obj = new Examination;
	$output = $obj->adminCountTotalStudents();
	foreach ($output as $key => $value) {
		echo $value['totalStudents'];
	}  
}

if (isset($_POST['adminQuestionCount'])) {
	//Instantiating object of class Examination 
	$obj = new Examination;
	$output = $obj->adminCountTotalQuestions();
	foreach ($output as $key => $value) {
		echo $value['totalQuestions'];
	}
}
#End count of examination, question and student for admin dash board display


#Begin count of examination, question and result for student dash board display
if (isset($_POST['studentExamCount'])) {
	$student_id = $_POST['student_id'];
	//Instantiating object of class Examination 
	$obj = new Examination;
	$output = $obj->studentCountTotalExams($student_id);
	foreach ($output as $key => $value) {
		echo $value['studentTotalExams'];
	}
}

if (isset($_POST['studentResultCount'])) {
	$student_id = $_POST['student_id'];
	//Instantiating object of class Examination 
	$obj = new Examination;
	$output = $obj->studentCountTotalResult($student_id);
	foreach ($output as $key => $value) {
		echo $value['studentTotalResult'];
	}
}

if (isset($_POST['studentQuestionCount'])) {
	$student_id = $_POST['student_id'];
	//Instantiating object of class Examination 
	$obj = new Examination;
	$output = $obj->studentCountTotalQuestion($student_id);
	foreach ($output as $key => $value) {
		echo $value['studentTotalQuestions'];
	}
}
#End count of examination, question and result for student dash board display


#Begin count of examination, question and result for examiner dashboard display
if (isset($_POST['examinerExamCount'])) {
	$examiner_id = $_POST['examiner_id'];
	//Instantiating object of class Examination 
	$obj = new Examination;
	$output = $obj->examinerCountTotalExams($examiner_id);
	foreach ($output as $key => $value) {
		echo $value['examinerTotalExams'];
	}
}

if (isset($_POST['examinerResultCount'])) {
	$examiner_id = $_POST['examiner_id']; 
	//Instantiating object of class Examination 
	$obj = new Examination;
	$output = $obj->examinerCountTotalResult($examiner_id);
	foreach ($output as $key => $value) {
		echo $value['examinerTotalResults'];
	}
}

if (isset($_POST['examinerQuestionCount'])) {
	$examiner_id = $_POST['examiner_id'];
	//Instantiating object of class Examination
	$obj = new Examination;
	$output = $obj->examinerCountTotalQuestions($examiner_id);
	foreach ($output as $key => $value) {
		echo $value['examinerTotalQuestions'];
	}
}
#End count of examination, question and result for examiner dashboard display



#Begin update of examiner password
if (isset($_POST['examinerUpdatePassword'])) {
	$password = $_POST['password'];
	$examiner_id = $_POST['examiner_id'];

	//Instantiating object of class Examination
	$obj = new Users;
	$output = $obj->examinerUpdatePassword($examiner_id, $password);

	echo $output;

}
#End update of examiner password


#Begin update of admin password
if (isset($_POST['adminUpdatePassword'])) {
	$password = $_POST['password'];
	$admin_id = $_POST['admin_id'];

	//Instantiating object of class Examination
	$obj = new Users;
	$output = $obj->adminUpdatePassword($admin_id, $password);

	echo $output;

}
#End update of admin password		


#Begin update of student password
if (isset($_POST['studentUpdatePassword'])) {
	$password = $_POST['password'];
	$student_id = $_POST['student_id'];

	//Instantiating object of class Examination
	$obj = new Users;
	$output = $obj->studentUpdatePassword($student_id, $password);

	echo $output;

}
#End update of studnet password

#**********************************
#**********************************

#**********************************
#**********************************

#**********************************
#**********************************
?>