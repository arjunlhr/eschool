<?php
define('TITLE', 'Feedback');
define('PAGE', 'feedback');
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
    $sql = "SELECT * FROM student WHERE stu_email ='$stuemail'";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $stuid = $row['stu_id'];
        $stuname = $row['stu_name'];
        $studentimage = $row["stu_img"];    
    }

    if(isset($_REQUEST['fsubmit'])){
        if(($_REQUEST['studentid'] =="") || ($_REQUEST['f_content'] =="")){
            $msg = '<p class="alert alert-danger col-md-6">Fill All Fields</p>';
        } else {
            $fcontent = $_REQUEST["f_content"];    
            $sql = "INSERT INTO feedback (f_content, stu_id, stu_name, stu_img) VALUES ('$fcontent', '$stuid','$stuname', '$studentimage')";
            if($conn->query($sql)){
                $msg = '<p class="alert alert-success col-md-6">Feedback Submitted Successfully</p>';
            }
        }
    }
?>

<div class="col-md-6 mt-5">
<form id="studentform">
          <div class="form-group">
            <label for="studentid" class="font-weight-bolder">Student Id</label> 
            <input type="text" class="form-control" id="studentid" name="studentid"  value="<?php if(isset($stuid)) {echo $stuid;}?>" required readonly>
          </div>
          <div class="form-group">
            <label for="studentname" class="font-weight-bolder">Student Name</label> 
            <input type="text" class="form-control" id="studentname" name="studentname"  value="<?php if(isset($stuname)) {echo $stuname;}?>" required readonly>
          </div>
          <div class="form-group">
            <label for="f_content" class="font-weight-bolder">Write Feedback</label> 
            <textarea class="form-control " name="f_content" id="f_content" rows="6"></textarea>
          </div>
          <div class="form-group ">
              <button type="submit" class="btn btn-danger" id="fsubmit" name="fsubmit">Submit</button>
          </div>
          <?php if(isset($msg)) {echo $msg;} ?>
       <!-- end Student Registration Form -->
</form>
</div>


<?php
    include('stuinclude/footer.php');
?>
