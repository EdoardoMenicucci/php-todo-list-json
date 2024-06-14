<?php
//RECUPERO I DATI IN FORMATO JSON
$dati = file_get_contents("data.json");
$newData = '';


if (isset($_POST['cosa']) && $_POST['cosa'] != '') { // SE RICEVO DATI IN POST LI AGGIORNO AL DATA.JSON E NON SONO STRINGA VUOTA

    //converto il json in un array associativo php
    $allTask = json_decode($dati, true);

    //Prendo la task aggiunta e creo un oggetto come gli altri
    $newTask = [
        "cosa" => $_POST['cosa'],
        "stato" => 'notDone'
    ];

    //pusho la task nell array preso dal data.json
    $allTask[] = $newTask;

    //riconverto il file in JSON
    $newData = json_encode($allTask);

    // Pusho il file riconvertito nel data.json
    file_put_contents("data.json", $newData);

    //Specifico il tipo di dati inviati
    header('Content-Type: application/json');

    echo $newData;
} else { //SE NON RICEVO DATI IN POST MOSTRO LA LISTA

    // Specifico il tipo di contenuto che verra ricevuto tramite API
    header('Content-Type: application/json');

    //Specifico il contenuto da esportare
    echo $dati;
}
