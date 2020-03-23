<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="shortcut icon" href="carrinho.png" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">  
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
    <h3>Listagem de Produtos Cadastrados</h3>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>Código</th>
          <th>Nome do Produto</th>
          <th>Marca</th>
          <th>Quant.</th>
          <th>Preço R$</th>
          <th>Foto</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
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

        $sql = "SELECT * FROM produtos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
            $id = $row['id'];  
            $nome = $row['nome'];  
            $marca = $row['marca'];  
            $quant = $row['quant'];  
            $preco = number_format($row['preco'], 2, ',', '.');

            echo "<tr><td>$id</td>";
            echo "<td>$nome</td>";
            echo "<td>$marca</td>";
            echo "<td>$quant</td>";
            echo "<td>$preco</td>";
            echo "<td><img src='fotos/" . $id . ".jpg' width='100' height='80'></td>";
            echo "<td>
            <a href='altera.php?id=$id' class='btn btn-sm btn-warning'>
              <i class='far fa-edit'></i></a>
            <a href='exclui.php?id=$id' class='btn btn-sm btn-danger ml-1'
               onclick='return confirm(\"Confirma Exclusão de $nome?\")'>
              <i class='far fa-trash-alt'></i></a>
            </td></tr>";
          }
        } else {
          echo "0 results";
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>