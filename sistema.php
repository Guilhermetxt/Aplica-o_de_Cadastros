<?php

session_start();
require_once('config.php');
require_once('dao/UsuarioDaoMysql.php');


if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {

    // destroi a session se o login não for feito
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
    exit;
}

$logado = $_SESSION['email'];


$usuarioDao = new UsuarioDaoMysql($pdo);
$lista = $usuarioDao->findByAll();




// Campo de pesquisa
if(!empty($_POST['pesquisar'])) {

    $resultPesquisa = $_POST['pesquisar'];

    $lista = $usuarioDao->pesquisar($resultPesquisa);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style_sistema.css">
    <title>Sistema</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="sistema.php">Sistema do GUI</a>  
  </div>
  <div class="d-flex">
    <a href="sair.php" class="btn btn-danger me-5">Sair</a>
  </div>
</nav>

    <div class="conteudo">
        <?php
            echo "<h1>Bem Vindo <u>$logado</u></h1>";
        ?>
    </div>

    <form action="" method="POST">

      <div class="input-group w-25 d-inline-flex justify-content-center gap-1">
        <input type="search" class="form-control" name="pesquisar" id="pesquisar" placeholder="Pesquisar">
        <button class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
      </div>

    </form>

    <div class="m-5">
      <table class="table text-white table-bg">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Senha</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            <th scope="col">Genero</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Cidade</th>
            <th scope="col">Estado</th>
            <th scope="col">Endereço</th>
            <th scope="col">---</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($lista as $usuario): ?>

              <tr>
                  <td><?=$usuario->getId();?></td>
                  <td><?=ucwords($usuario->getNome());?></td>
                  <td><?=$usuario->getSenha();?></td>
                  <td><?=$usuario->getEmail();?></td>
                  <td><?=$usuario->getTelefone();?></td>
                  <td><?=$usuario->getGenero();?></td>
                  <td><?=$usuario->getDataNascimento();?></td>
                  <td><?=ucwords($usuario->getCidade());?></td>
                  <td><?=$usuario->getEstado();?></td>
                  <td><?=ucwords($usuario->getEndereco());?></td>
                  <td>
                    <a class="btn btn-sm btn-warning" href="editar.php?id=<?=$usuario->getId();?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a>
                  </td> 
                  <td>
                    <a class="btn btn-sm btn-danger" href="deletar.php?id=<?=$usuario->getId();?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                        </svg>
                    </a>
                  </td>
              </tr>

            <?php endforeach; ?>
        </tbody>
      </table>
    </div>
</body>
</html>