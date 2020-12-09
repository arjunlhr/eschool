<?php
include('./dbconnection.php');
include('./maininclude/header.php');
?>
<!-- Start Video Background -->
<div class="container-fluid remove-video-margin">
  <div class="video-parent">
    <video playsinline autoplay loop muted>
      <source src="video/Welcome.mp4">
    </video>
    <div class="video-overlay"></div>
  </div>
</div>
<!-- End Video Background -->

<!-- Start Text Banner -->
<div class="container-fluid bg-danger">
  <div class="row">
    <div class="col-sm-2 col-md-3 text-white">
      <h5> <i class="fas fa-book"></i> 100+ Courses</h5>
    </div>
    <div class="col-sm-2 col-md-3 text-white">
      <h5> <i class="fa fa-users"></i> Expert Instructors</h5>
    </div>
    <div class="col-sm-2 col-md-3 text-white">
      <h5> <i class="fa fa-keybord-0"></i> Lifetime Access</h5>
    </div>
    <div class="col-sm-2 col-md-3 text-white">
      <h5> <i class="fas fa-rupee-sign"></i> MoneyBack Gurantee</h5>
    </div>
  </div>
</div>
<!-- End Text Banner -->

<!-- Start Most Popular Course -->
<div class="container mt-5">
  <h1 class="text-center">Popular Courses</h1>
  <!-- Start Most Popular Card Desk 1 -->
  <div class="card-deck mt-4">
    <?php
    $sql = "SELECT * from course LIMIT 3";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $course_id = $row['course_id'];
        echo '
          <a href="coursedetails.php?course_id=' . $course_id . '" class="btn" style="text-align: left; padding:0px; margin: 0px;">
            <div class="card">
              <img src="' . str_replace('..', '.', $row['course_img']) . '" alt="" class="card-img-top">
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
         </a>';
      }
    }
    ?>
  </div>
  <!-- End Most Populart Card Desk 1 -->
  <!-- start 2nd card Desk -->
  <div class="card-deck mt-4">

    <?php
    $sql = "SELECT * from course LIMIT 3,3";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $course_id = $row['course_id'];
        echo '
          <a href="coursedetails.php?course_id=' . $course_id . '" class="btn" style="text-align: left; padding:0px; margin: 0px;">
            <div class="card">
              <img src="' . str_replace('..', '.', $row['course_img']) . '" alt="" class="card-img-top">
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
         </a>';
      }
    }
    ?>


  </div>
  <!-- End 2nd Card Desk -->
  <div class="text-center float-right m-2">
    <a href="course.php" class="btn btn-danger btn-sm">View All Courses</a>
  </div>
</div>
<!-- End Most Popular course -->

<!-- Start Feedback Detail -->
<?php
include('./mainfeedback.php');
?>
  <div class="text-center float-right mr-5">
    <a href="viewallfeedback.php" class="btn btn-danger btn-sm">View All Feedback's</a>
  </div>
<!-- End Feedback Details -->

<!-- Start Contact Us  -->
<?php
include('./contactus.php');
?>
<!-- End Contact Us -->

<!-- Start Follow us section -->
<div class="container-fluid bg-dark mt-1  ">
  <div class="row">
    <div class="col-md-3">
      <a href="#" class="text-white social-hover"><i class="fab fa-facebook-f mr-2"></i>Facebook</a>
    </div>
    <div class="col-md-3">
      <a href="#" class="text-white social-hover"><i class="fab fa-whatsapp mr-2"></i>Whatsapp</a>
    </div>
    <div class="col-md-3">
      <a href="#" class="text-white social-hover"><i class="fab fa-twitter mr-2"></i>Twitter</a>
    </div>
    <div class="col-md-3">
      <a href="#" class="text-white social-hover"><i class="fab fa-instagram mr-2"></i>Instagram</a>
    </div>
  </div>
</div>
<!-- end follow us section -->

<!-- Start About Section -->
<div class="container-fluid mt-2">

  <div class="container">
    <div class="row text-center">

      <div class="col-sm">
        <h5>About Us</h5>
        <p>eSchool Provides Universal Access to the World's best eduction, partnering with top univrsities and organization to offer course online</p>
      </div>

      <div class="col-sm">
        <h5>Category</h5>
        <a href="#" class="text-dark">Web Development</a> <br>
        <a href="#" class="text-dark">Machine Learning</a> <br>
        <a href="#" class="text-dark">Web Designing</a> <br>
        <a href="#" class="text-dark">Android App Development</a> <br>
        <a href="#" class="text-dark">Data Analysis</a> <br>
        <a href="#" class="text-dark">ios Developments</a>
      </div>

      <div class="col-sm">
        <h5>Contact Us</h5>
        <p>eSchool Pvt Ltd <br> Near Bibi-ka-maqbara <br>Phone: +919923601376 <br>Mail: arjunlhr820@gmail.com</p>
      </div>

    </div>
  </div>
</div>
<!-- End About Section -->

<!-- Footer section -->
<?php
include('./maininclude/footer.php');
?>