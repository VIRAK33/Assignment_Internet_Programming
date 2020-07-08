<?php


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/basic/favicon.ico" type="image/x-icon">
    <title>Assignment 3</title>
    <!-- CSS -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <div id="apple"></div>
    <div id="app" class="paper-loading">

        <div class="page-template-template-card">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <div class="container">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="card">
                                <header class="text-center">
                                    <h1 class="section-title">Create New Account</h1>
                                    <p class="section-subtitle">Join Our wonderful community and let others help you without a single penny</p>
                                </header>
                                <div class="icon">
                                    <img src="assets/img/icon/icon-join.png" alt="" />
                                </div>

                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" id="fname" name="first_name" onblur="check_fname()" class="form-control input-lg" placeholder="First Name" require="require" />
                                                <div id="fname_label"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="lname" id="lname" class="form-control input-lg" onblur="check_lname()" placeholder="Last Name" require="require" />
                                                <div id="lname_label"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="email" id="email" onblur="validateEmail();" class="form-control input-lg" require="require" placeholder="Email Address"
                                                />
                                                <div id="email_label"></div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="password" name="password" id="password" onblur="check_length()" class="form-control input-lg" required placeholder="Password" />
                                                <div id="password_label"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="password" name="confirm_password" id="confirm_password" onblur="compare_password()" class="form-control input-lg" required placeholder="Confirm Password"
                                                />
                                                <div id="con_password_label"></div>
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" id="btn_login" class="btn btn-success btn-lg btn-block" value="Create Account">
                                            <p class="forget-pass"><a href="signin.php">Already have an account.</a></p>
                                        </div>
                                        
                                    </div>

                            </div>
                        </div>
                    </div>
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
    

    </div>
    <!--End Page page_wrrapper -->
<script>



    $(document).ready(function(){
        $("#btn_login").click(function(){
            var email = $("#email").val();
            var password = $("#password").val();
            var confirm_password = $("#confirm_password").val();
            var pass_length = password.length;
            validateEmail();check_length();compare_password();check_fname(); check_lname();
 
            if(validateEmail()&&check_length()&&compare_password()&&check_fname()&& check_lname()){

                var fname =  $("#fname").val();
                var lname =   $("#lname").val();
                $.ajax({
                    type: 'POST',
                    data: {
                        action:'signup',
                        fname:fname,
                        lname:lname,
                        email:email,
                        password:password
                    },
                    url: 'authentication.php',
                    success: function (data) {

                        var status = Number(data);
                        if(status == 404){
                            $("#email_label").append("<span class='float-left' style='color:red'>This email already exist!</span>");
                        }else{
                            alert(data);
                            document.location.href = 'index.php';
                        }

                    }
                })
            }else{
                // console.log("False")
            }

            
        })
    })
    function validateEmail(){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test($("#email").val()) == false) 
        {
            $("#email_label").empty();
            $("#email_label").append("<span class='float-left' style='color:red'>Invalid Email Address</span>");
            return false;
        }
        $("#email_label").empty();
        return true;
    }
    function check_length(){
        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();
        // console.log(email +" " +password);
        var pass_length = password.length;
        if(pass_length < 4){
            $("#password_label").empty();
            $("#password_label").append("<span class='float-left' id='ms_pass' style='color:red'>Mimimum 4 character</span>")
            return false;
        }
        $("#password_label").empty();
        return true;
        
    }
    function compare_password(){
        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();
        if(password != confirm_password){
            $("#con_password_label").empty();
            $("#con_password_label").append("<span class='float-left' id='ms_pass' style='color:red'>Password doesn't match!</span>")
            return false;
        }
        $("#con_password_label").empty();
        return true;
        
    }
    function check_fname(){
        var fname = $("#fname").val();

        if(fname == ''){
            $("#fname_label").empty();
            $("#fname_label").append("<span class='float-left' id='ms_pass' style='color:red'>Required!</span>")
            return false;
        }
        $("#fname_label").empty();
        return true;
        
    }
    function check_lname(){
        var lname = $("#lname").val();
        if(lname == ''){
            $("#lname_label").empty();
            $("#lname_label").append("<span class='float-left' id='ms_pass' style='color:red'>Required!</span>")
            return false;
        }
        $("#lname_label").empty();
        return true;
        
    }


</script>

</body>

</html>