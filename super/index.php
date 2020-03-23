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
    <h3>Controle de Estoque - Supermercado Avenida</h3>
    <hr>
    <p>Cadastro e Listagem dos Produtos em Estoque</p>
  </div>

</body>

</html>