<?php
define('TITLE', 'Dashboard');
define('PAGE', 'admindashboard');
include('admininclude/header.php');
include('../dbconnection.php');
    session_start();


if(isset($_SESSION['is_admin_login'])){
    $adminemail =  $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php; </script>";
}

$sql = "SELECT * from course";
$result = $conn->query($sql);
$totalcourse = $result->num_rows;

$sql = "SELECT * from student";
$result = $conn->query($sql);
$totalstudent = $result->num_rows;

$sql = "SELECT * from courseorder";
$result = $conn->query($sql);
$totalorder = $result->num_rows;

?>
    <div class="col-md-9 mt-5 bt-dark">
                <div class="row mx-5 text-center">
                    <div class="col-sm-4 mt-5">
                         <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">Courses</div>
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $totalcourse ?></h4>
                                    <a href="course.php" class="btn text-white">View</a>
                                </div>
                       </div>
                </div>
                <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header">Students</div>
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $totalstudent ?></h4>
                                 <a href="student.php" class="btn text-white">View</a>
                                </div>
                     </div>
                </div>
                <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                            <div class="card-header">Sold</div>
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $totalorder ?></h4>
                                 <a href="sellreport.php" class="btn text-white">View</a>
                                </div>
                     </div>
                </div>
    </div> 
    <div class="mx-5 mt-5 text-center">
            <!-- Table -->
            <p class="bg-dark text-white p-2">Course Ordered</p>
            <?php
                $sql = "SELECT * FROM courseorder";
                $result = $conn->query($sql);
                if($result->num_rows>0){
            
             echo '<table class="table">
                <thead>
                    <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Course Id</th>
                        <th scope="col">Student Email</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>';
                while($row= $result->fetch_assoc()){
                   echo '<tr>';
                      echo  '<td scope="row">' .$row["order_id"]. '</td>';
                      echo  '<td scope="row">' .$row["course_id"]. '</td>';
                      echo  '<td scope="row">' .$row["stu_email"]. '</td>';
                      echo  '<td scope="row">' .$row["order_date"]. '</td>';
                      echo  '<td scope="row">' .$row["amount"]. '</td>';
                      echo '<td> <form action="" method ="POST" class="d-inline">
                      <input type="hidden" name="id" value='.$row['co_id'].'><button type="submit"
                      class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i>
                      </button></form></td>';        
                    echo '</tr>';
                }  
                 echo '</tbody>
            </table>';
            } else {
                echo "0 result";
            }

            if(isset($_REQUEST['delete'])){
                $sql = "DELETE FROM courseorder WHERE co_id = {$_REQUEST['id']}";
                if ($conn->query($sql) === TRUE){
                    echo '<meta http-equiv="refresh" content="0; URL=? deleted"/>';
                } else {
                    echo "Unable to Delete Data";
                }
            }
            ?>
 </div>    <!-- Div Row Close Header -->
</div> <!-- Div Container fluid close from header -->
<?php
include('admininclude/footer.php');
?>