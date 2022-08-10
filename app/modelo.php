<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ArenaFácil - Usuários</title>
    <link href="../../css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.css" />
    <?php
    /* esse bloco de código em php verifica se existe a sessão, pois o usuário pode
         simplesmente não fazer o login e digitar na barra de endereço do seu navegador
        o caminho para a página principal do site (sistema), burlando assim a obrigação de
        fazer um login, com isso se ele não estiver feito o login não será criado a session,
        então ao verificar que a session não existe a página redireciona o mesmo
         para a index.php.*/
    session_start();
    if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
        header('location:/arenafacil/app/login.php');
    }

    $logado = $_SESSION['arena_nome'];

    ?>
</head>

<body class="sb-nav-fixed">
    <?php
    include "../../shared/navbar.php";
    include "../../shared/menu.php";
    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Usuários</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Início</li>
                    <li class="breadcrumb-item active">Configurações</li>
                    <li class="breadcrumb-item active">Usuários</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header">
                        
                        <i class="fas fa-table me-1"></i>
                        Cadastro de Usuários
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="datatable">
                            <thead> 
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Usuário</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                include "_controle.php";

                                $dados = select();

                                while ($linha = mysqli_fetch_assoc($dados)) {

                                    $id             = $linha['id'];
                                    $usuario        = $linha['usuario'];
                                    $nome           = $linha['nome'];
                                    $email          = $linha['email'];

                                    echo "  <tr>
                                            <th scope='row'>$id</th>
                                            <td>$usuario</td>
                                            <td>$nome</td>
                                            <td>$email</td>

                                            <td> 
                                                <a href='view.php?id=$id' class='btn btn-primary btn-sm'> Vizualizar </a>
                                                <a href='edit.php?id=$id' class='btn btn-warning btn-sm'> Editar </a>
                                                <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirmaExclusao'
                                                onclick=" . '"' . "pegar_dados($id, '$nome')" . '"' . "> Excluir </a>
                                            </td>
                                        </tr>
                                        ";
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <?PHP
        include "../../shared/footer.php";
        ?>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="confirmaExclusao" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Exclusão ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="script_excluir.php" method="POST">
                    <div class="modal-body">
                        <p>Deseja realmente excluir </b><b id="desc">nome</b> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                        <input type="hidden" name="id" id="id_exc" value="">
                        <input type="hidden" name="desc" id="desc" value="">
                        <input type="submit" class="btn btn-danger" value="Sim">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>

    <script>
        function pegar_dados(id, nome) {
            document.getElementById('desc').innerHTML = nome;
            document.getElementById('desc').value = nome;
            document.getElementById('id_exc').value = id;
        }
        $(document).ready(function() {
            $('#datatable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/demo/chart-area-demo.js"></script>
    <script src="../../assets/demo/chart-bar-demo.js"></script>
</body>

</html>