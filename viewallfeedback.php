<!-- Include header -->
<?php
include('./dbconnection.php');
include('./maininclude/header.php');
?>


<div class="container">
    <h3 class="mt-5 text-center">Student's Feedback</h3>
    <div class="row">
        <?php
        $sql = "SELECT * FROM feedback";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center bg-dark text-white">
                            <h4 class="card-title"><?php echo $row['stu_name']?></h4>
                            <p class="card-text"> <?php echo $row['f_content']?></p>
                        </div>
                    </div>
                </div>
        <?php
            }
        }

        ?>
    </div>
</div>
<!-- Include Footer -->
<?php
include('./maininclude/footer.php');
?>