<!DOCTYPE html>
<html lang="en">


<body>
    <?php
    //Create a new class which holds the necessary data to connect with the database
    class Connection
    {

        private $host;
        private $username;
        private $passwd;
        private $dbname;
        private $port;

        //Constructor function for the Connection class
        function __construct()
        {
            $this->host = '127.0.0.1';
            $this->username = 'root';
            $this->passwd = '';
            $this->dbname = 'compra';
            $this->port = '3308';
        }

        //Create a new connection 
        function create()
        {
            $connection = new mysqli($this->host, $this->username, $this->passwd, $this->dbname, $this->port);
            return $connection;
        }

        //Close ths connection to the database
        function close($connection)
        {
            $connection->close();
        }
    }


    ?>

</body>

</html>