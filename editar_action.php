<?php

require_once('config.php');
require_once('dao/UsuarioDaoMysql.php');


$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_POST, 'id');
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

    $usuario = new Usuario();
    $usuario->setId($id);
    $usuario->setNome($nome);
    $usuario->setSenha($senha);
    $usuario->setEmail($email);
    $usuario->setTelefone($telefone);
    $usuario->setGenero($genero);
    $usuario->setDataNascimento($data_nasc);
    $usuario->setCidade($cidade);
    $usuario->setEstado($estado);
    $usuario->setEndereco($endereco);

    $usuarioDao->editar($usuario);

    header('Location: sistema.php');
    exit;
} else {
    header('Location: editar.php');
    exit;
}