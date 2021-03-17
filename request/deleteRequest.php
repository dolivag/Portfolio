<?php

require_once '../controllers/compres.php';

$id = $_GET['id'];

$compra = new Compra();
$result = $compra->delete($id);

if ($result->connect_error) {
    echo "Error BD: Transaction error";
} else {
    header("Location: ../index.php");
}
