<?php

$todo = ['Fare la spesa', 'Lavare i piatti', 'Fare da mangiare per il cane', 'Portare a spasso il cane', 'Mangiare', 'Dormire', 'Studiare', 'Fare la doccia', 'Passeggiare'];

$todoEncoded = json_encode($todo);

// Specifico il tipo di contenuto che verra ricevuto tramite API
header('Content-Type: application/json');

//Specifico il contenuto da esportare
echo $todoEncoded;
