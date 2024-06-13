[1] Creo un 'server.php' con un array, lo traduco in JSON (per essere esportato) e uso 'echo' per dichiarare cosa esportare alla
chiamata;

[2]Specifico il tipo di contenuto che verra ricevuto tramite API
========> header('Content-Type: application/json'); <===========

[3]Tramite chiamata Axios recupero il file.json e axios gia lo converte in JS 

[4]Salvo l'array in una variabile nel data di vue

[5]Tramite un ciclo 'v-for' stampo il contenuto in una 'UL' 
