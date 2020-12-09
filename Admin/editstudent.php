<?php
define('TITLE', 'Edit Student');
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

if(isset($_REQUEST['studentupdate'])){
    if( ($_REQUEST['studentid'] =="") || ($_REQUEST['studentname'] =="") || ($_REQUEST['studentemail'] =="") || ($_REQUEST['studentpassword'] =="") ||
    ($_REQUEST['studentoccupation'] =="")){
        $msg = '<div class="alert alert-warning col-md-6 ml-5 mt-2">Fill All Fileds</div>';
    } else {
        $studentid = $_REQUEST['studentid'];        
        $studentname= $_REQUEST['studentname'];
        $studentemail = $_REQUEST['studentemail'];
        $studentpassword = $_REQUEST['studentpassword'];
        $studentoccupation = $_REQUEST['studentoccupation'];

        $sql = "UPDATE student SET stu_id = '$studentid', stu_name='$studentname', stu_email='$studentemail',
        stu_pass='$studentpassword', stu_occ='$studentoccupation' WHERE stu_id='$studentid' ";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-md-6 ml-5 mt-2">Update Successfully</div>';       
        } else {
            $msg = '<div class="alert alert-danger col-md-6 ml-5 mt-2">Unable to Update</div>';
        }
    }
}

?>

<div class="col-md-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Student</h3>

    <?php
        if(isset($_REQUEST['view'])){
        $sql = "SELECT * from student WHERE stu_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();          
        }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="studentid"> Student Id</label>
            <input type="text" class="form-control" id="studentid" name="studentid" value="<?php if(isset($row['stu_id'])) {echo $row['stu_id'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="studentname"> Name</label>
            <input type="text" class="form-control" id="studentname" name="studentname" value="<?php if(isset($row['stu_name'])) {echo $row['stu_name'];}?>">
        </div>
        <div class="form-group">
            <label for="studentemail">Email</label>
            <input type="text" class="form-control" id="studentemail" name="studentemail" value="<?php if(isset($row['stu_email'])) {echo $row['stu_email'];}?>">
        </div>
        <div class="form-group">
            <label for="studentpassword">Password</label>
            <input type="text" class="form-control" id="studentpassword" name="studentpassword" value="<?php if(isset($row['stu_pass'])) {echo $row['stu_pass'];}?>">
        </div>
        <div class="form-group">
            <label for="studentoccupation">Occupation</label>
            <input type="text" class="form-control" id="studentoccupation" name="studentoccupation" value="<?php if(isset($row['stu_occ'])) {echo $row['stu_occ'];}?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="studentupdate" name="studentupdate">Update</button>
            <a href="student.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

<?php
include('admininclude/footer.php');
?>