<?php
$name = 'Matheus Gonçalves';
$age = 28;
$salary_expectation = 4200.50;
$description = 'Sou formado em Engenharia de Produção e hoje atuo como desenhista projetista. Estou estudando programação em busca de uma oportunidade para transição de carreira. Atualmente, possuo conhecimento das linguagens: HTML, CSS, JavaScript/Vue.js, e PHP';
$open_to_negotiation = true;
$skills = ['HTML', 'CSS', 'JavaScript', 'Vue.js', 'PHP'];
$adress = array("cep"=>"13843-332", 
"state"=>"São Paulo", 
"city"=>"Mogi Guaçu",
"neighborhood"=>"Parque Duas Nascesntes", 
"number"=>"76",
"street"=>"Cecilio Borges de Couto",
"complement"=>"");

$contacts = (object)[
  "github"=>"https://github.com/mcgmatheus",
  "linkedin"=>"link do linkedIn",
  "phone"=>"99386-6879",
];

$experiences = [
  [
    'company_name' => 'Mahle',
    'cargo' => 'Operador',
    'period' => '01/01/2018 até 30/12/2020',
    'description' => 'Operador de máquina CNC'
  ],
  [
    'company_name' => 'Aliança Equipamentos',
    'cargo' => 'Desenhista Projetista',
    'period' => '01/01/2021 até 30/12/2023',
    'description' => 'Desenhos técnicos e projeto de máquinas'
  ]
]
/* forma para retornar json
$experiences = json_encode([
  [
    'company_name' => 'Mahle',
    'cargo' => 'Operador',
    'period' => '01/01/2018 até 30/12/2020',
    'description' => 'Operador de máquina CNC'
  ],
  [
    'company_name' => 'Aliança Equipamentos',
    'cargo' => 'Desenhista Projetista',
    'period' => '01/01/2021 até 30/12/2023',
    'description' => 'Desenhos técnicos e projeto de máquinas'
  ]
])
*/
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Currículo</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  header {
    background-color: #007BFF;
    color: #fff;
    text-align: center;
    padding: 20px;
  }

  h1 {
    font-size: 36px;
    margin-bottom: 10px;
  }

  h2 {
    font-size: 24px;
    margin-top: 20px;
  }

  .container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }

  p {
    margin: 0;
  }

  ul {
    list-style-type: square;
    padding-left: 20px;
  }
  </style>
</head>

<body>

  <header>
    <h1><?php echo $name?></h1>
    <p><?php echo "$adress[street] - $adress[number] - $adress[neighborhood]"?></p>
    <p><?php echo "$adress[cep] - $adress[city] - $adress[state]"?></p>
    <p>Email: seuemail@example.com</p>
    <p><?php echo $name?></p>

  </header>

  <div class="container">
    <h2>Resumo Profissional</h2>
    <p><?php echo $description?></p>

    <h2>Experiência Profissional</h2>
    <ul>
      <?php 
        foreach($experiences as $experience){
          ?>
      <li>
        <p><strong><?php echo $experience['company_name']?></strong></p>
        <p><?php echo $experience['cargo']?></p>
        <p><?php echo $experience['period']?></p>
        <p><?php echo $experience['description']?></p>
      </li>
      <?php 
        }
      ?>


      <li>
        <p><strong>Nome da Empresa</strong></p>
        <p>Cargo: Cargo Ocupado</p>
        <p>Período: Mês/Ano de Início - Mês/Ano de Término</p>
        <p>Descrição das responsabilidades e realizações.</p>
      </li>
      <!-- Adicione mais experiências profissionais conforme necessário -->
    </ul>

    <h2>Formação Acadêmica</h2>
    <ul>
      <li>
        <p><strong>Nome da Universidade</strong></p>
        <p>Curso: Nome do Curso</p>
        <p>Ano de Conclusão: Ano de Conclusão</p>
      </li>
      <!-- Adicione mais formações acadêmicas conforme necessário -->
    </ul>

    <h2>Habilidades Técnicas</h2>

    <ul>
      <?php 
      foreach($skills as $skill) {
        echo "<li>$skill</li>";
      }
     ?>
    </ul>

    <!-- <ul>
      <li>Habilidade 1</li>
      <li>Habilidade 2</li>
      <li>Habilidade 3</li>
    </ul> -->
  </div>
</body>

</html>