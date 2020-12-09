<?php
define('TITLE', 'Profile');
define('PAGE', 'studentprofile');
if(!isset($_SESSION)){
    session_start();
}
include('stuinclude/header.php');
include_once('../dbconnection.php');

if(isset($_SESSION['is_login'])){
    $stuemail = $_SESSION['stuLogEmail'];
} else {
    echo "<script> location.href='../index.php';  </script>";
}

    $sql = "SELECT * from student where stu_email='$stuemail'";
    $result = $conn->query($sql);
    if($result->num_rows==1){
        $row = $result->fetch_assoc();
        $studentid = $row["stu_id"];
        $studentname = $row["stu_name"];
        $studentoccupation = $row["stu_occ"];
        $studentimage = $row["stu_img"];
    }
if (isset($_REQUEST['studentupdate'])){
    if(($_REQUEST['studentname'])==""){
        $msg = '<div class="alert alert-warning col-md-6 ml-5 mt-2">Fill Empty Field</div>';
    } else {
        $studentname = $_REQUEST["studentname"];
        $studentoccupation = $_REQUEST["studentoccupation"];
        $stu_image = $_FILES['stuimg']['name'];
        $stu_image_temp = $_FILES['stuimg']['tmp_name'];
        $img_folder = '../img/student/'. $stu_image;
        move_uploaded_file($stu_image_temp, $img_folder);
        $sql = "UPDATE student SET stu_name='$studentname', stu_occ='$studentoccupation', stu_img = '$img_folder'
         WHERE stu_email = '$stuemail'";
        if($conn->query($sql) == true){
            $msg = '<div class="alert alert-success col-md-6 ml-5 mt-2">Update Successfully</div>';
        } else 
        {
            $msg = '<div class="alert alert-danger col-md-6 ml-5 mt-2">Unable to Update</div>';            
        }        
    }
}
?>

<div class="col-md-6 mt-5 ">
    <form action="" class="mx-5" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="studentid">Student Id</label>
            <input type="text" class="form-control" id="studentid" name="studentid" value="<?php if(isset($studentid)) {echo $studentid;} ?>" readonly> 
        </div>
        <div class="form-group">
            <label for="studentemail">Email</label>
            <input type="text" class="form-control" id="studentemail" name="studentemail" value="<?php echo $stuemail?>" readonly>
        </div>
        <div class="form-group">
            <label for="studentname">Name</label>
            <input type="text" class="form-control" id="studentname" name="studentname" value="<?php if(isset($studentname)) {echo $studentname;} ?>">
        </div>
        <div class="form-group">
            <label for="studentoccupation">Occupation</label>
            <input type="text" class="form-control" id="studentoccupation" name="studentoccupation" value="<?php if(isset($studentoccupation)) {echo $studentoccupation;} ?>">
        </div>
        <div class="form-group">
            <label for="stuimg">Upload Image</label>
            <input type="file" class="form-control-file" id="stuimg" name="stuimg">            
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-danger" id="studentupdate" name="studentupdate">Update</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div> <!-- Close row Div from header file -->

<?php
    include('./stuinclude/footer.php');
?>