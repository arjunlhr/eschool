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
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">    <!-- My css -->
    <link rel="stylesheet" href="../css/admin.css">
    <title> <?php echo TITLE ?> </title>
</head>
<body>

<!-- Top Navbar -->
<nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #225470;">
    <a href="admindashboard.php" class="navbar-brand col-sm-3 col-md-2 mr-0">E-Learning <small class="text-white">Admin Area</small></a>
</nav>
<!-- End Top Navbar -->

<!-- Side Bar -->
<div class="container-fluid mb-5" style="margin-top:40px;">
    <div class="row">
        <nav class="col-sm-3 col-md-3 bg-light sidebar py-3 d-print-none">
            <div class="sidebar-stickey">
                <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE=='admindashboard'){echo 'active';}?>" href="admindashboard.php"><i class="fas fa-tachometer-alt mr-2" aria-hidden="true"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE=='course'){echo 'active';}?>" href="course.php"><i class="fab fa-accessible-icon mr-2"></i>Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE=='lession'){echo 'active';}?>" href="lession.php"><i class="fab fa-accessible-icon mr-2"></i>Lession</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE=='student'){echo 'active';}?>" href="./student.php"><i class="fas fa-user mr-2"></i>Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE=='sellreport'){echo 'active';}?>" href="sellreport.php"><i class="fas fa-table mr-2"></i>Sell Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE=='adminpaymentstatus'){echo 'active';}?>" href="adminpaymentstatus.php"><i class="fas fa-table mr-2"></i>Payment Status</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE=='feedback'){echo 'active';}?>" href="feedback.php"><i class="fab fa-accessible-icon mr-2"></i>Feedback</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE=='adminchangepassword'){echo 'active';}?>" href="adminchangepassword.php"><i class="fas fa-key mr-2"></i>Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./adminlogout.php"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                        </li>
                </ul>
            </div>
        </nav>
