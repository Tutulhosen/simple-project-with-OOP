
<?php

use App\controlers\StudentControler;

include_once "vendor/autoload.php";
$student= new StudentControler;

if (isset($_GET['delete_id'])) {
	$delete_id= $_GET['delete_id'];
	$student->delete_id($delete_id);
}


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

<div class="wrap-table" style="width: 80%; margin:20px auto 0px;">
<a class="btn btn-sm btn-primary" href="signup.php">add new student</a>
<br>
<br>
	<div class="card shadow">
		<div class="card-body">
			<h2>All Students Data</h2>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>class</th>
						<th>sector</th>
						<th>subject</th>
						<th>photo</th>
						
						
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$student_data_arr= $student->get_data('students');
					while($student_data=$student_data_arr->fetch_object()) :

					
					?>



					<tr>
						<td>1</td>
						<td><?php echo $student_data->name ?></td>
						<td><?php echo $student_data->email ?></td>
						<td><?php echo $student_data->class ?></td>
						<td><?php echo $student_data->sector ?></td>
						<td><?php echo $student_data->subject ?></td>
						<td><img style="height:40px; width:40px; border-radius:50%;" src="assets/media/img/<?php echo $student_data->photo ?>" alt=""></td>
						
						
						<td>
							<a class="btn btn-sm btn-info" href="profile.php?user_id=<?php echo $student_data->id; ?>">View</a>
							<a class="btn btn-sm btn-warning" href="edit.php?edit_id=<?php echo $student_data->id; ?>">Edit</a>
							<a class="btn btn-sm btn-danger" href="?delete_id=<?php echo $student_data->id; ?>">Delect</a>
						</td>

					</tr>
					<?php endwhile; ?>
					
				</tbody>
			</table>
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