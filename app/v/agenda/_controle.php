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


function selectAll($lFiltro, $id_arena, $data, $id_quadra)
{

    include "../../utl/conexao.php";

    $sql = "SELECT
                ag.`id` as `id`,
	            cl.`nome` as        `nome_cliente`,
                qd.`nome` as        `nome_quadra`,
                us.`nome` as        `nome_usuario`,
                ag.`data` as        `data`,
                ag.`hora_inicio` as `hora_inicio`,
                ag.`hora_fim` as    `hora_fim`,
                ag.`obs` as         `observ`,
                ag.`arena_id`   as  `arena_id`,
                ag.`quadra_id`  as  `quadra_id`,
                ag.`valor`  as       `valor`
            FROM `agenda`   as `ag`
            INNER JOIN `cliente` as `cl` ON cl.`id` = ag.`cliente_id`
            INNER JOIN `usuario` as `us` ON us.`id` = ag.`usuario_id`
            INNER JOIN `quadra` as `qd` ON qd.id = ag.`quadra_id`";
    //Verifica se existe filtro
    if ($lFiltro) {
        $sql  = $sql . " WHERE  ag.arena_id = '$id_arena' and quadra_id = '$id_quadra'";
        //Filtra data
        if ($data <> '') {
            $sql  = $sql . " and ag.data = '$data'";
        }
    }

    $sql  = $sql . "ORDER BY ag.data, ag.hora_inicio";

    $dados = mysqli_query($conn, $sql);

    return $dados;
}

function select($id)
{

    include "../../utl/conexao.php";

    $sql = "SELECT
                ag.id,
                cl.`nome` as        `nome_cliente`,
                qd.`nome` as        `nome_quadra`,
                us.`nome` as        `nome_usuario`,
                ag.`data` as        `data`,
                ag.`hora_inicio` as `hora_inicio`,
                ag.`hora_fim` as    `hora_fim`,
                ag.`obs` as         `obs`,
                ag.`arena_id`   as  `arena_id`,
                ag.`quadra_id`  as  `quadra_id`,
                ag.`valor`  as      `valor`
            FROM `agenda`   as `ag`
            INNER JOIN `cliente` as `cl` ON cl.`id` = ag.`cliente_id`
            INNER JOIN `usuario` as `us` ON us.`id` = ag.`usuario_id`
            INNER JOIN `quadra` as `qd` ON qd.id = ag.`quadra_id`
            WHERE  ag.id = '$id'";

    $dados = mysqli_query($conn, $sql);

    return $dados;
}

function insert()
{

    include "../../utl/conexao.php";

    $usuario_id     = $_POST['usuario_id'];
    $arena_id       = $_POST['arena_id'];
    $quadra_id      = $_POST['quadra_id'];
    $cliente_id     = $_POST['cliente_id'];
    $data           = $_POST['data'];
    $hora_inicio    = $_POST['hora_inicio'];
    $hora_fim       = $_POST['hora_fim'];
    $valor          = $_POST['valor'];
    $obs            = $_POST['obs'];

    $sql = "INSERT INTO `agenda`(`usuario_id`, `arena_id`, `quadra_id`, `cliente_id`, `data`, `hora_inicio`, `hora_fim`, `valor`, `obs`) VALUES 
    ('$usuario_id', '$arena_id','$quadra_id','$cliente_id','$data','$hora_inicio','$hora_fim','$valor','$obs')";

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

    $sql = "UPDATE `agenda` SET 

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

    $sql = "DELETE FROM `agenda`
        WHERE `id` = '$id'";

    if (mysqli_query($conn, $sql)) {
        header('location:index.php');
    } else {
        echo "$sql";
    }
}

function mostra_data($modo,$d)
{
    // Array com os dias da semana
    $diasemana = array('Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado');

    // Aqui podemos usar a data atual ou qualquer outra data no formato Ano-mês-dia (2014-02-28)
    $data = $d;

    // Varivel que recebe o dia da semana (0 = Domingo, 1 = Segunda ...)
    $diasemana_numero = date('w', strtotime($data));

    // Exibe o dia da semana com o Array
    $diasemana[$diasemana_numero];

    $d = explode('-', $d);
    if($modo == 1){
        $escreve = $diasemana[$diasemana_numero] . " (" . $d[2] . "/" . $d[1] . ")";
    }else{
        $escreve =" (" . $d[2] . "/" . $d[1] . ") " . strtoupper(substr($diasemana[$diasemana_numero] , 0, 3));
    }
    

    return $escreve;
}
