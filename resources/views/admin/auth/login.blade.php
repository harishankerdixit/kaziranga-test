<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaziranga Admin</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="/admin/auth/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <div id="login_page">
        <div class="form_container">
            <div class="login_card">
                <h2>Kaziranga Admin</h2>
                <div class="formTag">

                    <div class="mt-3" id="hide_email_div">
                        <input type="email" name="email" id="username" placeholder="Email Address" required>
                    </div>
                    <div id="hide_pass_div">
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div id="mobile_otp_div" class="d-none">
                        <input type="number" name="number" id="number" placeholder="Enter Your Number.." required>
                    </div>
                    <div id="verify_otp_div" class="d-none">
                        <input type="number" name="otp" id="otp" placeholder="Enter Valid 4 Digits Number.."
                            required>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-check" style="margin-left: 22px;" id="remember_div">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1"> &nbsp;Remember me </label>
                        </div>
                        <div class="col-sm-4 form-check" style="margin-left:125px;" id="login_otp_div">
                            <input type="checkbox" class="form-check-input otp_checkbox" id="otp_checkbox"
                                onchange="loginWithOtp('otp');">
                            <label class="form-check-label" for="exampleCheck1"> &nbsp;Login With OTP </label>
                        </div>
                        <div class="col-sm-4 form-check d-none" style="margin-left:125px;" id="login_with_gmail_div">
                            <input type="checkbox" class="form-check-input" id="otp_checkbox_email"
                                onchange="loginWithOtp('email');">
                            <label class="form-check-label" for="exampleCheck1"> &nbsp;Login With Email </label>
                        </div>
                    </div>


                    <span class="mb-3" id="login_error_messagess"
                        style="color:red; display:flex; justify-content:center;"></span>
                    <span class="mb-3" id="otp_error_messages"
                        style="color:red; display:flex; justify-content:center;"></span>
                    <button type="submit" onclick="loginUser('email');" id="email_sign_in">Sign In With Email</button>
                    <button type="submit" class="d-none" onclick="loginUser('otp');" id="otp_sign_in">Sign In With
                        OTP</button>
                    <button type="submit" class="d-none" onclick="loginUser('verify');" id="verify_otp_sign_in">Verify
                        OTP</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function loginUser(val) {
            if (val == 'email') {
                console.log("if" + val);

                var email = $('#username').val();
                var password = $('#password').val();

                if (email == '' || password == '') {
                    $("#login_error_messagess").html('All Fileds Are Required!!').fadeIn(2000).fadeOut(5000);
                    return;
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ route('adminLogin') }}',
                    data: JSON.stringify({
                        'email': email,
                        'password': password
                    }),
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response.validation_errors);
                        if (response.status == 'success') {
                            console.log('ttt');
                            window.location.href = '/dashboard';
                        } else if (response.status == 'failed') {
                            $("#login_error_messagess").html('Wrong Credentials!!!!').fadeIn(2000).fadeOut(
                                5000);
                        } else {
                            console.log("some error occur!!");
                        }
                    },
                    error: function(error) {
                        var errorMessage = "An error occurred.";
                        if (error.responseJSON && error.responseJSON.message) {
                            errorMessage = error.responseJSON.message;
                        } else if (error.statusText) {
                            errorMessage = error.statusText;
                        }
                        $("#login_error_messagess").html(errorMessage).fadeIn(2000).fadeOut(5000);
                    }
                });

            } else if (val == 'verify') {
                var otp = $('#otp').val();

                if (otp == '' || otp.length < 4 || otp.length > 4) {
                    $("#otp_error_messages").html('Enter Valid 4 Digit OTP!!').fadeIn(2000).fadeOut(5000);
                    return;
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ route('verifyAdminLoginWithOtp') }}',
                    data: JSON.stringify({
                        'otp': otp
                    }),
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response.validation_errors);
                        if (response.status == 'success') {
                            console.log(response.status);

                            window.location.href = '/dashboard';
                        } else if (response.status == 'failed') {
                            $("#otp_error_messages").html('Wrong OTP!!').fadeIn(2000).fadeOut(5000);
                        } else {
                            console.log("some error occur!!");
                        }
                    },
                    error: function(error) {
                        var errorMessage = "An error occurred.";
                        if (error.responseJSON && error.responseJSON.message) {
                            errorMessage = error.responseJSON.message;
                        } else if (error.statusText) {
                            errorMessage = error.statusText;
                        }
                        $("#otp_error_messages").html(errorMessage).fadeIn(2000).fadeOut(5000);
                    }
                });


            } else {
                console.log("else" + val);

                var number = $('#number').val();

                if (number == '' || number.length < 10 || number.length > 10) {
                    $("#otp_error_messages").html('Enter Valid 10 Digit Mobile Number!!').fadeIn(2000).fadeOut(5000);
                    return;
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ route('adminLoginWithOtp') }}',
                    data: JSON.stringify({
                        'number': number
                    }),
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response.validation_errors);
                        if (response.status == 'success') {
                            console.log(response.status);
                            console.log("aa gya");
                            $("#mobile_otp_div").removeClass("d-block").addClass("d-none");
                            $("#otp_sign_in").removeClass("d-block").addClass("d-none");
                            $("#verify_otp_div").removeClass("d-none").addClass("d-block");
                            $("#verify_otp_sign_in").removeClass("d-none").addClass("d-block");

                            // return;
                            // window.location.href = '/dashboard';
                        } else if (response.status == 'failed') {
                            $("#otp_error_messages").html('Wrong Number!!').fadeIn(2000).fadeOut(5000);
                        } else {
                            console.log("some error occur!!");
                        }
                    },
                    error: function(error) {
                        var errorMessage = "An error occurred.";
                        if (error.responseJSON && error.responseJSON.message) {
                            errorMessage = error.responseJSON.message;
                        } else if (error.statusText) {
                            errorMessage = error.statusText;
                        }
                        $("#otp_error_messages").html(errorMessage).fadeIn(2000).fadeOut(5000);
                    }
                });
            }
        }

        function loginWithOtp(val) {
            var checkboxes = document.getElementsByClassName("otp_checkbox");

            for (var i = 0; i < checkboxes.length; i++) {
                var checkbox = checkboxes[i];

                if (checkbox.checked && val == "otp") {
                    $("#hide_email_div").hide();
                    $("#hide_pass_div").hide();
                    $("#remember_div").hide();
                    $("#login_otp_div").hide();
                    $("#otp_sign_in").removeClass("d-none").addClass("d-block");
                    $("#email_sign_in").addClass("d-none");
                    $("#login_with_gmail_div").removeClass("d-none").addClass("d-block");
                    $("#mobile_otp_div").removeClass("d-none").addClass("d-block");
                    checkbox.checked = false;
                } else {
                    $("#hide_email_div").show();
                    $("#hide_pass_div").show();
                    $("#remember_div").show();
                    $("#login_otp_div").show();
                    $("#otp_sign_in").addClass("d-none");
                    $("#email_sign_in").removeClass("d-none").addClass("d-block");
                    $("#email_otp_div").addClass("d-block").removeClass("d-none");
                    $("#mobile_otp_div").removeClass("d-block").addClass("d-none");
                    $("#login_with_gmail_div").removeClass("d-block").addClass("d-none");
                    checkbox.checked = false;
                }
            }
        }
    </script>
</body>

</html>
