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

    $sql = "SELECT * FROM `quadra`";
    $dados = mysqli_query($conn, $sql);

    return $dados;
}

function select($id)
{

    include "../../utl/conexao.php";

    $sql = "SELECT * FROM `quadra` WHERE id = '$id'";
    $dados = mysqli_query($conn, $sql);

    return $dados;
}

function insert()
{

    include "../../utl/conexao.php";

    $nome           = $_POST['nome'];
    $preco_hora     = $_POST['preco_hora'];
    $preco_minuto   = $_POST['preco_minuto'];
    $arena_id       = $_POST['arena_id'];

    $sql = "INSERT INTO `quadra`(`nome`, `preco_hora`, `preco_minuto`, `arena_id`) VALUES 
    ('$nome','$preco_hora','$preco_minuto','$arena_id')";

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
    $preco_hora     = $_POST['preco_hora'];
    $preco_minuto   = $_POST['preco_minuto'];

    $sql = "UPDATE `quadra` SET 

        `nome`              = '$nome',
        `preco_hora`        = '$preco_hora',
        `preco_minuto`      = '$preco_minuto'

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

    $sql = "DELETE FROM `quadra`
        WHERE `id` = '$id'";

    if (mysqli_query($conn, $sql)) {
        header('location:index.php');
    } else {
        echo "$sql";
    }
}

?>