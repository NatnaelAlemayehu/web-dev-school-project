<?php
session_start();
if (!isset($_SESSION['accountId'])) {
    header("Location: signin.php?error=notloggedin");
}
?>
<?php
require_once '../includes/autoclassloader.inc.php';

if (isset($_POST['registerProperty'])) {
    if ($_SESSION['accountId']) {
        $validator = new Property_registration($_POST);
        $validator->register();
    } else {
        header("Location: signin.php?error=notloggedin");
    }
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
        width: 80%;
        margin: auto;
        margin-top: 60px;
    }

    body {
        background-color: rgba(218, 218, 218, 0.938);
    }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-secondary">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signin.html">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.html">Sign Up</a>
                    </li>
                </ul>
            </div>
        </nav>

        <form class="main-form" action="property_registration.php" method="POST" enctype='multipart/form-data'>
            <div class="form-row">
                <div class="form-group col-md-4 m-auto">
                    <label>Location</label>
                    <select class="form-control" name="location" required>
                        <option value="bethel">Bethel</option>
                        <option value="torhailoch">Torhailoch</option>
                        <option value="mexico">Mexico</option>
                        <option value="piassa">Piassa</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4 m-auto">
                    <label>Your Property Name</label>
                    <input type="text" class="form-control" name="propertyName"
                        placeholder="Ex. Luxurious Villa at Mexico" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4 m-auto">
                    <label>property type</label>
                    <select class="form-control" name="propertyType" required>
                        <option value="apartment">Apartment</option>
                        <option value="villa">Villa</option>
                        <option value="smallhouse">Smallhouse</option>
                        <option value="condominium">Condominium</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4 m-auto">
                    <label>property status</label>
                    <select class="form-control" name="propertyStatus" required>
                        <option value="rent">Rent</option>
                        <option value="sale">Sale</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4 m-auto">
                    <label>Short Summary about the property</label>
                    <textarea type="text" class="form-control" name="description"
                        placeholder="short description (2000 characters max)" cols="30" rows="5" required></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4 m-auto">
                    <label>price</label>
                    <input type="number" class="form-control" name="price" placeholder="price" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4 m-auto">
                    <label>Kitchen</label>
                    <select class="form-control" name="kitchen" required>
                        <option value="fully-equiped">fully-equiped</option>
                        <option value="few materials">few materials</option>
                        <option value="no materials">no materials</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4 m-auto">
                    <label>bedroom count</label>
                    <input type="number" class="form-control" name="bedroomCount" placeholder="bedroom count" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 m-auto">
                    <label>bathroom count</label>
                    <input type="number" class="form-control" name="bathroomCount" placeholder="bathroom count"
                        required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4 m-auto">
                    <label>bedroom picture</label>
                    <input type="file" name='bedroomPicture' required>
                </div>
            </div>

            <div class=" form-row">
                <div class="form-group col-md-4 m-auto">
                    <label>bathroom picture</label>
                    <input type="file" name='bathroomPicture' required>
                </div>
            </div>

            <button type="submit" name="registerProperty" value="Submit"
                class="btn btn-outline-info col-4 btn-sign btn-block ml-auto mr-auto mt-3">Register Property</button>
        </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>