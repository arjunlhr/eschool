<?php
include('./dbconnection.php');
include('./maininclude/header.php');
?>
<div class="container-fluid bg-dark">
    <!-- Start Course Page -->
    <div class="row">
        <img src="./img/courses.png" alt="courses" style="height:300px; width:100%; object-fit:cover; box-shadow:10px;" />
    </div>
</div> <!-- End Course Page -->

<div class="container jumbotron mb-5">
    <div class="row">
        <div class="col-md-5">
            <h5 class="mb-5">If Already Registered Please Login</h5>
            <form action="" method="POST">
                <div class="form-group">
                    <i class="fas fa-envelope"></i><label for="useremail" class="pl-2 font-weight-bolder">Email</label>
                    <input type="text" class="form-control" id="useremail" name="useremail" placeholder="email">
                </div>
                <div class="form-group ">
                    <i class="fas fa-key"></i><label for="userpassword" class="pl-2 font-weight-bolder">Password</label>
                    <input type="password" class="form-control" id="userpassword" placeholder="Password" name="userpassword">
                </div>
                <button type="button" class="btn btn-primary" onclick="checkStuLogin()">login</button>               <!-- end login Registration Form -->
            </form><br>
            <small id="statuslogmsg"></small>
        </div>
        <div class="col-md-6 offset-md-1">
            <h5 class="mb-3">New User !! Sign Up </h5>
            <form id="studentform" action="" method="POST">
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="stuname" class="pl-2 font-weight-bolder">Name</label> <small id="statusmsg1"></small>
                    <input type="text" class="form-control" id="stuname" name="stuname" placeholder="name" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-envelope"></i><label for="stuemail" class="pl-2 font-weight-bolder">Email</label><small id="statusmsg2"></small>
                    <input type="text" class="form-control" id="stuemail" name="stuemail" placeholder="email" required>
                </div>
                <div class="form-group ">
                    <i class="fas fa-key"></i><label for="stupass" class="pl-2 font-weight-bolder">Password</label><small id="statusmsg3"></small>
                    <input type="password" class="form-control" id="stupass" name="stupass" placeholder="Password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </div>
                <button type="button" class="btn btn-primary" name="signup" id="signup" onclick="addstu()">Sign Up</button>
            </form>
            <small id="successMsg"></small>
        </div>
    </div>
</div>
<?php
include('./maininclude/footer.php');
?>