<?php
//require della connessione
function getConnessione(){
    $db=require __DIR__."/../database/db.php";
    return $db;
}

function getListaEsercenti(){
    //query
    //return del risultato
    $db=getConnessione();
    $q="select nome, email from amministratore";
    $r=@mysqli_query($db, $q);
    return $r;
}

function getListaQuestionari(){
    //query
    //return del risultato
    $db=getConnessione();
    $q="select q.id_questionario, q.id_amministratore, a.nome as admin, q.nome as nomeQ, q.punti, q.tempo_min, q.tempo_max, 
      q.data from questionario q, amministratore a where q.id_amministratore=a.id_amministratore";
    $r=@mysqli_query($db, $q);
    return $r;

}

function aggiuntaEsercente(){
    $db=getConnessione();
    if (!empty($_POST['esercente'])) {
        //Verificare autenticazione
        $jsonObject = json_decode($_POST['esercente']);

        $email=$jsonObject->{'email'};
        $password=$jsonObject->{'password'};
        $nome=$jsonObject->{'nome'};

        $q = "INSERT INTO `amministratore` (email, password, nome, lettura, scrittura) 
        VALUES ('$email', SHA2('$password', 256), '$nome', 1, 0)";
        @mysqli_query($db, $q);
       /* return $r;*/
    }
}
?>