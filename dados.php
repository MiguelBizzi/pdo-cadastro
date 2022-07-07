<?php


include "conexao.php";


$nome = trim($_POST["nome"]);
$rua = trim($_POST["rua"]);
$numero = trim($_POST["numero"]);
$bairro = trim($_POST["bairro"]);

$con = new Conexao();
$pdo=$con->conectar();

$stmt = $pdo->prepare("INSERT INTO pessoa VALUE(null,:nome,:rua,:numero,:bairro)");

$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':rua', $rua);
$stmt->bindParam(':numero', $numero);
$stmt->bindParam(':bairro', $bairro);

$stmt->execute();

$stmt = $pdo->prepare('SELECT * FROM pessoa');
$stmt->execute();
$dados = $stmt->fetchAll();
// var_dump($dados);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Rua</th>
      <th scope="col">Numero</th>
      <th scope="col">Bairro</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($dados as $d):?>
    <tr>
      <td><?= $d['nome'] ?></td>
      <td><?= $d['rua'] ?></td>
      <td><?= $d['numero'] ?></td>
      <td><?= $d['bairro'] ?></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>   
</body>
</html>
