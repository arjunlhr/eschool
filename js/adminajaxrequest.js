// Admin Login
function checkadminLogin(){
    var adminLogEmail = $("#adminemail").val();
    var adminLogPass = $("#adminpassword").val();
  
    $.ajax({
        url: "Admin/adminlogin.php",
        method: "POST",
        data: {
            checkadminLogEmail: "checkadminlogmail",
            adminLogEmail: adminLogEmail,
            adminLogPass: adminLogPass,
        },
         success: function(data){
             if (data == 0){
                 $('#statusadminlogmsg').html( '<small class="alert-danger">Invalid Email or Password</small>');
             } else if (data == 1 ){
              $('#statusadminlogmsg').html('<small class="alert-success">Success</small>') ; 
             setTimeout(()=>{
                 window.location.href="Admin/admindashboard.php";
             }, 1000);
         }
        },
    });
}