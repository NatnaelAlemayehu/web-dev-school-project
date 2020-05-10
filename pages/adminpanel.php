<?php
session_start();
if (!isset($_SESSION['accountId'])) {
    header("Location: signin.php?error=notloggedin");
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
    .container {
        margin-top: 100px;
    }

    body {
        background-color: rgba(218, 218, 218, 0.938);
    }

    .card {
        display: inline-block;
        margin-right: 50px;
    }

    .number {
        font-size: 40px;
    }
    </style>
</head>

<body>
    <?php
    require_once '../includes/autoclassloader.inc.php';
    $navbar = new Authnavbar();
    ?>
    <div class="container">
        <?php
        require_once '../includes/autoclassloader.inc.php';
        $adminobject = new Admin_panel();
        ?>
    </div>

</body>

</html>