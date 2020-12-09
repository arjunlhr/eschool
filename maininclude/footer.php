<!-- Start Footer -->
<footer class="container-fluid bg-dark text-center p-2">
  <small class="text-white">Copyright &copy; 2020 || Designed By E-Learning ||
    <a href="" data-toggle="modal" data-target="#exampleModalCenteradmin" class="nav-link">Admin Login</a></small>
</footer>
<!-- End Footer -->

<!-- Start Student Registration -->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCentersignup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Student Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Start Student Registration Form -->
        <?php
        include('./studentregistration.php');
        ?>
        <!-- End Student Registration from -->

      </div>
      <div class="modal-footer">
        <small id="successMsg"></small>
        <button type="button" class="btn btn-primary" onclick="addstu()" id="signup">Sign Up</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Student Registration -->

<!-- Start Student login -->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenterlogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Student Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Start Student login Form -->
        <form>
          <div class="form-group">
            <i class="fas fa-envelope"></i><label for="useremail" class="pl-2 font-weight-bolder">Email</label>
            <input type="text" class="form-control" id="useremail" name="useremail" placeholder="email">
          </div>
          <div class="form-group ">
            <i class="fas fa-key"></i><label for="userpassword" class="pl-2 font-weight-bolder">Password</label>
            <input type="password" class="form-control" id="userpassword" placeholder="Password" name="userpassword">
          </div>
          <!-- end login Registration Form -->
        </form>
      </div>
      <div class="modal-footer">
        <small id="statuslogmsg"></small>
        <button type="button" class="btn btn-primary" onclick="checkStuLogin()">login</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End login Registration -->

<!-- Start admin login -->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenteradmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Admin Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Start admin login Form -->
        <form>
          <div class="form-group">
            <i class="fas fa-envelope"></i><label for="adminemail" class="pl-2 font-weight-bolder">Email</label>
            <input type="text" class="form-control" id="adminemail" name="adminemail" placeholder="email@example.com">
          </div>
          <div class="form-group">
            <i class="fas fa-key"></i><label for="adminpassword" class="pl-2 font-weight-bolder">Password</label>
            <input type="password" class="form-control" id="adminpassword" placeholder="Password" name="adminpassword">
          </div>
          <!-- end admin login Registration Form -->
        </form>
      </div>
      <div class="modal-footer">
        <small id="statusadminlogmsg"></small>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="checkadminLogin()">login</button>
      </div>
    </div>
  </div>
</div>
<!-- End admin login -->



<!-- Jquery and javascript -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Font Awesome -->
<script src="js/all.min.js"></script>

<!-- Student Sign up  -->
<script type="text/javascript" src="./js/ajaxrequest.js"></script>

<!-- Admin login up  -->
<script type="text/javascript" src="./js/adminajaxrequest.js"></script>


</body>
</html>