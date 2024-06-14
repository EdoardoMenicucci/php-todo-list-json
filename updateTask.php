<?php

$dati = file_get_contents("data.json");

if (isset($_POST['indice'])) {

    //converto il json in un array associativo php
    $allTask = json_decode($dati, true);

    //cambio la classe la task selezionata
    if ($allTask[$_POST['indice']]['stato'] == 'done') {
        $allTask[$_POST['indice']]['stato'] = 'notDone';
    } else {
        $allTask[$_POST['indice']]['stato'] = 'done';
    }

    //riconverto il file in JSON
    $newData = json_encode($allTask);

    // Pusho il file riconvertito nel data.json
    file_put_contents("data.json", $newData);

    //Specifico il tipo di dati inviati
    header('Content-Type: application/json');

    //mando indietro i dati in pagina per essere aggiornata con VUE
    echo $newData;
}
