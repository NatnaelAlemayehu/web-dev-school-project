<?php

class Property_detail_view extends Database{

    protected $propertyId;
    protected $accountId;
    public function __construct($property_id, $account_id)
    {
        $this->propertyId = $property_id;
        $this->accountId = $account_id;
        $this->display_property_detail($this->propertyId);
    }   

    private function display_property_detail($propertyId){
        $sql = "SELECT * FROM property WHERE propertyId = '$propertyId'";
        $conn = $this->connect();
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            echo "No records founds";
        } else {
            while ($data = $result->fetch_array(MYSQLI_BOTH)) {
                echo $this->card(
                    $data["bedroomImageAd"],
                    $data['bathroomImageAd'],
                    $data["propertyId"],
                    $data['bedroomCount'],
                    $data['bathroomCount'],
                    $data['propertyName'],
                    $data['kitchen'],
                    $data['propertyDescription']
                );
            }
        }
    }

    private function card($bedroomimage, $bathroomimage, $propertyid, $bedroomCount, $bathroomCount, $propertyName, $kitchen, $description)
    {
        if ($_SESSION['accountId']) {
            $accountId = $this->accountId;
            return '<div class="row">
            <div class="column">
                <img src="' . $bedroomimage . '" alt="bedroom" style="width:100%" onclick="myFunction(this);">
            </div>
            <div class="column">
                <img src="' . $bathroomimage . '" alt="bathroom" style="width:100%" onclick="myFunction(this);">
            </div>  
            </div>

            <div class="container">           
            <img id="expandedImg" style="width:60%">
            <div id="imgtext"></div>
            </div>
            <div class="text">
            <h5 class="card-title">' . $propertyName . '</h5>
            <p class="card-text">bedroomCount: ' . $bedroomCount . '<br> bathroomCount: ' . $bathroomCount . '<br>kitchen : ' . $kitchen . '</p>
            <P> Description: ' . $description . '</p>
            <a href = "../pages/bookrequest.php?loggedStatus=true&propertyId=' . $propertyid . '&accountId=' . $accountId . '" class="btn btn-primary">Book Visit Request</a>
            </div>
            ';
            
        } else {
           header("Location: ../pages/signin.php");
        }
    }

    
}
?>