<?php 
require_once 'MyAPI.php';

//verifica se o HTTP_ORIGIN existe ou nao pois se src=dst nao havera HTTP ORIGIN
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) { //esse codigo soh sera usado quando tivermos CORS
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

//Enviar o request para a classe MyAPI pra tratar o CORS e efetivamente tudo para o controller
try {
    //$API = new MyAPI($_REQUEST['request'], $_SERVER['HTTP_ORIGIN']); //linha com dado de origem para CORS
    $API = new MyAPI ($_REQUEST['request']) //sem dado de origem
    echo $API->getRequest();//alterar quando todo resolvido
} 
catch (Exception $ex) {
    echo json_encode(Array('Guru Meditation' => $ex->getMessage()));
}