<?php
define('TITLE', 'Change Password');
define('PAGE', 'adminchangepassword');
session_start();
include('admininclude/header.php');
include('../dbconnection.php');

if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

$adminEmail = $_SESSION['adminLogEmail'];
if(isset($_REQUEST['adminupdatepassword'])){
    if( ($_REQUEST['adminpassword'] =="")){
        $msg = '<div class="alert alert-warning col-md-6 ml-5 mt-2">Fill Empty Fileds</div>';
    } else {
        $sql = "SELECT * FROM admin_db where admin_email='$adminEmail'";
        $result = $conn->query($sql);
        if($result->num_rows ==1){
            $adminpassword = $_REQUEST['adminpassword'];
            $sql = "UPDATE admin_db SET admin_pass='$adminpassword' where admin_email='$adminEmail'";
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
            <label for="adminemail">Email</label>
            <input type="text" class="form-control" id="adminemail" name="adminemail" value="<?php echo $adminEmail ?>" readonly> 
        </div>
        <div class="form-group">
            <label for="adminpassword">Update Password</label>
            <input type="text" class="form-control" id="adminpassword" name="adminpassword" >
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-danger" id="adminupdatepassword" name="adminupdatepassword">Update</button>
            <button type="reset" class="btn btn-secondary  ">Reset</button>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

<?php
include('admininclude/footer.php');
?>