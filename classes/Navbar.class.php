<?php
class Navbar{
    public function __construct()
    {
      echo '
      <nav class="navbar fixed-top navbar-expand-lg navbar-light nav-background">
            <img class="navbar-brand" height = "50px" src="../assets/images/intahologo.png" />
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                    </li>';                    
                        if (isset($_SESSION['accountId'])) {
                        echo '<li class="nav-item"><a class="nav-link" href="signout.php">Sign Out</a></li>';
                        } else {
                            echo '<li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a></li>
                        <li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>';
                        }                            
                    echo '
                    </ul>
                    </div>
                    </nav>
                    ';
}
}
?>