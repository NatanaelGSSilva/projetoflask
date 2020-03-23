<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="shortcut icon" href="carrinho.png" />
  <title>Supermercado Avenida</title>
</head>

<body>

  <!-- MENU SUPERIOR -->
  <nav class="navbar navbar-expand-md bg-primary navbar-dark sticky-top">
    <div class="container">
      <!-- Brand -->
      <a class="navbar-brand" href="index.php">
        <img src="carrinho.png" alt="Carrinho" width="50px">
        Super Avenida
      </a>

      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="cadastro.php">Cadastro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="listagem.php">Listagem</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="balanco.php">Balanço</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "super_avenida";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // comando SQL para obter o número de produtos cadastrados
  $sql = "SELECT COUNT(*) AS num FROM produtos";
  // executa o comando SQL
  $result = mysqli_query($conn, $sql);
  // obtém o registro resultante
  $row = mysqli_fetch_assoc($result);
  // obtém o valor da coluna resultante
  $num = $row['num'];

  // comando SQL para obter o número de produtos cadastrados
  $sql = "SELECT AVG(preco) AS media FROM produtos";
  // executa o comando SQL
  $result = mysqli_query($conn, $sql);
  // obtém o registro resultante
  $row = mysqli_fetch_assoc($result);
  // obtém o valor da coluna resultante
  $media = $row['media'];

  // comando SQL para obter o número de produtos cadastrados
  $sql = "SELECT SUM(quant*preco) AS total FROM produtos";
  // executa o comando SQL
  $result = mysqli_query($conn, $sql);
  // obtém o registro resultante
  $row = mysqli_fetch_assoc($result);
  // obtém o valor da coluna resultante
  $total = $row['total'];
  ?>

  <div class="container mt-3">
    <h3>Balanço - Controle de Estoque</h3>
    <hr>
    <h4> Nº de Itens Cadastrados: <?= $num ?> </h4>
    <h4> Preço Médio dos Produtos R$: <?= number_format($media, 2, ',', '.') ?> </h4>
    <h4> Total em Estoque R$: <?= number_format($total, 2, ',', '.') ?> </h4>
  </div>

</body>

</html>