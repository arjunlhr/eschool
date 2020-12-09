$(document).ready(function () {
    // Ajax call from already exits email verification 
    $("#stuemail").on("keypress blur", function(){
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stuemail = $("#stuemail").val();
        $.ajax({
            url: 'student/stuemailcheck.php',
            method: 'POST',
            data: {
                checkemail: "checkmail",
                stuemail: stuemail,
            },
            success: function (data) {
                if (data != 0) {
                    $("#statusmsg2").html(
                        '<small style="color:red;">Emaild Id already exits</small>'
                    );
                    $("#stusignup").attr("disabled", true);
                } else if (data == 0 && reg.test(stuemail)) {
                    $("#statusmsg2").html(
                        '<small style="color:green;">There You go !</small>'
                    );
                    $("#stusignup").attr("disabled", false);
                } else if (!reg.test(stuemail)) {
                    $("#statusmsg2").html(
                        '<small style="color:red;">Please Enter Valid Email e.g. example@gmail.com</small>'
                    );
                    $("#stusignup").attr("disabled", false);
                } if (stuemail == "") {
                    $("#statusmsg2").html(
                        '<small style="color:red;">Please Enter Email</small>'
                    );

                }
            },
        });

    });
});


function addstu(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();

    // Checking form fields on submission

    if (stuname.trim() == "") {
        $("#statusmsg1").html(
            '<small style="color: red;">Field Cant Empty !</small>'
        );
        $("#stuname").focus();
        return false;
    } else if (stuemail.trim() == "") {
        $("#statusmsg2").html(
            '<small style="color: red;">Field Cant Empty !</small>'
        );
        $("#stuemail").focus();
        return false;
    } else if (stuemail.trim() != "" && !reg.test(stuemail)) {
        $("#statusmsg2").html(
            '<small style="color: red;">Please Enter Valid Email  !</small>'
        );
        $("#stuname").focus();
        return false;
    }
    else if (stupass.trim() == "") {
        $("#statusmsg3").html(
            '<small style="color: red;">Field Cant Empty !</small>'
        );
        $("#stupass").focus();
        return false;
    } else {

        $.ajax({
            url: './student/addstudent.php',
            method: 'POST',
            dataType: 'json',
            data: {
                stusignup: "stusignup",
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass,
            },
            success: function (data) {
                console.log(data);
                if (data == "OK") {
                    $("#successMsg").html("<span class='alert-success' id='regsuccess'>Registration Succesfully</span>");
                    clearfields();
                }
                else if (data == "Failed") {
                    $("#successMsg").html("<span class='alert-danger'>Unable to Create Account</span>");
                }
            },
        });
    }
}

// Empty all fields 
function clearfields() {
    $("#studentform").trigger("reset");
    $("#statusmsg1").html("");
    $("#statusmsg2").html("");
    $("#statusmsg3").html("");

}

// Student Login Verification

function checkStuLogin() {
    var stuLogEmail = $("#useremail").val();
    var stuLogPass = $("#userpassword").val();

    $.ajax({
        url: "student/stulogin.php",
        method: "POST",
        data: {
            checkLogEmail: "checklogmail",
            stuLogEmail: stuLogEmail,
            stuLogPass: stuLogPass,
        },
        success: function (data) {
            if (data == 0) {
                $('#statuslogmsg').html('<small class="alert-danger">Invalid Email or Password</small>');
            } else if (data == 1) {
                $('#statuslogmsg').html('<div class="spinner-border text-success role="status"></div>');
                setTimeout(() => {
                    window.location.href = "index.php";
                }, 1000);
            };
        }
    })
}


