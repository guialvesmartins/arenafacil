<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ArenaFácil - Arenas</title>
    <link href="../../css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.css" />
    <?php
    include "../../utl/controle_acesso.php";
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
                <h1 class="mt-4">Arenas</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Início</li>
                    <li class="breadcrumb-item active">Configurações</li>
                    <li class="breadcrumb-item active">Arenas</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header">

                        <div class="row">
                            <div class="col" style="text-align:left">
                                <i class="fas fa-table me-1"></i> Cadastro de Arenas
                            </div>
                            <div class="col" style="text-align:right">
                                <a href="new.php" class="btn btn-primary btn-sm"><i class="fas fa-plus me-1"></i> Incluir</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" hidden>Id</th>
                                        <th scope="col">Dia da Semana</th>
                                        <th scope="col">H. Início</th>
                                        <th scope="col">H. Fim</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    include "_controle.php";

                                    $dados = selectAll($arena_id_logado);

                                    while ($linha = mysqli_fetch_assoc($dados)) {
                                        
                                        $id             = $linha['id'];
                                        $dia_semana     = $linha['dia_semana'];
                                        $hora_inicio    = $linha['hora_inicio'];
                                        $hora_fim       = $linha['hora_fim'];

                                        echo "  <tr>
                                            <th scope='row' hidden>$id</th>
                                            <th scope='row'>$dia_semana</th>
                                            <td>$hora_inicio</td>
                                            <td>$hora_fim</td>                                            
                                        </tr>
                                        ";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
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
                <form action="_controle.php" method="POST">
                    <div class="modal-body">
                        <p>Deseja realmente excluir </b><b id="desc">nome</b> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                        <input type="hidden" name="id" id="id_exc" value="">
                        <input type="hidden" name="acao" id="desc" value="delete">
                        <input type="submit" class="btn btn-danger" value="Sim">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                autoWidth: false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                }
            });
            $('#datatable tbody').on('click', 'tr', function() {
                var data = table.row(this).data();
                document.location='edit.php?id='+data[0];
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