<?php
define('TITLE', 'Add lessions');
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

if(isset($_REQUEST['lessionsubmitbutton'])){
    if(($_REQUEST['lession_name'] =="") || ($_REQUEST['lession_description'] =="") ||
    ($_REQUEST['course_id'] =="") || ($_REQUEST['course_name'] =="")){
        $msg = '<div class="alert alert-warning col-md-6 ml-5 mt-2">Fill All Fileds</div>';
    } else {
        $lession_name = $_REQUEST['lession_name'];
        $lession_description = $_REQUEST['lession_description'];
        $course_id = $_REQUEST['course_id'];
        $course_name = $_REQUEST['course_name'];
        $lession_video_link = $_FILES['lession_video_link']['name'];
        $lession_link_temp = $_FILES['lession_video_link']['tmp_name'];
        $link_folder = '../lessionvid/'. $lession_video_link;
        move_uploaded_file($lession_link_temp, $link_folder);  
        
        $sql = "INSERT INTO lession (lession_name, lession_desc, lession_link, course_id, course_name) VALUES ('$lession_name','$lession_description', '$link_folder','$course_id', '$course_name')";
        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-md-6 ml-5 mt-2">Lession Added Successfully</div>';       
        } else {
            $msg = '<div class="alert alert-danger col-md-6 ml-5 mt-2">Unable to Add Lession</div>';
        }
    }
}
?>

<div class="col-md-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if (isset($_SESSION['course_id'])) { echo $_SESSION['course_id']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if (isset($_SESSION['course_name'])) { echo $_SESSION['course_name']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="lession_name">Lession Name</label>
            <input type="text" class="form-control" id="lession_name" name="lession_name">
        </div>
        <div class="form-group">
            <label for="lession_description">Lession Description</label>
            <input type="text" class="form-control" id="lession_description" name="lession_description">
        </div>
        <div class="form-group">
            <label for="lession_video_link">Lession Video Link</label>
            <input type="file" class="form-control-file" id="lession_video_link" name="lession_video_link">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="lessionsubmitbutton" name="lessionsubmitbutton">Submit</button>
            <a href="lession.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>


<?php
include('admininclude/footer.php');
?>