<?php
// headers
header("Content-Type: application/json"); //a aplicação retorna json
header();

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST'){
//capturar o body da requisição

$body = json_decode(file_get_contents("php://input"));
$name = filter_var($body -> name, FILTER_SANITIZE_SPECIAL_CHARS);
$cpf = filter_var($body -> cpf, FILTER_SANITIZE_SPECIAL_CHARS);

  if(!$name){
    echo json_encode(['error' => 'Nome é necessário']);
  };
    if(!$cpf){
      echo json_encode(['error' => 'CPF é necessário']);
    };

    $filaAtendimento = json_decode(file_get_contents('filaAtendimento.txt')) ;
    array_push($filaAtendimento, ['name' => $name, 'cpf' => $cpf]);
    file_put_contents('fila_atendimento.txt', json_encode($filaAtendimento));//transforma estrutura em texto


};