<?php
require_once '../includes/autoclassloader.inc.php';

if (isset($_POST['signup-button'])) {
    $validator = new User_registration($_POST);
    $validator->register();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .main-form {
        width: 50%;
        margin: auto;
        margin-top: 80px;
    }

    body {
        background-image: url("../assets/images/welcome2.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        /* height: 100vh; */
        position: relative;
        font-weight: bold;
    }

    .innerform {
        background: #ffffff7d;

    }

    .innerform {
        margin-left: 10px;
        margin-right: 10px;
    }

    .navbar {
        background: #ffffffc7;
    }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <?php
        // require_once '../includes/autoclassloader.inc.php';
        $navbar = new Authnavbar();
        ?>
        <form class="main-form" action="signup.php" method="POST">
            <div class="innerform">
                <div class="form-row">
                    <div class="form-group col-md-4 m-auto">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstName" placeholder="First Name"
                            value="<?php echo (isset($_POST['signup-button']))  ? htmlspecialchars($_POST['firstName']) : '' ?>"
                            required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 m-auto">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastName" placeholder="Last Name"
                            value="<?php echo (isset($_POST['signup-button']))  ? htmlspecialchars($_POST['lastName']) : '' ?>"
                            required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 m-auto">
                        <label>Email</label>
                        <input type="email" class="form-control" name="emailAddress" placeholder="Email"
                            value="<?php echo (isset($_POST['signup-button']))  ? htmlspecialchars($_POST['emailAddress']) : '' ?>"
                            required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4 m-auto">
                        <label>Phone Number</label>
                        <input type="tel" class="form-control" name="phoneNumber" placeholder="Ex. 0923101010"
                            pattern="[0-9]{10}"
                            value="<?php echo (isset($_POST['signup-button']))  ? htmlspecialchars($_POST['phoneNumber']) : '' ?>"
                            required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 m-auto">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" name="dateofBirth" placeholder="date of birth"
                            value="<?php echo (isset($_POST['signup-button']))  ? htmlspecialchars($_POST['dateofbirth']) : '' ?>"
                            required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4 m-auto">
                        <label>Address</label>
                        <input type="text" class="form-control" name="location" placeholder="Eg. Nyarutarama, Kigali"
                            value="<?php echo (isset($_POST['signup-button']))  ? htmlspecialchars($_POST['location']) : '' ?>"
                            required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 m-auto">
                        <label>Password (Minimum 8 characters required)</label>
                        <input type="password" class="form-control" name="password" placeholder="Password"
                            value="<?php echo (isset($_POST['signup-button']))  ? htmlspecialchars($_POST['password']) : '' ?>"
                            required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 m-auto">
                        <label>Repeat Password</label>
                        <input type="password" class="form-control" name="repeatpassword" placeholder="Repeat password"
                            value="<?php echo (isset($_POST['signup-button']))  ? htmlspecialchars($_POST['repeatpassword']) : '' ?>"
                            required>
                    </div>
                </div>

                <button type="submit" name="signup-button" value="submit"
                    class="btn btn-success col-4 btn-sign btn-block ml-auto mr-auto mt-3">Sign
                    Up</button>
                <div class="row">
                    <div class="col-md-4 m-auto">
                        <p>Already have an account? <a href="signin.php">Sign In</a></p>

                    </div>
                </div>
            </div>
        </form>
    </div>


    </div>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>