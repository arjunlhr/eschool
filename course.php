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

<!-- Start Most Popular Course -->
<div class="container mt-5">
  <h1 class="text-center">All Courses</h1>
  <div class="row mt-4">
    <?php
    $sql = "SELECT * from course";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $course_id = $row['course_id'];
        echo '
          <div class="col-md-4">
          <a href="coursedetails.php?course_id=' . $course_id . '" class="btn" style="text-align: left; padding:0px; margin: 0px;">
            <div class="card">
              <img src="' . str_replace('..', '.', $row['course_img']) . '" alt="" class="card-img-top" width="128" height="200">
              <div class="card-body">
                <h5 class="card-title text-dark">' . $row['course_name'] . '</h5>
                <p class="card-text text-dark">' . $row['course_desc'] . '</p>
              </div>
            <div class="card-footer">
              <p class="card-text d-inline text-dark">Price:<small><del>' . $row['course_original_price'] . '</del></small>
                <span class="font-weight-bolder">' . $row['course_price'] . '</span></p> <a class="btn
                 btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id=' . $course_id . '">Enroll</a>
            </div>
           </div>
         </a>
         </div>';
      }
    }
    ?>
  </div>

</div>
<!-- End Most Popular course -->

<!-- Include Footer -->
<?php
include('./maininclude/footer.php');
?>