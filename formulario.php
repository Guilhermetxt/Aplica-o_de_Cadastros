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

    <a href="home.php">Voltar</a>

    <div class="box">
        <form action="formulario_action.php" method="POST">
            <fieldset>
                <legend><b>Formulário de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <label for="nome" >Nome Completo:</label>
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="senha" >Senha:</label>
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="telefone">Telefone:</label>
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                </div>
                <br><br>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <input type="radio" id="outros" name="genero" value="outros" required>
                <label for="outros">Outros</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br>
                <div class="inputBox">
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="estado">Estado:</label>
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="endereco">Endereço:</label>
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit" value="Enviar">
            </fieldset>
        </form>
    </div>
    
</body>
</html>