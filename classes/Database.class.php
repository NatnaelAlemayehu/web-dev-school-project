<?php 

class Database {
    private static $hostName = "sql7.freemysqlhosting.net";
    private static $hostUsername = "sql7339091";
    private static $databaseName = "sql7339091";
    private static $databasePassword = "qEvLhud9KN";

    public function connect()
    {    
        $connection = mysqli_connect(self::$hostName, self::$hostUsername, self::$databasePassword, self::$databaseName);
        if (mysqli_connect_error()) {
            echo "unable to connect";
        } else {
            return $connection;
        }
    }

    public function disconnect($connection){
        $connection->close();        
    }
}