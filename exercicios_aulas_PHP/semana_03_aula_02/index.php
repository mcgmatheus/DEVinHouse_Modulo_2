<?php 
//classes
//1 - Cria a classe
//2 - Cria os atributos da classe
//3 - normalmente classes são feitas em arquivos separados

require_once "pessoa.php";
require_once "utils.php";

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST'){
  $body = getBody();

  $usuario = new Pessoa();//inicia um novo objeto pessoa
}