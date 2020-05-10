<?php
class Property_registration extends Database
{
    private $data;
    public function __construct($postdata)
    {
        $this->data = $postdata;
    }
    public function register()
    {
        $this->getpostdata();
    }
    private function getpostdata()
    {
        $location = strtolower($this->data['location']);
        $propertyType = strtolower($this->data['propertyType']);
        $propertyStatus = strtolower($this->data['propertyStatus']);
        $price = $this->data['price'];
        $bedroomCount = $this->data['bedroomCount'];
        $bathroomCount = $this->data['bathroomCount'];
        $propertyName = $this->data['propertyName'];
        $kitchen = $this->data['kitchen'];
        $description = $this->data['description'];
        $accountId = $_SESSION['accountId'];        
        $propertyId = $this->pushdata($accountId, $location, $propertyType, $propertyStatus, $price, 
                    $bedroomCount, $bathroomCount, $propertyName, $kitchen, $description);        
        if ($propertyId){
            $this->uploadbedroompic($propertyId);
            $this->uploadbathroompic($propertyId);
            header("Location: ../pages/userdashboard.php?loggedStatus=true");
        }        
    }
    private function pushdata($accountId, $location, $propertyType, $propertyStatus, $price, $bedroomCount, $bathroomCount, $propertyName, $kitchen, $description)
    {
        $sql = "INSERT INTO property (accountId, propertyLocation, propertyType, propertyStatus, price, bedroomCount, bathroomCount, propertyName, kitchen, propertyDescription)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $conn = $this->connect();
        $stmt = mysqli_stmt_init($conn);
        // $stmt = $this->connect()->prepare($sql);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 'isssiiisss', $accountId, $location, $propertyType, $propertyStatus, $price, $bedroomCount, $bathroomCount, $propertyName, $kitchen, $description);
            if (mysqli_stmt_execute($stmt)){
                $propertyId = mysqli_insert_id($conn);
                return $propertyId;           
            }else{
                header("Location: ../pages/signup.php?registration=uploadfunctionfailed");   
            }          
        } else {
            header("Location: ../pages/signup.php?registration=faiiledpushdatafunction");
        }
    }

    private function uploadbedroompic($propertyId){
            
            $file = $_FILES['bedroomPicture'];

            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            // $fileType = $file['type'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));         
            
            $allowed = array('jpg', 'jpeg', 'png');
            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 1000000000) {
                        $fileNameNew = "profile". $fileExt[0].".".$fileActualExt;
                        $filedestination = '../uploads/' . $fileNameNew;
                        move_uploaded_file($fileTmpName, $filedestination);
                        $sql = "UPDATE property SET bedroomImageAd = '$filedestination' WHERE propertyId = $propertyId";
                        $conn = $this->connect();
                        mysqli_query($conn, $sql);
                        // header("Location: index.php?upload=success");
                    } 
                    // else {
                    //     echo "file size big";
                    // }
                } 
                // else {
                //     echo "Error uploading file";
                // }
            } 
            // else {
            //     echo "Unsupported file format";
            // }
        }


    private function uploadbathroompic($propertyId){

        $file = $_FILES['bathroomPicture'];

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        // $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 5250000) {
                    $fileNameNew = "profile" . $fileExt[0] . "." . $fileActualExt;
                    $filedestination = '../uploads/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $filedestination);
                    $sql = "UPDATE property SET bathroomImageAd = '$filedestination' WHERE propertyId = $propertyId";
                    $conn = $this->connect();
                    mysqli_query($conn, $sql);
                    // header("Location: index.php?upload=success");
                }
                // else {
                //     echo "file size big";
                // }
            }
            // else {
            //     echo "Error uploading file";
            // }
        } 
            // else {
            //     echo "Unsupported file format";
            // }
    } 
}