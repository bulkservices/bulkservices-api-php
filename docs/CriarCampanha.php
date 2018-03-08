<?php
/**
 * CriarCampanha.php
 *
 * Exemplo de como realizar a criação de uma campanha na API Bulkservices 
 * utilizando cURL. 
 * 
 * http://php.net/manual/en/book.curl.php
 *
 * Endpoint:
 * http://api.bulkservices.com.br/api/campaign/create/​ ?token=<API_KEY>
 */

//formato inicial dos dados para envio
$postData = [    
    "name"=> "Nome da campanha",
    "message"=> "Mensagem a ser enviada para os participantes da campanha",
    "media_message"=> "false",
    "send_date"=> "2021-2-16 11:00",
    "method"=> "whatsapp",
    "recipients"=> [
        [
        "phone"=> "556112345678",
        "customer_id"=> "123",
        "email"=> "pessoa1@exemplo.com",
        "name"=> "Pessoa 1"
        ],
        [
        "phone"=> "551112345678",
        "customer_id"=> "124",
        "email"=> "pessoa2@exemplo.com",
        "name"=> "Pessoa 2"
        ]
    ]
];

//codifica os dados para envio no formato json
$jsonData = json_encode($postData);

//token de acesso a API
$token = 'xxxxxx';

//endpoint para criacao de campanhas
$url = "http://api.bulkservices.com.br/api/campaign/create/?token=".$token;

//inicia a sessão curl
$curlHandler = curl_init($url);

/**
 * Configura as opcoes de envio para a transferencia CURL,sendo:
 * 
 * - CURLOPT_POSTFIELDS: Campos a serem enviados via POST
 * - CURLOPT_HTTPHEADER: Header da requisição
 * - CURLOPT_RETURNTRANSFER: TRUE para retornar como string o resultado da requisicao
 */
curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($curlHandler, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);

//executa a transferencia
$response = curl_exec($curlHandler);

//encerra a sessão curl
curl_close($curlHandler);

//exibe o resultado da requisicao
var_dump($response);