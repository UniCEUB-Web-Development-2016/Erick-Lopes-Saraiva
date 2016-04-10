<?php
require_once 'API.class.php';

class MyAPI extends API
{
    protected $User;

    //public function __construct($request, $origin) { // PARA TRATAMENTO CORS preciamos de saber o servidor de origem da requisicao 
    //A autorizacao sera feita por endereço do servidor (com dns reverso) + chave de autorizacao
    public function __construct($request) {
        parent::__construct($request);
        /*Aqui estaremos fazendo o tratamento CORS da nossa API 
        * Eh importante notar que temos dois objetos que vamos ter que definir serao
        *   $Key
        *   $User
        * Eu nao sei fazer isso ainda entao vou deixar o codigo sem verificacao de API COM O CORS desabilitado na classe API.class.php
        * MAS EU AINDA VOU FAZER COM CORS PQ MEU SERVICO OBRIGATORIAMENTE VAI integrar com outros
        */
    }
    /*
    * nesse momento a API está + ou - Pronta mas atendendo o requisito de PEGAR QUALQUER REQUEST DO BROWSER E ENVIAR AO CONTROLLER
    *   FALTA:
    *   - tratar o request
    *   - habilitar e tratar CORS
    *   - Implementar MyAPI dentro do controller
    *              ---OU---
    *   - Tratar MyAPI como o a classe que direciona dados ao controller
    *   - Implementar o restante do 
    */
}