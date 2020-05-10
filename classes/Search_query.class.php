<?php

class Search_query extends Database
{
    private $data;
    public function __construct($postdata)
    {
        $this->data = $postdata;
    }
    public function search()
    {
        if (isset($this->data['propertyStatus'])){
            if($this->data['propertyStatus'] == "rent"){
                $this->rentpropertysearch();                
            }else if($this->data['propertyStatus'] == "sale") {
                $this->salepropertysearch();              
            } 
        }       
        
    }
    private function rentpropertysearch()
    {
        $location = $this->data['location'];
        $type = $this->data['propertyType'];        
        $status= $this->data['propertyStatus'];
        $rentprice = $this->data['rentPrice'];
        $bedroomCount = $this->data['bedroomCount'];
        $bathroomCount = $this->data['bathroomCount']; 
        $this->queryallproperties($location, $type, $status, $bedroomCount, $bathroomCount, $rentprice);

    }

    private function salepropertysearch(){
        $location = $this->data['location'];
        $type = $this->data['propertyType'];       
        $status = $this->data['propertyStatus'];
        $saleprice = $this->data['salePrice'];
        $bedroomCount = $this->data['bedroomCount'];
        $bathroomCount = $this->data['bathroomCount'];
        $this->queryallproperties($location, $type, $status, $bedroomCount, $bathroomCount, $saleprice);
    }    
    
    private function queryallproperties($location, $type, $status, $bedroomCount, $bathroomCount, $givenprice){
        $sql = "SELECT * FROM property WHERE propertyLocation = '$location' AND propertyType = '$type' AND price <= $givenprice AND propertyStatus = '$status' AND bedroomCount >= $bedroomCount AND bathroomCount >= $bathroomCount ORDER BY price DESC";
        // $sql = "SELECT * FROM property WHERE propertyLocation = '$location'";
        $conn = $this->connect();
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            echo "Couldn't find properties that meet all criteria";          
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
                    <h5 class="card-title">'.$propertyName. '</h5>                    
                    <p class="card-text">price: ' . $price . '<br>bedroomCount: '.$bedroomCount.'<br>bathroomCount: '.$bathroomCount.'<br>kitchen : '.$kitchen.'</p>
                    <a href = "../pages/detailview.php?loggedStatus=true&propertyId=' . $propertyid . '&accountId=' . $accountId . '" class="btn btn-primary">View More</a>
                    </div>
                    </div>';
        } else {
            return '<div class="col-lg-6 col-xl-3 card m-2">
                    <img class="card-img-top" src="' . $imagesource . '" height = "300" alt="Card image cap">
                     <div class="card-body">                     
                   <h5 class="card-title">' . $propertyName . '</h5>                  
                    <p class="card-text">price: ' . $price . '<br>bedroomCount: ' . $bedroomCount . '<br>bathroomCount: ' . $bathroomCount . '<br>kitchen : ' . $kitchen . '</p>
                    <a href = "../pages/signin.php?loggedStatus=false&propertyId="'.$propertyid.'" class="btn btn-primary">View More</a>
                    </div>
                    </div>';
        }
    }  

    
}