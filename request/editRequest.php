<?php

require_once '../controllers/compres.php';

$id = $_GET['id'];

$producte = $_POST['producte'];
$quantitat = $_POST['quantitat'];
$preu = $_POST['preu'];

$request = [
    "producte" => $producte,
    "quantitat" => $quantitat,
    "preu" => $preu,
    "id" => $id
];

$compra = new Compra;
$result = $compra->update($request);

if ($result->connect_error) {
    echo "Error BD: Transaction error";
} else {
    header("Location: ../index.php");
}
