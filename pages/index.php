<?php
session_start();
if (isset($_POST['landingSearch'])) {
    $location = $_POST['location'];
    $type = $_POST['type'];
    $propertyStatus = $_POST['propertyStatus'];
    header("Location: searchresult.php?propertyStatus=$propertyStatus&propertyType=$type&location=$location");
}
?>
<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <style>
    select {
        min-width: 200px;
        background-color: #c6cdd0;
    }
    </style>



</head>

<body>

    <div class="main-wrapper">
        <?php
        require_once '../includes/autoclassloader.inc.php';
        $navbar = new Navbar();
        ?>
        <form class="search-form" action="index.php" method="POST">
            <div class="form-row no-gutters">
                <div class="form-group col-md-3">
                    <label>Type</label>
                    <select name="propertyType" required>
                        <option disabled selected value> preferred type </option>
                        <option value="apartment">Apartment</option>
                        <option value="villa">Villa</option>
                        <option value="smallhouse">Smallhouse</option>
                        <option value="condominium">Condominium</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Location</label>
                    <select name="location" required>
                        <option disabled selected value> preferred location </option>
                        <option value="bethel">Bethel</option>
                        <option value="torhailoch">Torhailoch</option>
                        <option value="mexico">Mexico</option>
                        <option value="piassa">Piassa</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Property Status</label>
                    <select name="propertyStatus" required>
                        <option disabled selected value> preferred status </option>
                        <option value="rent">Rent</option>
                        <option value="sale">Sale</option>
                    </select>
                </div>

                <div class="form-group col-md-3 search-button">
                    <button type="submit" name="landingSearch" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>

    <p class="text-center featured-title">Featured Properties</p>
    <div class="row d-flex justify-content-center card1-par-css">
        <div class="card col-md-3 card1-css" style="width: 18rem;">
            <img class="card-img-top" src="../assets/images/house1.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">House 1</h5>
                <p class="card-text">The house has stunning furnitutres and multiple bedrooms and bathrooms. It is
                    definaltely worth every penny.</p>
                <a href="signin.php" class="btn btn-primary">Check house</a>
            </div>
        </div>

        <div class="card col-md-3 card1-css" style="width: 18rem;">
            <img class="card-img-top" src="../assets/images/house2.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">House 2</h5>
                <p class="card-text">The house has stunning furnitutres and multiple bedrooms and bathrooms. It is
                    definaltely worth every penny</p>
                <a href="signin.php" class="btn btn-primary">Check house</a>
            </div>
        </div>

        <div class="card col-md-3 card1-css" style="width: 18rem;">
            <img class="card-img-top" src="../assets/images/house3.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">House 3</h5>
                <p class="card-text">The house has stunning furnitutres and multiple bedrooms and bathrooms. It is
                    definaltely worth every penny.</p>
                <a href="signin.php" class="btn btn-primary">Check house</a>
            </div>
        </div>
    </div>


    <div class="container-wrapper1">
        <p class="text-center featured-title">What we do</p>
        <div class="container1">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4">
                        <i class="flaticon-rent flat-medium text-primary" aria-hidden="true"></i>
                        <h5 class="text-secondary hover-text-primary py-3 m-0">Selling Service</h5>
                        <p>You can find quality houses at discounted rates on our platform. Search now.</p>
                        <a href="#" class="btn btn-primary">Read more</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4">
                        <i class="flaticon-rent flat-medium text-primary" aria-hidden="true"></i>
                        <h5 class="text-secondary hover-text-primary py-3 m-0">Selling Service</h5>
                        <p>You can find quality houses at discounted rates on our platform. Search now.</p>
                        <a href="#" class="btn btn-primary">Read more</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4">
                        <i class="flaticon-rent flat-medium text-primary" aria-hidden="true"></i>
                        <h5 class="text-secondary hover-text-primary py-3 m-0">Selling Service</h5>
                        <p>You can find quality houses at discounted rates on our platform. Search now.</p>
                        <a href="#" class="btn btn-primary">Read more</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4">
                        <i class="flaticon-rent flat-medium text-primary" aria-hidden="true"></i>
                        <h5 class="text-secondary hover-text-primary py-3 m-0">Selling Service</h5>
                        <p>You can find quality houses at discounted rates on our platform. Search now.</p>
                        <a href="#" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-wrapper2">
        <p class="text-center featured-title">How it works</p>
        <div class="container2">
            <div class="row how-it-works">
                <div class="col-lg-4 col-md-6">
                    <div class="pl-3 pr-3 mb-4 bg-white shadow-one rounded">
                        <i class="falticon-home flat-medium text-primary" aria-hidden="true"></i>
                        <h5 class="text-secondary py-2 mt-3 mb-2">Search Your Home</h5>
                        <p>
                            Select your home or appartment and let’s contact with us.
                            Ask what answer you need. You can also contact with the agent
                            if you have any question.
                            Select your home or appartment and let’s contact with us.
                            Ask what answer you need. You can also contact with the agent
                            if you have any question.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pl-3 pr-3 mb-4 bg-white shadow-one rounded">
                        <i class="falticon-home flat-medium text-primary" aria-hidden="true"></i>
                        <h5 class="text-secondary py-2 mt-3 mb-2">Search Your Home</h5>
                        <p>
                            Select your home or appartment and let’s contact with us.
                            Ask what answer you need. You can also contact with the agent
                            if you have any question.
                            Select your home or appartment and let’s contact with us.
                            Ask what answer you need. You can also contact with the agent
                            if you have any question.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pl-3 pr-3 mb-4 bg-white shadow-one rounded">
                        <i class="falticon-home flat-medium text-primary" aria-hidden="true"></i>
                        <h5 class="text-secondary py-2 mt-3 mb-2">Search Your Home</h5>
                        <p>
                            Select your home or appartment and let’s contact with us.
                            Ask what answer you need. You can also contact with the agent
                            if you have any question.
                            Select your home or appartment and let’s contact with us.
                            Ask what answer you need. You can also contact with the agent
                            if you have any question.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="footer">
        <div class="container">
            <div class="row text-center text-xs-center text-sm-left text-md-left">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quick links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Home</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>About</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quick links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Home</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>About</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quick links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Home</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>About</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                    <ul class="list-unstyled list-inline social text-center">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-envelope"></i></a>
                        </li>
                    </ul>
                </div>
                </hr>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                    <p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="#"
                            target="_blank">Inthao</a></p>
                </div>
                </hr>
            </div>
        </div>
    </section>


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