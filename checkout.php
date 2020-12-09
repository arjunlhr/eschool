<?php
include('./dbconnection.php');
session_start();

if (!isset($_SESSION['stuLogEmail'])) {
    echo "<script> location.href= 'signuporlogin.php'</script>";
} else {
    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");
    $stuemail = $_SESSION['stuLogEmail'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="GENERATOR" content="Evrsoft First Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!-- My css -->
    <link rel="stylesheet" href="css/my.css">
    <title>Checkout</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 jumbotron ">
                <h3 class="text-center mb-5">Welcome to E-Learning Page</h3>
                <form method="POST" action="paymentsuccess.php">
                    <div class="form-group row">
                        <label for="ORDER_ID" class="col-md-4 col-form-label">Order ID</label>
                        <div class="col-md-8">
                             <input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo "ORDS" . rand(10000, 99999999) ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CUST_ID" class="col-md-4 col-form-label">Student Email</label>
                        <div class="col-md-8">
                            <input id="CUST_ID" tabindex="2" maxlength="12" size="25" name="CUST_ID" autocomplete="off" value="<?php if (isset($stuemail)) {echo $stuemail;}?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="TXN_AMOUNT" class="col-md-4 col-form-label">Amount</label>
                        <div class="col-md-8">
                            <input id="TXN_AMOUNT" tabindex="1" maxlength="20" size="20" name="TXN_AMOUNT" autocomplete="off" value="<?php if (isset($_POST['id'])) {echo $_POST['id']; } ?>">
                        </div>
                    </div>
                    <div class="text-center mb-4">
                        <input type="submit" value="Buy Now" class="btn btn-primary" onclick="">
                        <a href="./course.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
                <small class="alert alert-danger">Note: Complete Payment by Clicking Checkout Button</small>
            </div>
        </div>
    </div>


</body>

</html>