<?php
require_once '../includes/autoclassloader.inc.php';
if (isset($_POST['signinButton'])) {
    $auth = new User_authentication($_POST);
    $auth->validate_user();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Signin Template for Bootstrap</title>
    <style>
    .form-signin {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    body {
        background-image: url("../assets/images/welcome2.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        height: 100vh;
        position: relative;
    }

    .col-12 {
        padding: 0;
    }

    .inp {
        width: 20rem;
        height: 3rem;
    }

    .btn-sig {
        height: 3rem;
    }

    .navbar {
        background: #ffffffc7;
    }

    .form-signin {
        background: #ffffff7d;

    }

    .innerform {
        margin-left: 10px;
        margin-right: 10px;
    }
    </style>



</head>



<body>
    <div class="main-wrapper">
        <?php
        require_once '../includes/autoclassloader.inc.php';
        $navbar =  new Authnavbar();
        ?>
        <div class="container-fluid text-center">
            <form class="form-signin" action="signin.php" method="post">
                <div class="innerform">
                    <img class="mb-4" src="../assets/images/intahologo.png" alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                    <div class="form-group col-12">
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="inputEmail" name="email" class="form-control inp"
                            placeholder="Email address" required autofocus>
                    </div>
                    <div class="form-group col-12">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" name="password" class="form-control inp"
                            placeholder="Password" required>
                    </div>

                    <button class="btn btn-lg btn-success btn-block col-12 btn-sig" name="signinButton"
                        type="submit">Sign in</button>
                    <div class="form-group col-12">
                        <p>Don't have an account yet? <a href="signup.php">Signup</a></p>

                    </div>
                    <p class="mt-5 mb-3 text-muted col-12">&copy; 2020</p>
                </div>

            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>