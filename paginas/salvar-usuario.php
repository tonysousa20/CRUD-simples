<?php
include("../config/config.php");


switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nascimento = $_POST["data_nascimento"];


        $sql = "INSERT INTO usuarios (nome, email, senha, data_nascimento) VALUES (
            '{$nome}', '{$email}', '{$senha}', '{$data_nascimento}'
        )";

        $res = $conexao->query($sql);

        if ($res) {
            echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
            echo "<script>window.location.href = 'index.php?page=listar';</script>";
            exit();
        } else {
            echo "Erro ao cadastrar: " . $conexao->error;
        }
        break;

    case 'editar':
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nascimento = $_POST["data_nascimento"];

        $sql = "UPDATE usuarios SET
        
         nome= '{$nome}',
         email = '{$email}',
         senha = '{$senha}',
         data_nascimento = '{$data_nascimento}'
         WHERE id = ".$_REQUEST["id"];
         


        $res = $conexao->query($sql);

        if ($res) {
            echo "<script>alert('Usuário editado com sucesso!');</script>";
            echo "<script>window.location.href = 'index.php?page=listar';</script>";

            exit();
        } else {
            echo "Erro ao editar: " . $conexao->error;
        }
        break;

    case 'excluir':
        $sql = "DELETE FROM usuarios WHERE id=" . $_REQUEST["id"];
        $res = $conexao->query($sql); // Adicionando esta linha para executar a query

        if ($res) {
            echo "<script>alert('Usuário excluído com sucesso!');</script>";
            echo "<script>window.location.href = 'index.php?page=listar';</script>";
            exit();
        } 
        else {
            echo "Erro ao excluir: " . $conexao->error;
        }
        break;

}
?>