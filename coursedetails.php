<!-- Include header -->
<?php
include('./dbconnection.php');
include('./maininclude/header.php');
?>

<!-- Start All Course Banner -->
<div class="container-fluid mt-5">
    <div class="row">
        <img src="img/courses.png" alt="courses" style="width: 100%; height: 400px; object-fit:cover;">
    </div>
</div>
<!-- End All course Banner -->

<!-- Start Main Content -->
<div class="container mt-5">

<?php
    if(isset($_GET['course_id'])){
        $course_id = $_GET['course_id'];
        $_SESSION['course_id'] = $course_id;
        $sql = "SELECT * FROM course where course_id='$course_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
?>
    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo str_replace('..', '.', $row['course_img'])?>" class="card-img-top">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Course Name: <?php echo $row['course_name']?> </h5>
                <p class="card-text">Description: <?php echo $row['course_desc'] ?> </p>
                <p class="card-text">Course Duration: <?php echo $row['course_duration'] ?> </p>
                <form action="checkout.php" method="POST">
                    <P class="card-text d-inline">Price: <small><del><?php echo $row['course_original_price']?></del></small><span class="text-weight-bolder ml-2"><?php echo $row['course_price'] ?></span></P>
                    <input type="hidden" name="id" value=" <?php echo $row['course_price'] ?>">
                    <button type="submit" class="btn btn-primary text-white font-weight-bolder float-right" name="buy">Buy Now</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Main Content -->

<div class="container">
    <div class="row">
    <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Lesson No.</th>
                    <th scope="col">Lesson Name</th>
                </tr>
            </thead>
            <tbody>
        <?php
            $sql = "SELECT * FROM lession";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $num =0;
                while($row = $result->fetch_assoc()){
                    if($course_id==$row['course_id']){
                    $num++;
                 echo   '<tr>
                    <td scope="row">'.$num.'</td>
                    <td scope="row">'.$row['lession_name'].'</td>
                </tr>';
                    } 
                }
            }
        ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Footer section -->
<?php
include('./maininclude/footer.php');
?>