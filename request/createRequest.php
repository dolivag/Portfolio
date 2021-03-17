<?php

require_once '../controllers/compres.php';

$producte = $_POST['producte'];
$quantitat = $_POST['quantitat'];
$preu = $_POST['preu'];

$request = [
    "producte" => $producte,
    "quantitat" => $quantitat,
    "preu" => $preu,
];

$compra = new Compra();
$result = $compra->create($request);

if ($result->connect_error) {
    echo "Error BD: Transaction error";
} else {
    header("Location: ../index.php");
}
