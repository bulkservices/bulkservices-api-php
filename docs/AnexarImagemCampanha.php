<?php
/**
 * AnexarImagemCampanha.php
 *
 * Exemplo de como anexar imagem a uma campanha na API Bulkservices
 * utilizando cURL.
 *
 * http://php.net/manual/en/book.curl.php
 *
 * Endpoint:
 * http://api.bulkservices.com.br/api/campaign/​<ID_CAMPANHA>/media/add/?token=<API_KEY>
 */

/**
 * Cria um objeto CURLFile
 *
 * http://php.net/manual/en/curlfile.construct.php
 * new CURLFile('filename','mimetype','postname')
 */

$file = new CURLFile(dirname(__FILE__).'/mario.jpg','image/jpeg','mario.jpg');
$mediaType = 'image';

//formato inicial dos dados para envio
$postData = [
	'media_type'=>$mediaType,
	'media_file'=>$file
];

//token de acesso a API
$token = 'xxxxxx';

//id da campanha
$idCampanha = 'xxxxxx';

//endpoint para anexar imagens em campanhas
$url = "http://api.bulkservices.com.br/api/campaign/".$idCampanha."/media/add/?token=".$token;

//inicia a sessão curl
$curlHandler = curl_init($url);

/**
 * Configura as opcoes de envio para a transferencia CURL,sendo:
 *
 * - CURLOPT_POSTFIELDS: Campos a serem enviados via POST
 * - CURLOPT_RETURNTRANSFER: TRUE para retornar como string o resultado da requisicao
 */
curl_setopt($curlHandler, CURLOPT_POST, 1);
curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $postData);
curl_setopt($curlHandler, CURLOPT_VERBOSE, true);
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curlHandler, CURLINFO_HEADER_OUT, true);

//executa a transferencia
$response = curl_exec($curlHandler);

//encerra a sessão curl
curl_close($curlHandler);

//exibe o resultado da requisicao
var_dump($response);
