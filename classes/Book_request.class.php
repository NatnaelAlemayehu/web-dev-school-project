<?php

class Book_request extends Database{
    protected $data;
    
    public function __construct($postdata){
        $this->data = $postdata;             
    }

    public function book_visit_request(){
        $this->visit_request();
    }
    
    private function visit_request(){        
        $dateandTime= $this->data['dateTime'];        
        $pickupLocation = $this->data['pickupLocation'];
        $accountId = $this->data['accountId'];
        $propertyId = $this->data['propertyId'];
        $preferedride = $this->data['preferedride'];   
        $this -> book_request($accountId ,$propertyId, $dateandTime, $pickupLocation, $preferedride);
        }
    
    private function book_request($accountId, $propertyId, $dateandTime, $pickupLocation, $preferedride){

        $sql = "INSERT INTO visitrequest (accountId, propertyId, dateandTime, pickupLocation, preferedRide)
                VALUES (?, ?, ?, ?, ?)";
        $conn = $this->connect();
        $stmt = mysqli_stmt_init($conn);        
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 'iisss', $accountId, $propertyId, $dateandTime, $pickupLocation, $preferedride);            
            if (mysqli_stmt_execute($stmt)) {                
                header("Location: ../pages/bookrequest.php?booking=successful");
            }
        } else {
            header("Location: ../pages/bookrequest.php?booking=failed");
        }       
    }
}