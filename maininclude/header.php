<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!-- My css -->
    <link rel="stylesheet" href="css/my.css">
    <title> eSchool </title>
</head>
<body>
<!-- start Navigation -->
    <nav class="navbar navbar-expand-sm bg-dark fixed-top ">
        <a class="navbar-brand pl-5" style="font-size: 1em;" href="index.php">e-School</a>
        <small class="text-white">Learn and Implement</small>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav custom-nav">
            <li class="nav-item custom-nav-item">
              <a class="nav-link " href="index.php">Home</a>
            </li>
            <li class="nav-item custom-nav-item">
              <a class="nav-link" href="course.php">Course</a>
            </li>
            <?php 
              session_start();
              if(isset($_SESSION['is_login'])){
                echo '<li class="nav-item custom-nav-item">
                <a class="nav-link" href="student/studentprofile.php">Myprofile</a>
            </li>
            <li class="nav-item custom-nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>';
              } else {
                echo '<li class="nav-item custom-nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalCenterlogin">Login</a>
            </li>
            <li class="nav-item custom-nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalCentersignup">Signup</a>
            </li>';
              }
            ?>
            <li class="nav-item custom-nav-item">
                <a class="nav-link" href="#feedback">Feedback</a>
            </li>
            <li class="nav-item custom-nav-item">
                <a class="nav-link" href="#Contact">Contact Us</a>
            </li>
          </ul>
        </div>
      </nav>
<!-- End Navigation -->
