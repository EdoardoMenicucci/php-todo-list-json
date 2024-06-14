<?php

$dati = file_get_contents("data.json");

if (isset($_POST['indice'])) {

    //converto il json in un array associativo php
    $allTask = json_decode($dati, true);

    //elimino la task selezionata
    // Rimuovi l'elemento all'indice specificato
    unset($allTask[$_POST['indice']]);

    //riconverto il file in JSON
    $newData = json_encode($allTask);

    // Pusho il file riconvertito nel data.json
    file_put_contents("data.json", $newData);

    //Specifico il tipo di dati inviati
    header('Content-Type: application/json');

    echo $newData;
}
