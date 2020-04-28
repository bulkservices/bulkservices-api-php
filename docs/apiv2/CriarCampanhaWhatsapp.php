<?php
/**
 *
 * Exemplo de como realizar a criação de uma campanha na API Bulkservices
 * utilizando cURL.
 *
 * http://php.net/manual/en/book.curl.php
 *
 * Endpoint:
 * http://api.bulkservices.com.br/api/v2/campaign/create
 */


$caminhoDoArquivo = "../mario.jpg"
$extensaoDoArquivo = "jpg"
$imagemdePerfil = "data:image/" . $extensaoDoArquivo . ";base64," . base64_encode(file_get_contents($caminhoDoArquivo));


$caminhoDoArquivo = "../profile-icon.png"
$extensaoDoArquivo = "jpg"
$mediaDaMensagem = "data:image/" . $extensaoDoArquivo . ";base64," . base64_encode(file_get_contents($caminhoDoArquivo));


$postData = [
  "method" => "whatsapp",
  "name" => "Nome que posso usar para identificar a campanha",
  "message" => "Mensagem a ser enviada para os participantes da campanha",

  /**
   * DATA EM QUE VOCÊ DESEJA QUE A CAMPANHA SEJA ENVIADA
   */
  "send_date" => "2030-06-20 10:00",

  /**
   * POR UMA QUESTÃO DE BREVIDADE ESTAMOS UTILIZANDO APENAS O PARAMETRO `list_id`,
   * MAS CONFORME JÁ DITO ANTERIORMENTE VOCÊ PODE PASSAR OS DESTINATARIOS ATRAVÉS
   * DO PARAMETRO `recipients`
  */
  "list_id" => 67,

  /**
   * O CAMPO DE PERSONALIZAÇÃO DE PERFIL É OPCIONAL
   */
  "profile" => [
    "name" => "nome perfil",
    "photo" => $imagemdePerfil
  ],

  /**
   * O CAMPO DE MEDIA É OPCIONAL
   */
  "media" => [
    "media_type" => "png",
    "media_file" => $mediaDaMensagem
  ]
];



//codifica os dados para envio no formato json
$jsonData = json_encode($postData);

//endpoint para criacao de campanhas
$url = "http://api.bulkservices.com.br/api/v2/campaign/create/";

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
