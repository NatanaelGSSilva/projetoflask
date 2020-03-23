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

  <div class="container mt-3">
    <h3>Alteração de Produtos</h3>
    <hr>
<?php
  $id = $_GET["id"];

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
  $sql = "SELECT * FROM produtos WHERE id=$id";
  // executa o comando SQL
  $result = mysqli_query($conn, $sql);
  // obtém o registro resultante
  $row = mysqli_fetch_assoc($result);
  // obtém os campos do registro a ser alterado
  $nome = $row['nome'];
  $marca = $row['marca'];
  $quant = $row['quant'];
  $preco = $row['preco'];
?>
    <form method="post" 
          action="grava_alteracao.php?id=<?=$id?>" 
          enctype="multipart/form-data">

      <div class="form-group">
        <label for="nome">Nome do Produto:</label>
        <input type="text" class="form-control" id="nome" 
               name="nome" value="<?= $nome ?>" autofocus required>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" class="form-control" id="marca" 
                   name="marca" value="<?= $marca ?>" required>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="foto">Foto do Produto:</label>
            <input type="file" class="form-control" id="foto" name="foto">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="quant">Quantidade:</label>
            <input type="text" class="form-control" id="quant" 
                   name="quant" value="<?= $quant ?>" required>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="preco">Preço R$:</label>
            <input type="text" class="form-control" id="preco" 
                   name="preco" value="<?= $preco ?>" required>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Gravar Dados</button>
      <button type="reset" class="btn btn-danger">Limpar Campos</button>
    </form>
  </div>

</body>

</html>