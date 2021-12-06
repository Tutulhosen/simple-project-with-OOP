<?php

use App\controlers\StudentControler;
use App\supporters\Validate;

include_once "vendor/autoload.php";

$student=new StudentControler;

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>SignUp</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>

		<?php
		$mgs="";

		/**
		 * isseting submit value
		 */
		if (isset($_POST['add'])) {
			
			/**
			 * get value from input field
			 */
			$name= $_POST['name'];
			$email= $_POST['email'];
			$class= $_POST['class'];
			$sector= $_POST['sector'];
			$subject= $_POST['subject'];
	

			/**
			 * form validation
			 */
			if (empty($name) || empty($email) || empty($class) || empty($sector) || empty($subject)) {
				$mgs= Validate::mgs("All fields are require");
			}elseif (Validate::validEamil($email)==false) {
				$mgs= Validate::mgs("Invalid email address", "warning");
			} else {
				$photo=Validate::upload_file($_FILES['photo'], 'assets/media/img/');
				$student->dataSent($name, $email, $class, $sector, $subject, $photo);
				$mgs= Validate::mgs("Data stable", "success");
				Validate::clear_data();

			}
			





		}
		
		
		
		
		
		
		
		
		
		?>





			<!--form area-->
			<br>
			<br>
			<br>

			<div class="container-fluit">
				<div class="row">
					<div class="col-md-4 offset-4">
					<div class=" shadow">
				<div class="card">
					<div class="card-body">
						<h2>SignUp</h2>

					<?php 
					
					Validate::show($mgs);
					
					?>
					

						<form action="" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="">Name</label>
								<input name="name" class="form-control" type="text" value="<?php Validate::old_data('name') ?>">
							</div>

							<div class="form-group">
								<label for="">Email</label>
								<input name="email" class="form-control" type="text" value="<?php Validate::old_data('email') ?>">
							</div>

							<div class="form-group">
								<label for="">Class</label>
								<input name="class" class="form-control" type="text" value="<?php Validate::old_data('class') ?>">
							</div>
							
							<div class="form-group">
								<label for="">Sector</label>
								<input name="sector" class="form-control" type="text" value="<?php Validate::old_data('sector') ?>">
							</div>

							<div class="form-group">
								<label for="">Subject</label>
								<input name="subject" class="form-control" type="text" value="<?php Validate::old_data('subject') ?>">
							</div>

							<div class="form-group">
								<img style="width: 200px; display:block;" id="upload" src="" alt="">
								<input name="photo" style="display: none;" name="photo" id="icn" type="file" class="form-control">
								<label for="icn"><img style="width: 70px; cursor:pointer;"  src="assets/media/img/icon.jpg" alt=""></label>
								
							</div>



							<div class="form-group">
								
								<input name="add" class="btn btn-primary" type="submit" value="SignUp">

							</div>

						</form>
						<a class="btn btn-success" href="index.php">See all students</a>
					</div>
				</div>
			</div>

					</div>

				</div>
			</div>







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>

</html>