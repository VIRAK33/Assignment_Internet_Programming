<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/basic/favicon.ico" type="image/x-icon">
    <title>Assignment 3</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>

<div id="app" class="paper-loading">
<main>
    <div id="primary" class="p-t-b-100 height-full ">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="text-center">
                        <img src="assets/img/dummy/u5.png" alt=""/>
                        <h2>Welcome Back</h2>
                        <p class="p-t-b-20">Hey Soldier welcome back signin now there is lot of new stuff
                            waiting for you</p>
                    </div>

                    <div class="form-group has-icon">
                        <i class="icon-envelope-o"></i>
                        <input type="text" name="email" onblur="validateEmail(this);" id="email" class="form-control input-lg"
                                placeholder="Email Address"/>
                        <div id="email_label"></div>
                    </div>
                    
                    <div class="form-group has-icon" >
                        <i class="icon-user-secret"></i>
                        <input type="password" name="password" onblur="checkPassEmpty()" id="password" class="form-control input-lg"
                                placeholder="Password"/>
                        <div id="password_label"></div>
                            
                    </div>
                    <input type="submit" id="btn_login" class="btn btn-success btn-lg btn-block" value="Log In">
                    <p class="forget-pass"><a href="signup.php">Doesn't have an account yet?</a> </p>


                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>
</div>
<!--End Page page_wrrapper -->
<script src="assets/js/app.js"></script>
<script>
    $(document).ready(function(){
        $("#btn_login").click(function(){
            var email = $("#email").val();
            var password = $("#password").val();
            var pass_length = password.length;

            if(validateEmail() && checkPassEmpty()){
                $.ajax({
                    type: 'POST',
                    data: {
                        action:'login',
                        email:email,
                        password:password
                    },
                    url: 'authentication.php',
                    success: function (data) {
                        var status = Number(data);
                        if(status == 404){
                            $("#password_label").empty();
                            $("#password_label").append("<span class='float-left' id='ms_pass' style='color:red'>Email or Password invalid. Try again!</span>")
                        }else if(status == 405){
                            $("#password_label").empty();
                            $("#password_label").append("<span class='float-left' id='ms_pass' style='color:red'>Incorrect password!</span>")
                        }else if(status == 200){
                            document.location.href = 'index.php';
                        } else {
                            $("#password_label").empty();
                            $("#password_label").append("<span class='float-left' id='ms_pass' style='color:red'>Incorrect password!</span>")
                        }
                    }
                })
            }
        })
    })
    function validateEmail(){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if($("#email").val() == ''){
            $("#email_label").empty();
            $("#email_label").append("<span class='float-left' id='ms_pass' style='color:red'>Required!</span>")
        }else{
            if (reg.test($("#email").val()) == false) 
            {
                $("#email_label").empty();
                $("#email_label").append("<span class='float-left' style='color:red'>Invalid Email Address</span>");
                return false;
            }
            $("#email_label").empty();
            return true;
        }

    }
    function checkPassEmpty(){
        if($("#password").val() == ''){
            $("#password_label").empty();
            $("#password_label").append("<span class='float-left' id='ms_pass' style='color:red'>Required!</span>")
            return false;
        }else{
            $("#password_label").empty();
            return true;
        }
    }

</script>
</body>
</html>