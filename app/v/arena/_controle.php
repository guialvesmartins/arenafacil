<?php

$acao           = $_POST['acao'] ?? '';

if ($acao == 'insert') {
    insert();
} elseif ($acao == 'update') {
    update();
} elseif ($acao == 'delete') {
    delete();
}


function selectAll()
{

    include "../../utl/conexao.php";

    $sql = "SELECT * FROM `arena`";
    $dados = mysqli_query($conn, $sql);

    return $dados;
}

function select($id)
{

    include "../../utl/conexao.php";

    $sql = "SELECT * FROM `arena` WHERE id = '$id'";
    $dados = mysqli_query($conn, $sql);

    return $dados;
}

function insert()
{

    include "../../utl/conexao.php";

    $nome           = $_POST['nome'];
    $razao_social   = $_POST['razao_social'];
    $cnpj_cpf       = $_POST['cnpj_cpf'];
    $email          = $_POST['email'];
    $telefone_1     = $_POST['telefone_1'];
    $telefone_2     = $_POST['telefone_2'];

    $sql = "INSERT INTO `arena`(`nome`, `razao_social`, `cnpj_cpf`, `email`, `telefone_1`, `telefone_2`) VALUES 
    ('$nome','$razao_social','$cnpj_cpf','$email','$telefone_1','$telefone_2')";

    if (mysqli_query($conn, $sql)) {
        header('location:index.php');
    } else {
        echo "$sql";
    }
}

function update()
{

    include "../../utl/conexao.php";

    $id             = $_POST['id'];
    $nome           = $_POST['nome'];
    $razao_social   = $_POST['razao_social'];
    $cnpj_cpf       = $_POST['cnpj_cpf'];
    $email          = $_POST['email'];
    $telefone_1     = $_POST['telefone_1'];
    $telefone_2     = $_POST['telefone_2'];

    $sql = "UPDATE `arena` SET 

        `nome`          = '$nome',
        `razao_social`  = '$razao_social',
        `cnpj_cpf`      = '$cnpj_cpf',
        `email`         = '$email',
        `telefone_1`    = '$telefone_1',
        `telefone_2`    = '$telefone_2'

        WHERE `id` = '$id'";

    if (mysqli_query($conn, $sql)) {
        header('location:index.php');
        echo "$sql";
    } else {
        echo "$sql";
    }
}

function delete()
{
    include "../../utl/conexao.php";

    $id             = $_POST['id'];

    $sql = "DELETE FROM `arena`
        WHERE `id` = '$id'";

    if (mysqli_query($conn, $sql)) {
        header('location:index.php');
    } else {
        echo "$sql";
    }
}

?>