<?php include_once("navbar.php") ?>

<?php

$message = $_GET['msg'];

if (strlen($message) > 0) {
    echo "<div class='toast animated fadeInDown z-depth-3 white-text'>$message</div>";
    echo '<script>
          $(".toast").delay(2000).queue(function(next) {
            $(this).addClass("fadeOut");
          next();
        });
       </script>';
}

?>

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
                    <span class="card-title black-text">Login</span>

                    <form class="col-md-12" id="login-form" action="scripts/test_login.php" method="post">
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

                        <div class="divider-new"><p>Which are you?</p></div>

                        <div class="row text-center">

                            <div class="col-md-6">
                                <input id="radio1" type="radio" name="user_type" value="user">
                                <p> User</p>
                            </div>
                            <div class="col-md-6">
                                <input id="radio2" type="radio" name="user_type" value="company">
                                <p> Organization</p><br>
                            </div>

                        </div>
                        <div class="card-action text-right">
                            <button type="submit" value="submit" name="submit"
                                    class="btn btn-success waves-effect waves-light">Submit
                            </button>
                        </div>
                    </form>
                </div>


            </div>
            <p class="text-center white-text">Not a user? <a href="/register.php">Register here!</a></p>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
</body>
</html>

<script type="text/javascript">

    var button1 = $("#radio1");
    var button2 = $("#radio2");

    function checkRadios() {
        if (button1.is(':checked') || button2.is(':checked')) {
            $(".btn").text("Submit");
            $(".btn").removeClass("btn-danger");
            $(".btn").addClass("btn-success");
            $(".btn").removeAttr("disabled");
        }
        else {
            $(".btn").removeClass("btn-success");
            $(".btn").addClass("btn-danger");
            $(".btn").text("Select a user type");
            $(".btn").attr("disabled", "disabled");
        }
    }

    checkRadios();

    $("input").click(function () {
        checkRadios();
    });

</script>
