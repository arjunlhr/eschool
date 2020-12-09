<?php
define('TITLE', 'Change Password');
define('PAGE', 'changepassword');
if(!isset($_SESSION)){
    session_start();
}
include('stuinclude/header.php');
include('../dbconnection.php');
if(isset($_SESSION['is_login'])){
    $stuemail = $_SESSION['stuLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

$stuemail = $_SESSION['stuLogEmail'];
if(isset($_REQUEST['studentupdatepassword'])){
    if( ($_REQUEST['stupassword'] =="")){
        $msg = '<div class="alert alert-warning col-md-6 ml-5 mt-2">Fill Empty Fileds</div>';
    } else {
        $sql = "SELECT * FROM student where stu_email='$stuemail'";
        $result = $conn->query($sql);
        if($result->num_rows ==1){
            $studentpassword = $_REQUEST['stupassword'];
            $sql = "UPDATE student SET stu_pass='$studentpassword' where stu_email='$stuemail'";
        if($conn->query($sql)==TRUE){    
            $msg = '<div class="alert alert-success col-md-6 ml-5 mt-2">Update Successfully</div>';       
        } else {
            $msg = '<div class="alert alert-danger col-md-6 ml-5 mt-2">Unable to Update</div>';
        }
    }
}
}
?>
<div class="col-md-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Change Password</h3>
    <form action="" method="POST" enctype="multipart/form-data">
       
        <div class="form-group">
            <label for="stuemail">Email</label>
            <input type="text" class="form-control" id="stuemail" name="stuemail" value="<?php echo $stuemail ?>" readonly> 
        </div>
        <div class="form-group">
            <label for="stupassword">Update Password</label>
            <input type="text" class="form-control" id="stupassword" name="stupassword" >
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-danger" id="studentupdatepassword" name="studentupdatepassword">Update</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

<?php
include('stuinclude/footer.php');
?>