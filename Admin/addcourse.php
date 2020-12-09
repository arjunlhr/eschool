<?php
define('TITLE', 'Add Courses');
define('PAGE', 'course');
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

if(isset($_REQUEST['coursesubmitbutton'])){
    if( ($_REQUEST['course_name'] =="") || ($_REQUEST['course_desc'] =="") ||
    ($_REQUEST['course_author'] =="") || ($_REQUEST['course_duration'] =="") ||
    ($_REQUEST['course_original_price'] =="") || ($_REQUEST['course_selling_price'] =="")){
        $msg = '<div class="alert alert-warning col-md-6 ml-5 mt-2">Fill All Fileds</div>';
    } else {
        $course_name = $_REQUEST['course_name'];
        $course_desc = $_REQUEST['course_desc'];
        $course_author = $_REQUEST['course_author'];
        $course_duration = $_REQUEST['course_duration'];
        $course_original_price = $_REQUEST['course_original_price'];
        $course_selling_price = $_REQUEST['course_selling_price'];
        $course_image = $_FILES['course_img']['name'];
        $course_image_temp = $_FILES['course_img']['tmp_name'];
        $img_folder = '../img/courseimg/'. $course_image;
        move_uploaded_file($course_image_temp, $img_folder);

        $sql = "INSERT INTO course (course_name, course_desc, course_author, 
            course_img, course_duration, course_price, course_original_price) 
            VALUES ('$course_name','$course_desc', '$course_author','$img_folder', 
            '$course_duration','$course_selling_price','$course_original_price')";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-md-6 ml-5 mt-2">Course Added Successfully</div>';       
        } else {
            $msg = '<div class="alert alert-danger col-md-6 ml-5 mt-2">Unable to Add Course</div>';
        }
    }
}

?>

<div class="col-md-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Course</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <input type="text" class="form-control" id="course_desc" name="course_desc">
        </div>
        <div class="form-group">
            <label for="course_author">Course Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" id="course_original_price" name="course_original_price">
        </div>
        <div class="form-group">
            <label for="course_selling_price">Course Selling Price</label>
            <input type="text" class="form-control" id="course_selling_price" name="course_selling_price">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="coursesubmitbutton" name="coursesubmitbutton">Submit</button>
            <a href="course.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

<?php
include('admininclude/footer.php');
?>