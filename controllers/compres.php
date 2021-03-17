<?php

require_once 'db.php';

class Compra
{

    function list()
    {
        $connection = new Connection;

        //Crear la conexión
        $mysql = $connection->create();

        $result = $mysql->query("SELECT * from compra");
        $compres = $result->fetch_all(MYSQLI_ASSOC);

        //Cerrar la conexión
        $connection->close($mysql);

        return $compres;
    }

    function create($request)
    {
        $connection = new Connection;

        //Crear la conexión 
        $mysql = $connection->create();
        $sql = "INSERT INTO compra(nom_producte, quantitat, preu) values ('{$request['producte']}',{$request['quantitat']},{$request['preu']})";
        $result = $mysql->query($sql);

        //Cerrar la conexión
        $connection->close($mysql);

        return $result;
    }

    function show($id)
    {
        $connection = new Connection;

        //Crear la conexión
        $mysql = $connection->create();

        $result = $mysql->query("SELECT * FROM compra WHERE compra_id=$id");
        $compra = $result->fetch_assoc();

        //Cerrar la conexión
        $connection->close($mysql);

        return $compra;
    }

    function update($request)
    {
        $connection = new Connection;

        // Crear la conexión
        $mysql = $connection->create();

        $sql = "UPDATE compra SET nom_producte = '{$request['producte']}', quantitat = {$request['quantitat']}, preu = {$request['preu']} WHERE compra_id = {$request['id']}";

        $result = $mysql->query($sql);

        //Close connection
        $connection->close($mysql);

        return $result;
    }

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

    function calculate()
    {
        $connection = new Connection;

        //Create the connection
        $mysql = $connection->create();

        $result = $mysql->query("SELECT SUM(c.quantitat*c.preu) AS TOTAL from compra C;");

        //Close the connection
        $connection->close($mysql);

        return $result;
    }
}
