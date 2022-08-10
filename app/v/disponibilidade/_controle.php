<?php

$acao               = $_POST['acao'] ?? '';
$id_arena_insert    = $_POST['arena_id'] ?? '';

if ($acao == 'insert') {
    insert($id_arena_insert);
} elseif ($acao == 'update') {
    update();
} elseif ($acao == 'delete') {
    delete();
}


function selectAll($id_arena)
{

    include "../../utl/conexao.php";

    $sql = "SELECT * FROM `disponibilidade` where  arena_id = '$id_arena' ORDER BY `dia_semana`";
    $dados = mysqli_query($conn, $sql);

    return $dados;
}

function select($id)
{

    include "../../utl/conexao.php";

    $sql = "SELECT * FROM `disponibilidade` WHERE id = '$id'";
    $dados = mysqli_query($conn, $sql);

    return $dados;
}

function insert($id_arena_insert)
{

    include "../../utl/conexao.php";

    $arena_id       = $id_arena_insert;
    $tipo           = "N";
    $status         = "A";
    $dia_semana     = $_POST['dia_semana'];
    $hora_inicio    = $_POST['hora_inicio'];
    $hora_fim       = $_POST['hora_fim'];

    $sql = "INSERT INTO `disponibilidade`(`arena_id`,`tipo`, `status`, `dia_semana`, `hora_inicio`,`hora_fim`) VALUES 
    ('$arena_id', '$tipo','$status','$dia_semana','$hora_inicio','$hora_fim')";

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
    $hora_inicio    = $_POST['hora_inicio'];
    $hora_fim       = $_POST['hora_fim'];

    $sql = "UPDATE `disponibilidade` SET 

        `hora_inicio`   = '$hora_inicio',
        `hora_fim`      = '$hora_fim'

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

    $sql = "DELETE FROM `disponibilidade`
        WHERE `id` = '$id'";

    if (mysqli_query($conn, $sql)) {
        header('location:index.php');
    } else {
        echo "$sql";
    }
}

?>