<?php

include('./dbconnection.php');
include('./maininclude/header.php');



?>

<div class="container">
	<div class="row mt-3">
		<div class="col-md-12">
			<?php
			if (isset($_POST['ORDER_ID']) && isset($_POST['TXN_AMOUNT'])) {
				$order_id = $_POST['ORDER_ID'];
				$stu_email = $_SESSION['stuLogEmail'];
				$course_id = $_SESSION['course_id'];
				$status = "Success";
				$respmsg = "Txn_success";
				$amount = $_POST['TXN_AMOUNT'];
				$date = date("Y/m/d");
				$sql = "INSERT INTO courseorder (order_id,stu_email,course_id, status, respmsg, amount, order_date) VALUES ('$order_id','$stu_email','$course_id','$status','$respmsg','$amount','$date')";
				if ($conn->query($sql) == TRUE) {
					echo '<h3 class="text-success mt-5 text-center d-print-none"> Your Transaction has been Successfully ! Thank You For Purchase this Course</h3>';
					$sql = "SELECT * from courseorder where stu_email= '$stu_email'";
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
					}	
				}
			} else {
				echo "<b>Transaction status is failure</b>" . "<br/>";
			}
			?>
		</div>
	</div>
</div>
</div>