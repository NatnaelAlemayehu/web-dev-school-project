<?php
class User_registration extends Database {
    private $data;
    public function __construct($postdata){
        $this->data = $postdata;
    }
    public function register(){        
        $this->userexisits();
    }
    private function userexisits(){
        $conn = $this->connect();
        $useremail = $this->data['emailAddress'];
        $query = "SELECT emailAddress FROM useraccount WHERE emailAddress = '$useremail'";
        $result = $conn->query($query);
        if ($result->num_rows == 0) {
            if ($this->passwordmatch(trim($this->data['password']), trim($this->data['repeatpassword']))){
                $this->getpostdata();
            }else{
                header("Location: ../pages/signup.php?error=passwordnotacceptable");
            }
        } else {
            header("Location: ../pages/signup.php?error=useralreadyexists");
        }        
    }
    private function passwordmatch($userpassword, $reapeatpassword){
        if (strlen($userpassword) >= 8 and strlen($reapeatpassword) >= 8 and $userpassword === $reapeatpassword){
            return true;
        }else{
            return false;
        }
    }
    private function getpostdata(){      
        $firstname = trim($this->data['firstName']);
        $lastname = trim($this->data['lastName']);
        $email = trim($this->data['emailAddress']);
        $phonenumber = trim($this->data['phoneNumber']);
        $location = trim($this->data['location']);
        $dateofBirth = trim($this->data['dateofBirth']);
        $userpassword = trim($this->data['password']);      
        $userId = $this->pushuserdata($firstname, $lastname, $phonenumber, $dateofBirth, $location); 
        $ppstatus = 0;
        $accounttype = 0;  
        $this->pushaccountdata($userId, $email, $userpassword, $ppstatus, $accounttype);        
    }
    private function pushuserdata($f_name, $l_name, $phone, $dateofBirth, $location){
        $sql = "INSERT INTO users (firstName, lastName, phoneNumber, dateOfBirth, userLocation)
                VALUES (?, ?, ?, ?, ?)";                
        $conn = $this->connect();       
        $stmt = mysqli_stmt_init($conn);        
        if (mysqli_stmt_prepare($stmt, $sql)) {                              
            mysqli_stmt_bind_param($stmt, 'sssss', $f_name, $l_name, $phone, $dateofBirth, $location);
            if (mysqli_stmt_execute($stmt)){
                $userId = mysqli_insert_id($conn);                
                return $userId;
            }            
        } else {
            header("Location: ../pages/signup.php?registration=failed");
        }    
    }

    private function pushaccountdata($userId, $email, $userpassword, $ppstatus, $accounttype){
        $sql = "INSERT INTO useraccount (userId, emailAddress, accountPassword, profilePictureStatus, accountType)
                VALUES (?, ?, ?, ?, ?)";
        $hasedpassword = password_hash($userpassword, PASSWORD_DEFAULT);
        $conn = $this->connect();
        $stmt = mysqli_stmt_init($conn);        
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 'issis', $userId, $email, $hasedpassword, $ppstatus, $accounttype);           
            if (mysqli_stmt_execute($stmt)){
                $accountId = mysqli_insert_id($conn);
                $_SESSION['accountId'] = $accountId;
                header("Location: ../pages/userdashboard.php?registration=successful&accountId={$accountId}&loggedStatus=true");
            }
        } else {
            header("Location: ../pages/signup.php?registration=failed");
        }    
    }
}