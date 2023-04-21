<?php

require_once('config.php');
require_once('dao/UsuarioDaoMysql.php');


$usuarioDao = new UsuarioDaoMysql($pdo);

$nome = strtolower(trim(filter_input(INPUT_POST, 'nome')));
$senha = filter_input(INPUT_POST, 'senha');
$email = strtolower(trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)));
$telefone = filter_input(INPUT_POST, 'telefone');
$genero = strtolower(filter_input(INPUT_POST, 'genero'));
$data_nasc = filter_input(INPUT_POST, 'data_nascimento');
$cidade = strtolower(filter_input(INPUT_POST, 'cidade'));
$estado = strtolower(filter_input(INPUT_POST, 'estado'));
$endereco = strtolower(filter_input(INPUT_POST, 'endereco'));

if($nome && $senha && $email && $telefone && $genero && $data_nasc && $cidade && $estado && $endereco) {

    if ($usuarioDao->findByEmail($email) === false) {
        $u = new Usuario();
        $u->setNome($nome);
        $u->setSenha($senha);
        $u->setEmail($email);
        $u->setTelefone($telefone);
        $u->setGenero($genero);
        $u->setDataNascimento($data_nasc);
        $u->setCidade($cidade);
        $u->setEstado($estado);
        $u->setEndereco($endereco);

        $usuarioDao->adicionar($u);

        header('Location: login.php');
        exit;
    }
} else {
    header('Location: formulario.php');
    exit;
}