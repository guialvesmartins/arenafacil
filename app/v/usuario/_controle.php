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

    $sql = "SELECT * FROM `usuario`";
    $dados = mysqli_query($conn, $sql);

    return $dados;

    }

    function select($id){

        include "../../utl/conexao.php";
    
        $sql = "SELECT * FROM `usuario` WHERE id = '$id'";
        $dados = mysqli_query($conn, $sql);
    
        return $dados;
    
    }

    function insert(){

        include "../../utl/conexao.php";

        $nome           = $_POST['nome'];
        $sobrenome      = $_POST['sobrenome'];    
        $email          = $_POST['email']; 
        $usuario        = $_POST['usuario']; 
        $senha          = $_POST['senha']; 
    
        $sql = "INSERT INTO `usuario` (`nome`,`sobrenome`,`email`,`usuario`,`senha`) 
        VALUES ('$nome','$sobrenome','$email','$usuario','$senha')";

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
        $sobrenome      = $_POST['sobrenome'];    
        $email          = $_POST['email']; 
        $usuario        = $_POST['usuario']; 
        $senha          = $_POST['senha']; 
    
        $sql = "UPDATE `usuario` 
        SET `nome`      = '$nome',
            `sobrenome` = '$sobrenome',
            `email`     = '$email',
            `usuario`   = '$usuario',
            `senha`     = '$senha'
        WHERE `id` = '$id'";

        if (mysqli_query($conn, $sql)){
            header('location:index.php');
        }else{
            echo"$sql";
        }    
    }

    function delete(){
        include "../../utl/conexao.php";
        
        $id             = $_POST['id'];

        $sql = "DELETE FROM `usuario`
        WHERE `id` = '$id'";

        if (mysqli_query($conn, $sql)){
            header('location:index.php');
        }else{
            echo"$sql";
        }    
    }

?>