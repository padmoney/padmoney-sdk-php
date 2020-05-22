# padmoney-sdk-php

[![Build Status](https://travis-ci.org/padmoney/padmoney-sdk-php.svg?branch=master)](https://travis-ci.org/padmoney/padmoney-sdk-php)

## Requisitos

- PHP 5.6 ou superior


## Instalação

Via composer:

```
composer require padmoney/sdk
```


## Uso

Para mais detalhes sobre os serviços e suas funcionalidades, quais campos enviar e demais informações, verifique [sobre o SDK na documentação da API](https://developers.padmoney.com/padmoney-sdk-php).

Disponibilizamos também o diretório `samples`, que contém exemplos de diversas chamadas à API do Padmoney utilizando o SDK.


### Cobrança

Instanciar Invoice e autenticação

```
// Token e Token-Secret para autenticação da API
$autenticacao = [
    'token' => 'dG9rZW4tYXBpLVBhZG1vbmV5',
    'token-secret' => '123',
];

// Instancia a classe Invoice, onde será possível
// criar uma nova cobrança,
// cancelar uma cobrança pelo $id
// assim como buscar uma ou várioas cobranças
$invoice = new \Padmoney\Invoice\Invoice($autenticacao);
```

#### Criar uma nova cobrança

```
$autenticacao = [
    'token' => 'dG9rZW4tYXBpLVBhZG1vbmV5',
    'token-secret' => '123',
];
$invoice = new \Padmoney\Invoice\Invoice($autenticacao);


$params = [
    'amount' => 1.99,
    'due_date' => '2020-05-22',
    'description' =>  'Detalhe da cobrança',
];
$retorno = $invoice->create($params);

var_dump($retorno);

```

#### Listar cobranças

```
$autenticacao = [
    'token' => 'dG9rZW4tYXBpLVBhZG1vbmV5',
    'token-secret' => '123',
];

$invoice = new \Padmoney\Invoice\Invoice($autenticacao);


$query = [
    'payer_id' => '',
    'status' => 'overdue', 
];
$all = $invoice->list($query);

var_dump($all);

```
