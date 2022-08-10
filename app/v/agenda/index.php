<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ArenaFácil - Horários</title>
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
    $data_select      = $_POST['data_agend'] ?? date("Y-m-d");
    $quadra_id_select = $_POST['id_quadra'] ?? 1;
    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Horários</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Início</li>
                    <li class="breadcrumb-item active">Agenda</li>
                    <li class="breadcrumb-item active">Horários</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header">

                        <div class="row">
                            <div class="col" style="text-align:left">
                                <i class="fas fa-table me-1"></i> Cadastro de Horários
                            </div>
                            <div class="col" style="text-align:right">
                                <a href="new.php" class="btn btn-success btn-sm"><i class="fas fa-plus me-1"></i> Novo Agendamento</a>                                
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="index.php" method="POST">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Data</label>
                                                <input type="date" value="<?php echo "$data_select" ?>" class="form-control" name="data_agend">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Espaço</label>
                                                <select class="form-select" name="id_quadra" aria-label="Default select example">
                                                    <?php
                                                    include "../../utl/conexao.php";
                                                    $sql = "SELECT * FROM `quadra` WHERE arena_id = '$arena_id_logado'";
                                                    $dados = mysqli_query($conn, $sql);
                                                    while ($linha = mysqli_fetch_assoc($dados)) {
                                                        $nome_quadra = $linha['nome'];
                                                        $id_quadra = $linha['id'];
                                                        $selected = '';
                                                        if($id_quadra == $quadra_id_select){
                                                            $selected = 'selected';
                                                        }
                                                        echo "<option value='$id_quadra' $selected>$nome_quadra</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <br>
                                                <button type="submit" class="btn btn-secondary">
                                                    <i class="fa fa-filter"></i> Filtrar
                                                </button>
                                                <a href='#' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modalAgendamentos'><i class="fa fa-clock"></i> Todos os Agendamentos</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered nowrap" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" hidden>Id</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Espaço</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">H. Início</th>
                                        <th scope="col">H. Fim</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    include "_controle.php";

                                    $dados = selectAll(true, $arena_id_logado, $data_select, $quadra_id_select);

                                    while ($linha = mysqli_fetch_assoc($dados)) {

                                        $id             = $linha['id'];
                                        $cliente        = $linha['nome_cliente'];
                                        $quadra         = $linha['nome_quadra'];
                                        $data           = mostra_data(1,$linha['data']);
                                        $hora_inicio    = $linha['hora_inicio'];
                                        $hora_fim       = $linha['hora_fim'];

                                        echo "  <tr>
                                            <th scope='row' hidden>$id</th>
                                            <th scope='row'>$cliente</th>
                                            <th scope='row'>$quadra</th>
                                            <th scope='row'>$data</th>
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
    <!-- Modal Exclusão -->
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

    <!-- Modal Agendamentos -->
    <div class="modal fade bd-example-modal-xl" id="modalAgendamentos" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Todos os Agendamentos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="_controle.php" method="POST">
                    <div class="modal-body">
                        <table class="table table-striped table-bordered nowrap" id="datatable_md">
                            <thead>
                                <tr>
                                    <th scope="col" hidden>Id</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Espaço</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">H. Início</th>
                                    <th scope="col">H. Fim</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $dados_md = selectAll(false, $arena_id_logado, $data_select, $quadra_id_select);

                                while ($linha_md = mysqli_fetch_assoc($dados_md)) {

                                    $id_md             = $linha_md['id'];
                                    $cliente_md        = $linha_md['nome_cliente'];
                                    $quadra_md         = $linha_md['nome_quadra'];
                                    $data_md           = mostra_data(2,$linha_md['data']);
                                    $hora_inicio_md    = $linha_md['hora_inicio'];
                                    $hora_fim_md       = $linha_md['hora_fim'];

                                    echo "  <tr>
                                            <th scope='row' hidden>$id_md</th>
                                            <th scope='row'>$cliente_md</th>
                                            <th scope='row'>$quadra_md</th>
                                            <th scope='row'>$data_md</th>
                                            <td>$hora_inicio_md</td>
                                            <td>$hora_fim_md</td>
                                            
                                            <td>                                                 
                                                <a href='edit.php?id=$id_md' class='btn btn-secondary btn-sm'><i class='fas fa-bars me-1'></i></a>
                                            </td>
                                        </tr>
                                        ";
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
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
            var table = $('#datatable').DataTable({
                autoWidth: false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                },
                bFilter: false,
                bInfo: false,
                bPaginate: false
            });
            $('#datatable tbody').on('click', 'tr', function() {
                var data = table.row(this).data();
                document.location='edit.php?id='+data[0];
            });
        });
        $(document).ready(function() {
            $('#datatable_md').DataTable({
                autoWidth: false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                },
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