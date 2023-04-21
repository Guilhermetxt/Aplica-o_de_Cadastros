<?php

require_once('config.php');
require_once('dao/UsuarioDaoMysql.php');


$usuarioDao = new UsuarioDaoMysql($pdo);
$usuario = false;

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $usuario = $usuarioDao->findById($id);
}

if ($usuario === false) {
    header('Location: sistema.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="css/style_form.css">
</head>
<body>

    <a href="sistema.php">Voltar</a>

    <div class="box">
        <form action="editar_action.php" method="POST">
            <fieldset>
                <legend><b>Editar Cadastro</b></legend>
                <br>
                <input type="hidden" name="id" value="<?=$usuario->getId();?>">
                <div class="inputBox">
                    <label for="nome" >Nome Completo:</label>
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?=$usuario->getNome();?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="senha" >Senha:</label>
                    <input type="password" name="senha" id="senha" class="inputUser" value="<?=$usuario->getSenha();?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="inputUser" value="<?=$usuario->getEmail();?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="telefone">Telefone:</label>
                    <input type="tel" name="telefone" id="telefone" class="inputUser" value="<?=$usuario->getTelefone();?>" required>
                </div>
                <br><br>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" <?php echo ($usuario->getGenero() == 'feminino') ? 'checked' : ''?> required>
                <label for="feminino">Feminino</label>
                <input type="radio" id="masculino" name="genero" value="masculino" <?php echo ($usuario->getGenero() == 'masculino') ? 'checked' : ''?> required>
                <label for="masculino">Masculino</label>
                <input type="radio" id="outros" name="genero" value="outros" <?php echo ($usuario->getGenero() == 'outros') ? 'checked' : ''?> required>
                <label for="outros">Outros</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" value="<?=$usuario->getDataNascimento();?>" required>
                <br><br>
                <div class="inputBox">
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade" id="cidade" class="inputUser" value="<?=$usuario->getCidade();?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="estado">Estado:</label>
                    <input type="text" name="estado" id="estado" class="inputUser" value="<?=$usuario->getEstado();?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="endereco">Endereço:</label>
                    <input type="text" name="endereco" id="endereco" class="inputUser" value="<?=$usuario->getEndereco();?>" required>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit" value="Salvar">
            </fieldset>
        </form>
    </div>
    
</body>
</html>