<!DOCTYPE html>
<html lang="en">


<body>
    <?php
    class Connection
    {

        private $host;
        private $username;
        private $passwd;
        private $dbname;
        private $port;

        function __construct()
        {
            $this->host = '127.0.0.1';
            $this->username = 'root';
            $this->passwd = 'danielo1990';
            $this->dbname = 'compra';
            $this->port = '3308';
        }

        function create()
        {
            $connection = new mysqli($this->host, $this->username, $this->passwd, $this->dbname, $this->port);
            return $connection;
        }

        function close($connection)
        {
            $connection->close();
        }
    }


    ?>

</body>

</html>