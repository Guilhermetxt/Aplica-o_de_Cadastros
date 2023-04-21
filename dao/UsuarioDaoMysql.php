<?php

require_once('models/Usuario.php');


class UsuarioDaoMysql implements UsuarioDAO
{
    private $pdo;

    public function __construct(PDO $drive)
    {
        $this->pdo = $drive;
    }

    public function adicionar(Usuario $u)
    {
        $sql = $this->pdo->prepare("INSERT INTO formulario_cadastro (nome, senha, email, telefone, genero, data_nasc, cidade, estado, endereco) VALUES (:nome, :senha, :email, :telefone, :genero, :data_nasc, :cidade, :estado, :endereco)");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':senha', $u->getSenha());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':telefone', $u->getTelefone());
        $sql->bindValue(':genero', $u->getGenero());
        $sql->bindValue(':data_nasc', $u->getDataNascimento());
        $sql->bindValue(':cidade', $u->getCidade());
        $sql->bindValue(':estado', $u->getEstado());
        $sql->bindValue(':endereco', $u->getEndereco());
        $sql->execute();

        $u->setId( $this->pdo->lastInsertId() );
        return $u;
    }

    public function findByAll()
    {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM formulario_cadastro");

        if ($sql->rowCount() > 0) {
            $items = $sql->fetchAll();

            foreach($items as $item) {
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setNome($item['nome']);
                $u->setSenha($item['senha']);
                $u->setEmail($item['email']);
                $u->setTelefone($item['telefone']);
                $u->setGenero($item['genero']);
                $u->setDataNascimento($item['data_nasc']);
                $u->setCidade($item['cidade']);
                $u->setEstado($item['estado']);
                $u->setEndereco($item['endereco']);

                $array[] = $u;
            }
        }

        return $array;
    }

    public function findByEmail($email)
    {
        $sql = $this->pdo->prepare("SELECT * FROM formulario_cadastro WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $item = $sql->fetch();

            $u = new Usuario();
            $u->setId($item['id']);
            $u->setNome($item['nome']);
            $u->setSenha($item['senha']);
            $u->setEmail($item['email']);
            $u->setTelefone($item['telefone']);
            $u->setGenero($item['genero']);
            $u->setDataNascimento($item['data_nascimento']);
            $u->setCidade($item['cidade']);
            $u->setEstado($item['estado']);
            $u->setEndereco($item['endereco']);

            return $u;
        } else {
            return false;
        }
    }

    public function findById($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM formulario_cadastro WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $usuario = $sql->fetch();

            $u = new Usuario();
            $u->setId($usuario['id']);
            $u->setNome($usuario['nome']);
            $u->setSenha($usuario['senha']);
            $u->setEmail($usuario['email']);
            $u->setTelefone($usuario['telefone']);
            $u->setGenero($usuario['genero']);
            $u->setDataNascimento($usuario['data_nasc']);
            $u->setCidade($usuario['cidade']);
            $u->setEstado($usuario['estado']);
            $u->setEndereco($usuario['endereco']);

            return $u;
        } else {
            return false;
        }
    }

    public function editar(Usuario $u)
    {
        $sql = $this->pdo->prepare("UPDATE formulario_cadastro SET nome = :nome, senha = :senha, email = :email, telefone = :telefone, genero = :genero, data_nasc = :data_nasc, cidade = :cidade, estado = :estado, endereco = :endereco WHERE id = :id");
        $sql->bindValue(':id', $u->getId());
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':senha', $u->getSenha());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':telefone', $u->getTelefone());
        $sql->bindValue(':genero', $u->getGenero());
        $sql->bindValue(':data_nasc', $u->getDataNascimento());
        $sql->bindValue(':cidade', $u->getCidade());
        $sql->bindValue(':estado', $u->getEstado());
        $sql->bindValue(':endereco', $u->getEndereco());
        $sql->execute();

        return true;
    }

    public function deletar($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM formulario_cadastro WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function pesquisar($data)
    {
        $sql = $this->pdo->prepare("SELECT * FROM formulario_cadastro WHERE id LIKE ? or nome LIKE ? or email LIKE ? ORDER BY id DESC");
        $sql->bindValue(1, '%'.$data.'%');
        $sql->bindValue(2, '%'.$data.'%');
        $sql->bindValue(3, '%'.$data.'%');
        $sql->execute();
    
        $array = [];

        if ($sql->rowCount() > 0) {
            $items = $sql->fetchAll();

            foreach($items as $item) {
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setNome($item['nome']);
                $u->setSenha($item['senha']);
                $u->setEmail($item['email']);
                $u->setTelefone($item['telefone']);
                $u->setGenero($item['genero']);
                $u->setDataNascimento($item['data_nasc']);
                $u->setCidade($item['cidade']);
                $u->setEstado($item['estado']);
                $u->setEndereco($item['endereco']);

                $array[] = $u;
            }
        }
        
        return $array;
    }
}
