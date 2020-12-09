<?php
define('TITLE', 'Feedback');
define('PAGE', 'feedback');
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
    <p class="bg-dark text-white text-center p-2">List of Feedback</p>
    <?php
    $sql = "SELECT * FROM feedback";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo  '<table class="table">
                <thead>
                    <th scope="col">Feedback Id</th>
                    <th scope="col">Content</th>
                    <th scope="col">Student Id</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td scope="row">' . $row["f_id"] . '</td>';
            echo '<td scope="row">' . $row["f_content"] . '</td>';
            echo '<td scope="row">' . $row["stu_id"] . '</td>';
            echo '<td><form action="" method="POST" class="d-inline"> <input type="hidden" 
                        name="id" value='.$row["f_id"].'> 
                        <button type="submit" class="btn btn-danger" name="delete" 
                        value="delete"><i class="far fa-trash-alt"></i></button></form></td>
            </tr>';
        }
        echo '</tbody>
                    </table>';
    } else {
        echo "0 Result";
    }


    ?>
</div>
<?php
    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM feedback WHERE f_id = {$_REQUEST['id']}";
        if ($conn->query($sql) === TRUE){
            echo '<meta http-equiv="refresh" content="0; URL=? deleted"/>';
        } else {
            echo "Unable to Delete Data";
        }
    }
include('admininclude/footer.php');
?>