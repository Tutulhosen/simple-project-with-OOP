<?php

if (empty($_GET['user_id'])) {
    header('location:index.php');
}

use App\controlers\StudentControler;

include_once "vendor/autoload.php";
$student= new StudentControler;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Facebook - log in or sign up</title>


    <!--CSS FILES-->
    <link rel="stylesheet" href="assets/font/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!--FAVINCON-->
    <link rel="shortcut icon" href="assets/img/icon.png" type="image/x-icon">

</head>
<body>

<?php 

if (isset($_GET['user_id'])) {
    $user_id= $_GET['user_id'];
    $user_profile_arr= $student->view_data($user_id);
    $user_profile= $user_profile_arr->fetch_object();

}

?>


<div class="row">
    <div class="col-md-4 offset-4">
    <div style="text-align: center;" class="profile_body ">
    <div class="card shadow">
        <div class="card-body ">
            <img style="height: 200px; width:200px; border-radius:50%;" src="assets/media/img/<?php echo $user_profile->photo; ?>" alt=""><br><br>
            <h2><?php echo $user_profile->name; ?></h2><br>
            <table class="table table-bordered ">
                <tr>
                    <td>Name</td>
                    <td><?php echo $user_profile->name; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $user_profile->email; ?></td>
                </tr>
                <tr>
                    <td>Class</td>
                    <td><?php echo $user_profile->class; ?></td>
                </tr>
                <tr>
                    <td>Sector</td>
                    <td><?php echo $user_profile->sector; ?></td>
                </tr>
                <tr>
                    <td>Subject</td>
                    <td><?php echo $user_profile->subject; ?></td>
                </tr>
            </table>
            <a class="btn btn-primary" href="index.php">See all students</a>
    
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