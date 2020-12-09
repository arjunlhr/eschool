<?php
define('TITLE', 'Edit Lession');
define('PAGE', 'lession');
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

if(isset($_REQUEST['update'])){
    if( ($_REQUEST['lession_id'] =="") || ($_REQUEST['lession_name'] =="") || ($_REQUEST['lession_desc'] =="")
    || ($_REQUEST['course_id'] =="") || ($_REQUEST['course_name'] =="")){
        $msg = '<div class="alert alert-warning col-md-6 ml-5 mt-2">Fill All Fileds</div>';
    } else {
        $lession_id = $_REQUEST['lession_id'];
        $lession_name = $_REQUEST['lession_name'];
        $lession_desc = $_REQUEST['lession_desc'];
        $course_id = $_REQUEST['course_id'];
        $course_name = $_REQUEST['course_name'];
        


        $sql = "UPDATE lession SET lession_id = '$lession_id', lession_name='$lession_name', lession_desc='$lession_desc',
        course_id='$course_id', course_name='$course_name' WHERE lession_id='$lession_id'";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-md-6 ml-5 mt-2">Update Successfully</div>';       
        } else {
            $msg = '<div class="alert alert-danger col-md-6 ml-5 mt-2">Unable to Update</div>';
        }
    }
}

?>



<div class="col-md-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Lession Details</h3>

    <?php
        if(isset($_REQUEST['view'])){
        $sql = "SELECT * from lession WHERE lession_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="lession_id">Lession Id</label>
            <input type="text" class="form-control" id="lession_id" name="lession_id" value="<?php if(isset($row['lession_id'])) {echo $row['lession_id'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="lession_name">Lession Name</label>
            <input type="text" class="form-control" id="lession_name" name="lession_name" value="<?php if(isset($row['lession_name'])) {echo $row['lession_name'];}?>">
        </div>
        <div class="form-group">
            <label for="lession_desc">Lession Description</label>
             <input type="text" class="form-control" id="lession_desc" name="lession_desc" value="<?php if(isset($row['lession_desc'])) {echo $row['lession_desc'];}?>">
        </div>
        <div class="form-group">
            <label for="course_id">Course Id</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])) {echo $row['course_id'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])) {echo $row['course_name'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="lession_link">Lesson Link</label>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src ="<?php if(isset($row['lession_ link'])) { echo  $row['lession_link']; } ?>" allowfullscreen></iframe>
            </div>
            <input type="file" class="form-control-file" id="lession_link" name="lession_link">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="update" name="update">Update</button>
            <a href="lession.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

<?php
include('admininclude/footer.php');
?>