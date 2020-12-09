<?php
define('TITLE', 'New Student');
define('PAGE', 'student');
if(!isset($_SESSION)){
    session_start();
}

include('admininclude/header.php');
include('../dbconnection.php');

if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

if(isset($_REQUEST['studentsubmitbutton'])){
    if( ($_REQUEST['studentname'] =="") || ($_REQUEST['studentemail'] =="") ||
    ($_REQUEST['studentpassword'] =="") || ($_REQUEST['studentoccupation'] =="")){
        $msg = '<div class="alert alert-warning col-md-6 ml-5 mt-2">Fill All Fileds</div>';
    } else {
        $studentname = $_REQUEST['studentname'];
        $studentemail = $_REQUEST['studentemail'];
        $studentpassword = $_REQUEST['studentpassword'];
        $studentoccupation = $_REQUEST['studentoccupation'];
        $sql = "INSERT INTO student (stu_name, stu_email, stu_pass, stu_occ) VALUES ('$studentname','$studentemail', '$studentpassword','$studentoccupation')";
        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-md-6 ml-5 mt-2">Student Added Successfully</div>';       
        } else {
            $msg = '<div class="alert alert-danger col-md-6 ml-5 mt-2">Unable to Add Student</div>';
        }
    }
}

?>

<div class="col-md-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Student</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="studentname"> Name</label>
            <input type="text" class="form-control" id="studentname" name="studentname">
        </div>
        <div class="form-group">
            <label for="studentemail">Email</label>
            <input type="text" class="form-control" id="studentemail" name="studentemail">
        </div>
        <div class="form-group">
            <label for="studentpassword">Password</label>
            <input type="text" class="form-control" id="studentpassword" name="studentpassword">
        </div>
        <div class="form-group">
            <label for="studentoccupation">Occupation</label>
            <input type="text" class="form-control" id="studentoccupation" name="studentoccupation">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="studentsubmitbutton" name="studentsubmitbutton">Submit</button>
            <a href="student.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

<?php
include('admininclude/footer.php');
?>