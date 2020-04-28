<?php
/**
 *
 * Exemplo de como realizar a criação de uma lista na API Bulkservices
 * utilizando cURL.
 *
 * http://php.net/manual/en/book.curl.php
 *
 * Endpoint:
 * http://api.bulkservices.com.br/api/v2/list/
 */


$postData = [
  "name" => "Nome da lista",

  "recipients" => [
    [
      "phone" => "5521993421312",
      "customer_id" => "99",
      "email" => "cliente_um@exemplo.com",
      "name" => "Nome do Cliente Um"
    ],
    [
      "phone" => "5521993421313",
      "customer_id" => "100",
      "email" => "cliente_dois@exemplo.com",
      "name" => "Nome do Cliente Dois"
    ]
  ]
];


//codifica os dados para envio no formato json
$jsonData = json_encode($postData);

//endpoint para criacao de campanhas
$url = "http://api.bulkservices.com.br/api/v2/list/";

//inicia a sessão curl
$curlHandler = curl_init($url);

//token de acesso a API
$token = 'Token 1234-1234-1234-1234-1234';


/**
 * Configura as opcoes de envio para a transferencia CURL,sendo:
 *
 * - CURLOPT_POSTFIELDS: Campos a serem enviados via POST
 * - CURLOPT_HTTPHEADER: Headers da requisição
 * - CURLOPT_RETURNTRANSFER: TRUE para retornar como string o resultado da requisicao
 */
$headers = array();
$headers[] = 'Content-Type:application/json';
$headers[] = 'Authorization: ' . $token;

curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);

//executa a transferencia
$response = curl_exec($curlHandler);

//encerra a sessão curl
curl_close($curlHandler);

//exibe o resultado da requisicao
var_dump($response);




?>