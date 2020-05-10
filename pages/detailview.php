<?php
session_start();
if (!isset($_SESSION['accountId'])) {
    header("Location: signin.php?error=notloggedin");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail View</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial;
        overflow-x: hidden;
        background-color: rgb(195, 216, 219);
    }

    /* The grid: Four equal columns that floats next to each other */
    .column {
        float: left;
        width: 25%;
        padding: 10px;
        /* margin-left: 200px; */
    }

    /* Style the images inside the grid */
    .column img {
        opacity: 0.8;
        cursor: pointer;
    }

    .column img:hover {
        opacity: 1;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* The expanding image container */
    .container {
        position: relative;
        display: none;
    }

    /* Expanding image text */
    #imgtext {
        position: absolute;
        bottom: 15px;
        left: 15px;
        color: white;
        font-size: 20px;
    }

    /* Closable button inside the expanded image */
    .closebtn {
        position: absolute;
        top: 10px;
        right: 15px;
        color: white;
        font-size: 35px;
        cursor: pointer;
    }

    .row {
        margin-top: 100px;

        margin-left: 100px;
    }

    .text {
        margin-left: 100px;
    }

    @media only screen and (max-width: 700px) {
        .text {
            margin-left: 10px;
        }
    }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light nav-background">
            <img class="navbar-brand" height="50px" src="../assets/images/intahologo.png" />
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signout.php">Sign Out</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="cards">
            <?php
            include '../includes/autoclassloader.inc.php';
            if ($_GET['loggedStatus']) {
                if ($_GET['loggedStatus'] == "false") {
                    header("Location: signin.php?error=notloggedin");
                } elseif ($_GET['loggedStatus'] == "true") {
                    $prop = new Property_detail_view($_GET['propertyId'], $_SESSION['accountId']);
                }
            } else {
                header("Location: signin.php?error=notloggedin");
            }
            ?>
        </div>
    </div>


    <script>
    function myFunction(imgs) {
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        expandImg.src = imgs.src;
        imgText.innerHTML = imgs.alt;
        expandImg.parentElement.style.display = "block";
    }
    </script>
</body>

</html>