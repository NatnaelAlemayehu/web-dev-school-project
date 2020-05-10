<?php
session_start();
if (!isset($_SESSION['accountId'])) {
    header("Location: signin.php?error=notloggedin");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>


    <style>
    p {
        font-family: Arial !important;
    }

    #rentprice {
        display: none;
    }

    #saleprice {
        display: none;
    }
    </style> <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../assets/css/searchresult.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="wrapper">
        <nav id="sidebar" class="pt-5 mt-5">
            <div id="dismiss"><i class="fas fa-arrow-left"></i></div>
            <div class="px-3">
                <div class="list-group list-group-flush px-2">
                    <form action="userdashboard.php" method="POST">
                        <div class="form-group"><label for="exampleFormControlSelect1">Property Type</label>
                            <select class="form-control" name="propertyType" required>
                                <option disabled selected value> preferred type </option>
                                <option value="apartment">Apartment</option>
                                <option value="villa">Villa</option>
                                <option value="smallhouse">Smallhouse</option>
                                <option value="condominium">Condominium</option>
                            </select>
                        </div>
                        <div class="form-group"><label for="exampleFormControlSelect1">Location</label>
                            <select class="form-control" name="location" required>
                                <option disabled selected value>preferred location</option>
                                <option value="bethel">Bethel</option>
                                <option value="torhailoch">Torhailoch</option>
                                <option value="mexico">Mexico</option>
                                <option value="piassa">Piassa</option>
                            </select>
                        </div>
                        <div class="form-group"><label for="exampleFormControlSelect1">Property Status</label>
                            <select class="form-control" name="propertyStatus" id="propertyStatus"
                                onchange="pricefunction()" required>
                                <option disabled selected value>select an option</option>
                                <option value="rent">rent</option>
                                <option value="sale">sale</option>
                            </select>
                        </div>

                        <div class="form-group" id="rentprice">
                            <label for="exampleFormControlSelect1">Max Price(Birr)</label>
                            <select class="form-control" name="rentPrice">
                                <option disabled selected value> select max price </option>
                                <option value="1500">1000</option>
                                <option value="3000">3000</option>
                                <option value="5000">5000</option>
                                <option value="7000">7000</option>
                                <option value="10000">10,000</option>
                            </select>
                        </div>

                        <div class="form-group" id="saleprice">
                            <label for="exampleFormControlSelect1">Max Price (Birr)</label>
                            <select class="form-control" name="salePrice">
                                <option disabled selected value> select max price </option>
                                <option value="300000">300,000</option>
                                <option value="700000">700,000</option>
                                <option value="1000000">1,000,000</option>
                                <option value="2000000">2,000,000</option>
                                <option value="5000000">5,000,000</option>
                                <option value="15000000">15,000,000</option>
                            </select>
                        </div>
                        <div class="form-group"><label for="exampleFormControlSelect1">Min bedroom
                                number</label>
                            <select class="form-control" name="bedroomCount" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group"><label for="exampleFormControlSelect1">Min bathroom
                                number</label>
                            <select class="form-control" name="bathroomCount" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <button type="submit" name="searchButton"
                            class="btn btn-primary btn-sign btn-block ml-auto mr-auto mt-3">Search</button>
                    </form>
                </div>
        </nav>

        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <div class="container-fluid"><button type="button" id="sidebarCollapse" class="btn btn-info"><i
                            class="fas fa-align-left"></i><span>Search by Filter</span></button><button
                        class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><i
                            class="fas fa-align-justify"></i></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active"><a class="nav-link" href="../index.php">Home <span
                                        class="sr-only">(current)</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="property_registration.php">Register
                                    property</a></li>
                            <li class="nav-item"><a class="nav-link" href="signout.php">Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="row px-3 py-5">
                <?php require_once '../includes/autoclassloader.inc.php';
                if (isset($_POST['searchButton'])) {
                    $search = new Search_query($_POST);
                    $search->search();
                } else {
                    $search = new Default_search($_POST);
                    $search->userdashboardsearch();
                }

                ?>
            </div>
        </div>
    </div>
    <div class="overlay"></div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                }

            );

            $('#dismiss, .overlay').on('click', function() {
                    $('#sidebar').removeClass('active');
                    $('.overlay').removeClass('active');
                }

            );

            $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').addClass('active');
                    $('.overlay').addClass('active');
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                }

            );
        }

    );

    function pricefunction() {
        var x = document.getElementById("propertyStatus").value;
        if (x == "rent") {
            document.getElementById("rentprice").style.display = "inline";
            document.getElementById("saleprice").style.display = "none";
        } else {
            document.getElementById("saleprice").style.display = "inline";
            document.getElementById("rentprice").style.display = "none";
        }
    }
    </script>
</body>

</html>