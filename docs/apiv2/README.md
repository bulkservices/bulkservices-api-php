
# Conceitos da APIv2

Leia para entender como tirar maior proveito desta API

> Na [documentação oficial](http://api.bulkservices.com.br/api-docs/) você terá em detalhes como utilizar cada uma das urls da api, e todos os parâmetros envolvidos.


## Autenticação

Você precisa se autenticar para utilizar QUALQUER UMA das chamadas desta APIv2. O token de autenticação pode ser encontrado dentro do painel (Meu Perfil > Chave de API). Vamos supor que o token de autenticação para seu usuario seja Token 1234-1234-1234-1234-1234.

Você deve passar sua chave de api no HEADER *Authorization*. Exemplo:

    Authorization: Token 1234-1234-1234-1234-1234


## Lista de Contato

Uma lista de contato representa um grupo de pessoas no qual você pode enviar diferentes campanhas. Por exemplo a sua empresa pode manter uma lista de contato com todos os clientes atuais, ou os aniversariantes de cada mês. Uma lista de contatos tem um ID, e você na criação de uma campanha pode informar o ID da lista de contatos na qual você vai enviar a campanha.

Existem estas maneiras de se informar a lista de contatos

* Na url de [criação de lista](http://api.bulkservices.com.br/api-docs/#/Gerenciamento%20de%20Lista/get-all-lists). Neste caso, você receberá o ID da lista e na url de criação de campanha você vai informar o ID da lista
* Você ou o seu gestor pode fazer o upload de uma lista pelo painel. Nesse caso você receberá o ID da lista e na url de criação de campanha você vai informar o ID da lista
* Caso não queira lidar com criação de listas, na url de [criação de campanha](http://api.bulkservices.com.br/api-docs/#/Gerenciamento%20de%20Campanha/campaign-create) é possível informar diretamente quais destinatários você quer enviar a campanha. Neste caso você não precisa se preocupar em criar uma lista de contato.

## Campanha

Uma campanha é uma mensagem que você precisa que seja enviada para algumas pessoas. Na [documentação oficial](http://api.bulkservices.com.br/api-docs/) você confere as urls que estão envolvidas nesse processo.

Através da API você consegue criar novas campanhas, obter o status do envio das mesmas, e caso o método de envio tenha suporte, você consegue obter as respostas que os usuarios deram para a sua mensagem.


