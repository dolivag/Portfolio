<?php

require_once 'db.php';

//New class which holds the data and methods for the shopping list
class Compra
{

    //Create a list with the information saved in the database
    function list()
    {
        $connection = new Connection;

        //Establish connection to the database
        $mysql = $connection->create();

        //Create the query to show the selected table
        $result = $mysql->query("SELECT * from compra");
        $compres = $result->fetch_all(MYSQLI_ASSOC);

        //Close the connection
        $connection->close($mysql);

        return $compres;
    }

    //Adds the requested data into a table
    function create($request)
    {
        $connection = new Connection;

        //Establish connection to the database
        $mysql = $connection->create();

        //Assigns the query to insert the requested data into the table
        $sql = "INSERT INTO compra(nom_producte, quantitat, preu) values ('{$request['producte']}',{$request['quantitat']},{$request['preu']})";
        $result = $mysql->query($sql);

        //Close the connection
        $connection->close($mysql);

        return $result;
    }

    //Shows the data saved into a specific id of the table's database
    function show($id)
    {
        $connection = new Connection;

        //Create the connection
        $mysql = $connection->create();

        //Create a query to show all the data inside the passed-by-parameter id
        $result = $mysql->query("SELECT * FROM compra WHERE compra_id=$id");
        $compra = $result->fetch_assoc();

        //Close the connection to the database
        $connection->close($mysql);

        return $compra;
    }

    //Updates the data into a specific id of the table's database, with the data saved into the passed-by-parameter request
    function update($request)
    {
        $connection = new Connection;

        //Create the connection to the database
        $mysql = $connection->create();

        //Assigns to the sql variable the query with the data saved into the request parameter
        $sql = "UPDATE compra SET nom_producte = '{$request['producte']}', quantitat = {$request['quantitat']}, preu = {$request['preu']} WHERE compra_id = {$request['id']}";

        //Creates the query with the sql variable
        $result = $mysql->query($sql);

        //Close the connection to the database
        $connection->close($mysql);

        return $result;
    }

    //Deletes the data into the instance with the id passed by parameter
    function delete($id)
    {
        $connection = new Connection;

        //Create connection
        $mysql = $connection->create();

        //Query to delete the product with the id
        $result = $mysql->query("DELETE FROM compra WHERE compra_id = $id");

        //Close connection
        $connection->close($mysql);

        return $result;
    }
}
