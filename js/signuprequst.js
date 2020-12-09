
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
            url: 'student/addstudent.php',
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
                    $("#successMsg").html("<small class='alert-success'>Registration Succesfully</small>");                
                }
                else if (data == "Failed") {
                    $("#successMsg").html("<small class='alert-danger'>Unable to Create Account</small>");
                }
            },
        });
    }
}