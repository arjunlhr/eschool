<!-- Include header -->
<?php
define('TITLE', 'Payment Status');
define('PAGE', 'paymentstatus');
if(!isset($_SESSION)){
    session_start();
}

include('stuinclude/header.php');
include('../dbconnection.php');

if(isset($_SESSION['is_login'])){
    $stuemail = $_SESSION['stuLogEmail'];
} else {
    echo "<script> location.href='../index.php';  </script>";
}
?>


<!-- Start Main Content -->
<div class="col-md-9">
    <h2 class="text-center my-4">Payment Status</h2>
    <form action="" method="POST" class="d-print-none">
        <div class="form-group row">
            <label class="offset-sm-3 col-form-label font-weight-bold">Order Id: </label>
            <div>
                <input type="text" class="form-control mx-3" name="order_id" id="order_id">
            </div>
            <div>
                <input type="submit" class="btn btn-primary mx-4" value="View" name="view" id="view"><br>
            </div>
        </div>
        <small class="text-danger">*Any queries realted to transaction contact us please</small>

    </form>
    <?php
    if (isset($_REQUEST['view'])) {
        $order_id = $_REQUEST['order_id'];
        $sql = "SELECT * from courseorder where order_id= '$order_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo '<p class="bg-dark text-white p-2 mt-4 text-center">Payment Details</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Course ID</th>
                            <th scope="col">Student Email</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($row = $result->fetch_assoc()) {
                echo  '<tr>
                            <th scope="row">' . $row["order_id"] . '</th>
                            <td>' . $row["course_id"] . '</td>
                            <td>' . $row["stu_email"] . '</td>
                            <td>' . $row["status"] . '</td>
                            <td>' . $row["order_date"] . '</td>
                            <td>' . $row["amount"] . '</td>
                        </tr>';
            }
            echo '<tr>
                    <td> <form class="d-print-none"> <input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></form></td>
                    </tr></body>
                </table>';
        } else {
            echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'>No Recods Found !</div>";
        }
    }
    ?>
</div>
<!-- End Main Content -->


<!-- Include Footer -->
<?php
include('stuinclude/footer.php');
?>