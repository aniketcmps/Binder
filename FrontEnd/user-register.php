<?php include_once("navbar.php") ?>

<!DOCTYPE html>
<html>
<head>
</head>

<body class="blue-grey darken-4">
<div class="container">
    <div class="row animated fadeInUp">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card white darken-1">
                <div class="card-content">
                    <span class="card-title black-text">Register a new user</span>

                    <form class="col-md-12" id="register-form" action="scripts/register-user.php"
                          enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="input-field col-md-6">
                                <input id="first_name" type="text" class="validate text-black" name="fname">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col-md-6">
                                <input id="last_name" type="text" class="validate text-black" name="lname">
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col-md-12">
                                <input id="email" type="email" class="validate text-black" name="email">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col-md-12">
                                <input id="password" type="password" class="validate text-black" name="password">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col-md-12">
                                <input id="password-confirm" type="password" class="validate text-black">
                                <label for="password">Confirm Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="profile">Upload Profile Picture</label>
                                <input type="file" name="profile"/>
                            </div>
                        </div>


                </div>
                <div class="card-action text-right">
                    <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function () {
        $("#password").keyup(validate);
        $("#password-confirm").keyup(validate);
    });


    function validate() {
        var password1 = $("#password").val();
        var password2 = $("#password-confirm").val();


        if (password1 != password2) {
            $(".btn").removeClass("btn-success");
            $(".btn").addClass("btn-danger");
            $(".btn").text("Passwords don't match");
            $(".btn").attr("disabled", "disabled");
        }
        else {
            $(".btn").text("Submit");
            $(".btn").removeClass("btn-danger");
            $(".btn").addClass("btn-success");
            $(".btn").removeAttr("disabled");
        }

    }

</script>
