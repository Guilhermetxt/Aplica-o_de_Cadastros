<?php

require_once('config.php');
require_once('dao/UsuarioDaoMysql.php');

$usuarioDao = new UsuarioDaoMysql($pdo);


$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $usuarioDao->deletar($id);
}

header('Location: sistema.php');
exit;
