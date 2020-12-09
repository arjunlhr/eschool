<?php
    include_once('../dbconnection.php');
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['is_login'])){
        $stuemail = $_SESSION['stuLogEmail'];
    } else {
        echo "<script> location.href='../index.php';  </script>";
    }

    if(isset($stuemail)){
        $sql = "SELECT * FROM student where stu_email = '$stuemail'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $stu_img = $row['stu_img'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!-- My css -->
    
    <title><?php echo TITLE ?></title>
</head>
<body>
 <!-- Top Navbar -->
<nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #225470;">
    <a href="../index.php" class="navbar-brand col-sm-3 col-md-2 mr-0">E-Learning </a>
</nav>
<!-- End Top Navbar -->

<!--Side Bar  -->
    <div class="container-fluid mb-5" style="margin-top: 40px;">
        <div class="row">
            <nav class="col-md-3 bg-light sidebar py-5 d-print-none">
            <div class="sidebar-stickey">
                <ul class="nav flex-column">
                    <li class="nav-item mb-3">
                        <img src="<?php echo $stu_img ?>" alt="studentimage" class="img-thumbnail rounded-circle">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (PAGE=='studentprofile'){echo 'active';}?>" href="./studentprofile.php"><i class="fas fa-user"></i> Profile </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mycourse.php"><i class="fab fa-accessible-icon"></i> Mycourse </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="paymentstatus.php"><i class="fab fa-accessible-icon"></i> Payment Status </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./feedback.php"><i class="fab fa-accessible-icon"></i> Feedback </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="changepassword.php"><i class="fas fa-key"></i> Change Password </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php"><i class="fas fa-key"></i> Logout </a>
                    </li>
                </ul>
            </nav>
 

<!-- End Side bar -->

 