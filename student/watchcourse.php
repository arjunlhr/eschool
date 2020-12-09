<?php
define('TITLE', 'Watch Course');
define('PAGE', 'mycourse');
  if(!isset($_SESSION)){
    session_start();
}

include_once('../dbconnection.php');

if (isset($_SESSION['is_login'])) {
    $stuemail = $_SESSION['stuLogEmail'];
} else {
    echo "<script> location.href='../index.php';  </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Watch Course</title>
    <!-- Boostrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!-- My css -->
    <link rel="stylesheet" href="../css/my.css">

</head>

<body>
    <div class="container-fluid bg-success p-2">
        <h3>Welcome to E-Learning</h3>
        <a class="btn btn-danger" href="./mycourse.php">Watch Course</a>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 border-right">
                <h4 class="text-center">Lessons</h4>
                <ul id="playlist" class="nav flex-column">
                    <?php
                    if (isset($_GET['course_id'])) {
                        $course_id = $_GET['course_id'];
                        $sql = "SELECT * from lession where course_id = '$course_id'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo    '<li class="nav-item border-bottom py-2" movieurl=' . $row['lession_link'] . ' style="cursor:pointer;">' . $row['lession_name'] . '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-8">
                <video id="videoarea" src="" class="mt-5 w-75 ml-2" controls></video>
            </div>
        </div>
    </div>

<!-- Jquery and javascript -->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<!-- Font Awesome -->
<script src="../js/all.min.js"></script>

<!-- Custo js  -->
<script type="text/javascript" src="../js/custom.js"></script>
</body>
</html>