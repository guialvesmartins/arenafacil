<?php 

    $acao           = $_POST['acao'] ?? '';
    
    if($acao == 'insert'){
        insert();
    }elseif($acao == 'update'){
        update();
    }elseif($acao == 'delete'){
        delete();
    }
    
    
    function selectAll(){

    include "../../utl/conexao.php";

    $sql = "SELECT * FROM `plano`";
    $dados = mysqli_query($conn, $sql);

    return $dados;

    }

    function select($id){

        include "../../utl/conexao.php";
    
        $sql = "SELECT * FROM `plano` WHERE id = '$id'";
        $dados = mysqli_query($conn, $sql);
    
        return $dados;
    
    }

    function insert(){

        include "../../utl/conexao.php";

        $nome           = $_POST['nome'];
        $valor          = $_POST['valor'];    
        $status          = $_POST['status'];    
    
        $sql = "INSERT INTO `plano` (`nome`,`valor`,`status`) 
        VALUES ('$nome','$valor','$status')";

        if (mysqli_query($conn, $sql)){
            header('location:index.php');
        }else{
            echo"$sql";
        }
    
    }

    function update(){

        include "../../utl/conexao.php";

        $id             = $_POST['id'];
        $nome           = $_POST['nome'];
        $valor          = $_POST['valor']; 
        $status         = $_POST['status'];

        $sql = "UPDATE `plano` 
        SET `nome`      = '$nome',
            `valor`     = '$valor',
            `status`    = '$status'
        WHERE `id` = '$id'";

        if (mysqli_query($conn, $sql)){
            header('location:index.php');
            echo"$sql";
        }else{
            echo"$sql";
        }    
    }

    function delete(){
        include "../../utl/conexao.php";
        
        $id             = $_POST['id'];

        $sql = "DELETE FROM `plano`
        WHERE `id` = '$id'";

        if (mysqli_query($conn, $sql)){
            header('location:index.php');
        }else{
            echo"$sql";
        }    
    }

?>
