<?php
class Default_search extends Database
{
    private $data;
    public function __construct($postdata)
    {
        $this->data = $postdata;
    }

    public function landingpagesearch()
    {
        $location = $this->data['location'];
        $type = $this->data['propertyType'];
        $propertyStatus = $this->data['propertyStatus'];
        $sql = "SELECT * FROM property WHERE propertyLocation = '$location' AND propertyType = '$type' AND propertyStatus = '$propertyStatus'";
        $conn = $this->connect();
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            echo "No records founds";
        } else {
            while ($data = $result->fetch_array(MYSQLI_BOTH)) {
                echo $this->card(
                    $data["bedroomImageAd"],
                    $data["propertyId"],
                    $data['bedroomCount'],
                    $data['bathroomCount'],
                    $data['propertyName'],
                    $data['kitchen'],
                    $data['price']
                );
            }
        }
    }

    public function userdashboardsearch(){
        $sql = "SELECT * FROM property";
        $conn = $this->connect();
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            echo "No records founds";
        } else {
            while ($data = $result->fetch_array(MYSQLI_BOTH)) {
                echo $this->card(
                    $data["bedroomImageAd"],
                    $data["propertyId"],
                    $data['bedroomCount'],
                    $data['bathroomCount'],
                    $data['propertyName'],
                    $data['kitchen'],
                    $data['price']
                );
            }
        }
    }
    private function card($imagesource, $propertyid, $bedroomCount, $bathroomCount, $propertyName, $kitchen, $price)
    {
        if (isset($_SESSION['accountId'])) {
            $accountId = $_SESSION['accountId'];
            return '<div class="col-lg-6 col-xl-3 card m-2">
                    <img class="card-img-top" src="' . $imagesource . '" height = "300" alt="Card image cap">
                     <div class="card-body">
                    <h5 class="card-title">' . $propertyName . '</h5>                    
                    <p class="card-text">price: ' . $price . '<br>bedroomCount: ' . $bedroomCount . '<br>bathroomCount: ' . $bathroomCount . '<br>kitchen : ' . $kitchen . '</p>
                    <a href = "../pages/detailview.php?loggedStatus=true&propertyId=' . $propertyid . '&accountId=' . $accountId . '" class="btn btn-primary">View More</a>
                    </div>
                    </div>';
        } else {
            return '<div class="col-lg-6 col-xl-3 card m-2">
                    <img class="card-img-top" src="' . $imagesource . '" height = "300" alt="Card image cap">
                     <div class="card-body">                     
                   <h5 class="card-title">' . $propertyName . '</h5>                  
                    <p class="card-text">price: ' . $price . '<br>bedroomCount: ' . $bedroomCount . '<br>bathroomCount: ' . $bathroomCount . '<br>kitchen : ' . $kitchen . '</p>
                    <a href = "../pages/signin.php?loggedStatus=false&propertyId="' . $propertyid . '" class="btn btn-primary">View More</a>
                    </div>
                    </div>';
        }
    }
}