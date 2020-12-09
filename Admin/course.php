<?php
define('TITLE', 'Courses');
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
?>

<div class="col-md-9 mt-5">
    <!-- Table -->
    <p class="bg-dark text-white p-2 text-center">List of Courses</p>
    <?php 
        $sql = "SELECT * FROM course";
        $result = $conn->query($sql);
        if($result->num_rows > 0 ){
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Course Id</th>
                <th scope="col">Name</th>
                <th scope="col">Author</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()) { 
            echo '<tr>';
                echo '<th scope="row">'.$row["course_id"].'</td>';
                echo '<td scope="row">'.$row["course_name"].'</td>';
                echo '<td scope="row">'.$row["course_author"].'</td>';
                echo '<td>
                <form action="editcourse.php" method="POST" class="d-inline">
                    <input type="hidden" name="id" value='.$row["course_id"].'>
                    <button type="submit" class="btn btn-info mr-3" name="view" value="view"><i class="fas fa-pen"></i></button>
                </form>    
                <form action="" method="POST" class="d-inline">
                    <input type="hidden" name="id" value='.$row["course_id"].'>
                    <button type="submit" class="btn btn-secondary" name="delete" value="delete"><i class="far fa-trash-alt"></i></button>
                </form>
                </td>';   
            echo '</tr>';
         } ?> 
        </tbody>
    </table>
        <?php } else {
            echo '0 Result';

         // Sql query for delete operation   
           

        } ?>
</div>
</div>    <!-- Div Row Close Header -->

<div>
    <a href="addcourse.php" class="btn btn-danger box"><i class="fas fa-plus fa-1x"></i></a>
</div>
</div> <!-- Div Container fluid close from header -->

<?php
    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM course WHERE course_id ={$_REQUEST['id']}";
        if($conn->query($sql) == TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" \>';
        } else {
            echo "Unable to Delete";
        }
    } 
?>

<?php
include('admininclude/footer.php');
?>