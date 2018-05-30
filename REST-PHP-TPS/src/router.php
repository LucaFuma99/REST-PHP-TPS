<?php 
//-----------------------------------------Functions to define method behavior---------------------------------//
function get($uri){
    $headers = apache_request_headers();
    switch ($uri) {
        case '/':
        index();
        break;
        case '/qualcosa':
        getQualcosa($headers);
        break;

        case '/listaEsercenti':
            getEsercenti($headers);
            break;

        case '/listaQuestionari':
            getQuestionari($headers);
            break;

        case '/dashboard':
            getDashboard($headers);
            break;

        case '/aggiungiEsercente':
            getAggiungiEsercenti($headers);
            break;
        
        default:
        notFound();
        break;
    }
}

function post($uri){
    $headers = apache_request_headers();
    switch ($uri) {
        case '/qualcosa':
        postQualcosa();
        break;

        case'/aggiungiEsercente':
            postAggiungiEsercente();
            break;
        
        default:
        notFound();
        break;
    }
}

function notFound(){
    http_response_code(404);
    echo "404 Classico Not Found";
}

function badRequest(){
    http_response_code(400);
    echo "Method not implemented";
}

//-----------------------------------------Functions to get the work done---------------------------------//

function getQualcosa($headers){
    //risultato della query
    // require /model/object.php
    
    //$r = getQualcosa();
    $r = "ekkelo"; //Risultato della query
    if(strpos($headers["Accept"], 'html') !== false){
        require __DIR__ . '/../view/qualcosa.php';
        visualizza($r);
    }else{
        echo $r;
    }
}

function getEsercenti($headers){
    //risultato della query
    require __DIR__."/../model/object.php";

    //$r = getQualcosa();
    $r = getListaEsercenti(); //Risultato della query
    if(strpos($headers["Accept"], 'html') !== false){
        require __DIR__ . '/../view/viewEsercenti.php';
        visualizza($r);
    }else{
        echo $r;
    }
}

function getQuestionari($headers){
    //risultato della query
    require __DIR__."/../model/object.php";

    //$r = getQualcosa();
    $r = getListaQuestionari(); //Risultato della query
    if(strpos($headers["Accept"], 'html') !== false){
        require __DIR__ . '/../view/viewQuestionari.php';
        visualizza($r);
    }else{
        echo $r;
    }
}

function getDashboard($headers){
    //risultato della query
    // require /model/object.php
    require __DIR__."/../model/object.php";
    $r = getListaQuestionari();
    if(strpos($headers["Accept"], 'html') !== false){
        require __DIR__ . '/../view/dashboard.php';
        visualizza($r);
    }else{
        echo $r;
    }

}

function getAggiungiEsercenti($headers){
    //risultato della query
    require __DIR__."/../model/object.php";

    //$r = getQualcosa();
    //$r = getListaEsercenti(); //Risultato della query
    if(strpos($headers["Accept"], 'html') !== false){
        require __DIR__ . '/../view/aggiungiEsercente.php';
        visualizza();
    }else{
        echo "errore";
    }
}

function postQualcosa(){
    var_dump($_POST);
    //Qui faccio qualcosa con il coso del post
    echo "<br/>ho fatto la post\n";
}

function postAggiungiEsercente(){
    //risultato della query
    require __DIR__."/../model/object.php";
    aggiuntaEsercente();
}


?>