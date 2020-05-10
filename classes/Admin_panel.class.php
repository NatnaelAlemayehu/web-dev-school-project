<?php
class Admin_panel extends Database
{
    public function __construct()
    {
        $this->admin_query();
    }

    public function admin_query()
    {
        $this->database_query();
    }

    private function database_query()    {
     

        $conn = $this->connect();
        
        
        $query1 = "SELECT COUNT(accountId) as accountNum FROM useraccount";
        $query2 = "SELECT COUNT(propertyId) as propertyNum FROM property";
        $query3 = "SELECT * FROM visitrequest INNER JOIN useraccount ON visitrequest.accountId = useraccount.accountId
         INNER JOIN users ON users.userId = visitrequest.accountId ORDER BY visitRequestId DESC LIMIT 10";
        $query4 = "SELECT * FROM property ORDER BY propertyId DESC LIMIT 10";
        $query5 = "SELECT COUNT(visitRequestId) as visitNum FROM visitrequest";
        

        $result1 = $conn->query($query1);
        if ($result1->num_rows == 0) {
            echo "No accounts created.";
        } else {
            while ($data = $result1->fetch_array(MYSQLI_BOTH)) {
                echo '<div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Number of users registered</h5>                           
                            <p class="card-text number">' . $data['accountNum'] . '</p>                            
                        </div>
                     </div>';                
            }
        }

        $result2 = $conn->query($query2);
        if ($result2->num_rows == 0) {
            echo "No properties registered.";
        } else {
            while ($data = $result2->fetch_array(MYSQLI_BOTH)) {
                echo '<div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Number of Properties registered</h5>                           
                            <p class="card-text number">' . $data['propertyNum'] . '</p>                           
                        </div>
                     </div>';                               
            }
        }

        $result5 = $conn->query($query5);
        if ($result5->num_rows == 0) {
            echo "No properties registered.";
        } else {
            while ($data = $result5->fetch_array(MYSQLI_BOTH)) {
                echo '<div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Number of Visit Request Booking</h5>                           
                            <p class="card-text number">' . $data['visitNum'] . '</p>                           
                        </div>
                     </div>';
                echo "<br><br>";
            }
        }

        $result3 = $conn->query($query3);
        if ($result3->num_rows == 0) {
            echo "No book requests made founds";
        } else {
            echo '<b>Below are 10 recent visit request bookings</b><br>';     
            echo '<table class="table table-striped">' . '<tr>' . '<th>First Name</th>' . '<th>Phone Number</th>' . '<th>Date and Time</th>' . '<th>Pickup Location</th>' . '<th>Prefered Ride</th></tr>';
            while ($data = $result3->fetch_array(MYSQLI_BOTH)) {
                echo '<tr>'
                    . '<td>' . $data['firstName'] . '</td>'
                    . '<td>' . $data['phoneNumber'] . '</td>'
                    . '<td>' . $data['dateandTime'] . '</td>'
                    . '<td>' . $data['pickupLocation'] . '</td>'
                    . '<td>' . $data['preferedRide'] . '</td>'
                    // . '<td><a href ="edit_records?ID=' . $data['propertyId'] . '&uidUsers=' . $data['accountId'] . '">Edit Record </a></td>'
                    . '</tr>';
            }            
            echo '</table>';
            echo '<br>';
        }
        
        $result4 = $conn->query($query4);
        if ($result4->num_rows == 0) {
            echo "No book requests made founds";
        } else { 
            echo '<b>Below are 10 recently registered properties</b><br>';           
            echo '<table class="table table-striped">' . '<tr>' . '<th>Property Type</th>' . '<th>Property Location</th>' . '<th>Property Status</th>' . '<th>Price</th>'.'</tr>';
            while ($data = $result4->fetch_array(MYSQLI_BOTH)) {
                echo '<tr>'
                    . '<td>' . $data['propertyType'] . '</td>'
                    . '<td>' . $data['propertyLocation'] . '</td>'
                    . '<td>' . $data['propertyStatus'] . '</td>'
                    . '<td>' . $data['price'] . '</td>'
                    // . '<td><a href ="edit_records?ID=' . $data['propertyId'] . '&uidUsers=' . $data['accountId'] . '">Edit Record </a></td>'
                    . '</tr>';
            }    
            echo '</table>';      
            
        }

        

        

        
        
       $this->disconnect($conn);


        
    }
}
?>