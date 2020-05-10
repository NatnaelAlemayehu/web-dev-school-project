<?php
session_start();
if (!isset($_SESSION['accountId'])){
    header("Location: signin.php?error=notloggedin");
}
?>
<?php
include '../includes/autoclassloader.inc.php';
if (isset($_GET['loggedStatus'])) {
    if ($_GET['loggedStatus'] == "false") {
        header("Location: ../pages/signin.php?loggedStatus=false");
    }
}
if (isset($_POST['bookrequest'])) {
    $request = new Book_request($_POST);
    $request->book_visit_request();
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Request</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    body {
        overflow-x: hidden;
    }

    .main-form {
        width: 80%;
        margin: auto;
        /* margin-top: 60px; */
    }

    /* body {
        background-color: rgba(218, 218, 218, 0.938);
    } */

    /* .confirm-main {
        background: #4ea3c3c9;
    } */

    .main-wrapper {
        background-image: url("../assets/images/mainbg.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        height: 100vh;
        position: relative;
    }

    .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 17px;
        /* font-weight: bold; */
        font-family: Verdana, Tahoma, sans-serif;
    }

    .navbar {
        background-color: #ffffffe8;
    }

    /* .paragraph {
        margin-top: 150px;
    } */
    </style>

<body>
    <?php
    require_once '../includes/autoclassloader.inc.php';
    $navbar = new Authnavbar();
    ?>
    <div class="main-wrapper">
        <div class="container">
            <div class="row col-md-6 m-auto">
                <p>Before you buy or start renting the property. You need to be able to visit the property and see if it
                    meets your need. And we will give you a free ride to where your property is located. Only if you are
                    interested the property will you be charged.
                </p>
            </div>


            <form class="main-form" action="bookrequest.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-4 m-auto">
                        <label>Date and preferred time</label>
                        <input type="datetime-local" class="form-control" name="dateTime" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 m-auto">
                        <label>Prefered pickuplocation</label>
                        <input type="text" class="form-control" name="pickupLocation"
                            placeholder="Prefered pickuplocation" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 m-auto">
                        <label>Preferred Ride provision service</label>
                        <select class="form-control" name="preferedride" required>
                            <option value="ride">Ride</option>
                            <option value="personal transport">Personal Transport</option>
                            <option value="zayride">Zayride</option>
                        </select>
                    </div>
                </div>

                <input type="hidden" name="propertyId"
                    value="<?php echo (isset($_GET['loggedStatus']))  ? htmlspecialchars($_GET['propertyId']) : '' ?>">

                <input type="hidden" name="accountId"
                    value="<?php echo (isset($_GET['loggedStatus']))  ? htmlspecialchars($_GET['accountId']) : '' ?>">

                <button type="submit" name="bookrequest" value="submit"
                    class="btn btn-success col-4 btn-sign btn-block ml-auto mr-auto mt-3" onclick="myFunction()">Sign
                    Up</button>

                <div class="form-row">
                    <div class="form-group col-md-4 m-auto">
                        <p class="confirmation" id="confirm">
                            <?php echo (isset($_GET['booking']))  ? "Successfully Booked You will receive a call soon." : '' ?>
                        </p>
                    </div>

                </div>

            </form>
        </div>
    </div>
</body>

</html>