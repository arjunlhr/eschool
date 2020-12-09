<?php

include_once('../dbconnection.php');
  
    
    // Checking email already exit or not

if(isset($_POST['checkemail']) && isset($_POST['stuemail'])){
        $stuemail = $_POST['stuemail'];
        $sql = "SELECT stu_email from student WHERE stu_email = '".$stuemail."'";
        $result = $conn->query($sql);
        $row = $result->num_rows;
        echo json_encode($row);
}
?>
