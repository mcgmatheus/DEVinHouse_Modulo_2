<?php 

class Pessoa {
  public $nome;
  public $idade;
  public $cpf;
// também podem ser definidas funções que são pertinentes a classe

  public function __construct($nome, $idade){
    $this->nome = $nome;
    $this->idade = $idade;
  }

  public function getCpf(){
    return $this->cpf;
  }
  public function setCpf($cpf){
    return $this->cpf = $cpf;
  }
  public function getNome(){
    return $this->nome;
  }
  public function setNome($nome){
    return $this->nome = $nome;
  }
  public function getIdade(){
    return $this->idade;
  }
  public function setIdade($idade){
    return $this->idade = $idade;
  }
}