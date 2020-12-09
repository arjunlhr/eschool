<?php
define('TITLE', 'Payment Status');
define('PAGE', 'adminpaymentstatus');
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

<div class="col-md-8 mt-5">
	<h2 class="text-center text-success">Transaction status query</h2>
	<form action="" method="POST">
		<div class="form-group row mt-3 justify-content-center">
			<label for="order_id">Enter Order Id : </label>
			<div>
				<input class="form-control" id="order_id" name="order_id">
			</div>
			<div>
				<input type="submit" class="btn btn-primary mx-4" value="View" name="view" id="view"><br>
			</div>
		</div>
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

<?php
	include('admininclude/footer.php');
?>