<?php 
class User_authentication extends Database{
    private $data;   
    public function __construct($postData)
    {
        $this->data = $postData;
    }

    public function validate_user(){
        $email = $this->data['email'];
        $password = $this->data['password'];             
        $adminboolean = $this->checkifadmin($email, $password);
        if ($adminboolean){
            session_start();
            $_SESSION['accountId'] = 1;   
            header("Location: ../pages/adminpanel.php");
        }else{
            $this->authenticate($email, $password);            
        }   
        
    }

    private function checkifadmin($email, $password){
        $sql = "SELECT * FROM adminaccount WHERE emailAddress = '$email' and adminPassword = '$password'";
        $conn = $this->connect();
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            return false;
        } else {
            return true;
        } 
    }

    private function authenticate($user_email, $user_password){
        $sql = "SELECT * FROM useraccount WHERE emailAddress = ?";
        $conn = $this->connect(); 
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../pages/signin.php?error=connectionerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, 's', $user_email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows == 0) {
                header("Location: ../pages/signin.php?error=noresultfound");
                exit();
            } else{
                if ($data = $result->fetch_array(MYSQLI_BOTH)) {
                    $trimmedusrpass = trim($user_password);
                    $pwdCheck = password_verify($trimmedusrpass, $data['accountPassword']);
                    if ($pwdCheck == false) {
                        header("Location: ../pages/signin.php?error=wrongpwd");
                        exit();
                    } else if ($pwdCheck == true) {
                        session_start();
                        $_SESSION['accountId'] = $data['accountId'];                        
                        header("Location: ../pages/userdashboard.php?loggedStatus=true");
                        exit();
                    }
                }
            }                  
        }
    }
}