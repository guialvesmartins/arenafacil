<?php
// session_start inicia a sessão

session_start();

// as variáveis login e senha recebem os dados digitados na página anterior

$usuario_acesso   = $_POST['usuario_acesso'] ?? '';
$senha_acesso     = $_POST['senha_acesso'] ?? '';

// Include de Conxeão.

include "conexao.php";

// A variavel $result pega as varias $login_acesso e $senha_acesso, faz uma
// pesquisa na tabela de usuarios

// Query De Selção de Usuário
$cQuery = "SELECT 	
                us.`id` 	as `usuario_id`,
                us.`usuario` 	as `usuario`,
		            us.`nome` 		as `nome`,
                us.`senha` 		as `senha`,
                ar.`id` 		as `arena_id`,
                ar.`nome` 		as `arena_nome`
            from `usuario` as `us` 
            inner join `usuario_arena` as `ua` on ua.`usuario_id` = us.`id`
            inner join `arena` as `ar` on ar.`id` = ua.`arena_id`
            where `usuario` = '$usuario_acesso' and `senha`= '$senha_acesso'";
//$cQuery = "select * from `usuario` where `usuario` = '$usuario_acesso' and `senha`= '$senha_acesso';

// Resultado da Query
$result = mysqli_query($conn, $cQuery);

//Array com informações de Usuário
$aUsuario = mysqli_fetch_assoc($result);

//Quantidade de Usuários com base nas variaveis usuario_acesso e senha_acesso
$qtdReg = mysqli_num_rows($result);

/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi
bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor
será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do
resultado ele redirecionará para a página site.php ou retornara  para a página
do formulário inicial para que se possa tentar novamente realizar o login */

if( $qtdReg > 0 )
{
    $_SESSION['usuario_id']   =  $aUsuario['usuario_id'];
    $_SESSION['usuario']      =  $aUsuario['usuario'];
    $_SESSION['senha']        =  $aUsuario['senha'];
    $_SESSION['nome']         =  $aUsuario['nome'];
    $_SESSION['arena_id']     =  $aUsuario['arena_id'];
    $_SESSION['arena_nome']   =  $aUsuario['arena_nome'];

    echo "<script>document.location='/arenafacil/app/index.php'</script>";
}
else{
  unset ($_SESSION['usuario']);
  unset ($_SESSION['senha']);  
  echo "<script>document.location='/arenafacil/app/login.php'</script>";
}
