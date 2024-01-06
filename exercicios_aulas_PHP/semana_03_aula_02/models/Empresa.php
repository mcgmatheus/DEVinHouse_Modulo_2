<?php
// criar classe
//atributos
//metodos
require_once "Funcionario.php";
class Empresa
{
  private $nome;
  private $cnpj;
  private $endereco;

  public function __construct($nome, $cnpj)
  {
    $this->nome = $nome;
    $this->cnpj = $cnpj;
  }

  public function contratar(Funcionario $funcionario)
  {
    //implemetação
  }

  public function demitir($id)
  {
    //implemetação
  }

  public function listaFuncionarios()
  {
    //implemetação
  }
}