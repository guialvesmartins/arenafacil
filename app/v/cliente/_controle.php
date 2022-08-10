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

    $sql = "SELECT * FROM `cliente`";
    $dados = mysqli_query($conn, $sql);

    return $dados;
}

function select($id)
{

    include "../../utl/conexao.php";

    $sql = "SELECT * FROM `cliente` WHERE id = '$id'";
    $dados = mysqli_query($conn, $sql);

    return $dados;
}

function insert()
{

    include "../../utl/conexao.php";

    $nome          = $_POST['nome'];
    $cpf           = $_POST['cpf'];
    $telefone      = $_POST['telefone'];
    $email         = $_POST['email'];
    $arena_id      = $_POST['arena_id'];

    $sql = "INSERT INTO `cliente`(`nome`, `cpf`, `telefone`, `email`, `arena_id`) 
        VALUES ('$nome','$cpf','$telefone','$email','$arena_id')";

    if (mysqli_query($conn, $sql)) {
        header('location:index.php');
    } else {
        echo "$sql";
    }
}

function update()
{

    include "../../utl/conexao.php";

    $id            = $_POST['id'];
    $nome          = $_POST['nome'];
    $cpf           = $_POST['cpf'];
    $telefone      = $_POST['telefone'];
    $email         = $_POST['email'];

    $sql = "UPDATE `cliente` SET 
        `nome`      ='$nome',
        `cpf`       ='$cpf',
        `telefone`  ='$telefone',
        `email`     ='$email'
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

    $sql = "DELETE FROM `cliente`
        WHERE `id` = '$id'";

    if (mysqli_query($conn, $sql)) {
        header('location:index.php');
    } else {
        echo "$sql";
    }
}

?>