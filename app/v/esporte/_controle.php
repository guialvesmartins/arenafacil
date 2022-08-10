
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

    $sql = "SELECT * FROM `esporte`";
    $dados = mysqli_query($conn, $sql);

    return $dados;

    }

    function select($id){

        include "../../utl/conexao.php";
    
        $sql = "SELECT * FROM `esporte` WHERE id = '$id'";
        $dados = mysqli_query($conn, $sql);
    
        return $dados;
    
    }

    function insert(){

        include "../../utl/conexao.php";

        $nome           = $_POST['nome'];   
    
        $sql = "INSERT INTO `esporte` (`nome`) 
        VALUES ('$nome')";

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

        $sql = "UPDATE `esporte` 
        SET `nome`      = '$nome'
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

        $sql = "DELETE FROM `esporte`
        WHERE `id` = '$id'";

        if (mysqli_query($conn, $sql)){
            header('location:index.php');
        }else{
            echo"$sql";
        }    
    }

?>