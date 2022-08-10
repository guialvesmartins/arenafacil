<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ArenaFácil - Esportes</title>
    <link href="../../css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.css" />

    <?php
    include "../../utl/controle_acesso.php";
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>

<body class="sb-nav-fixed">
    <?php
    include "../../shared/navbar.php";
    include "../../shared/menu.php";
    include "_controle.php";
    $id     = $_GET['id'];
    $dados = select($id);
    $linha = mysqli_fetch_assoc($dados);

    $nome_cliente       = $linha['nome_cliente'];
    $nome_quadra        = $linha['nome_quadra'];
    $nome_usuario       = $linha['nome_usuario'];
    $data               = $linha['data'];
    $hora_inicio        = $linha['hora_inicio'];
    $hora_fim           = $linha['hora_fim'];
    $obs                = $linha['obs'];
    $valor              = $linha['valor'];
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Esportes</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Início</li>
                    <li class="breadcrumb-item active">Agenda</li>
                    <li class="breadcrumb-item active">Esportes</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header">

                        <div class="row">
                            <div class="col" style="text-align:left">
                                <i class="fas fa-plus me-1"></i> Inclusão - Cadastro de Esportes
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="_controle.php" method="post">
                            <br>
                            <div class="row">
                                <div class="col-sm-sm-12">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <select style="width:100%" id="select_cli" name="cliente_id">
                                        <?php
                                            include "../../utl/conexao.php";
                                            $sql = "SELECT * FROM `cliente` where `arena_id` = '$arena_id_logado'";
                                            $dados = mysqli_query($conn, $sql);
                                            while ($linha = mysqli_fetch_assoc($dados)) {
                                                $nome_cliente_s = $linha['nome'];
                                                $id_cliente     = $linha['id'];
                                                $selected = "";
                                                if($nome_cliente_s == $nome_cliente){
                                                    $selected = "selected";
                                                }
                                                echo "<option value='$id_cliente' $selected>$nome_cliente_s</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-sm-6">
                                    <div class="form-group">
                                        <label>Espaço de Jogo</label>
                                        <select class="form-select" name="quadra_id" aria-label="Default select example">
                                            <?php
                                            include "../../utl/conexao.php";
                                            $sql = "SELECT * FROM `quadra` WHERE arena_id = '$arena_id_logado'";
                                            $dados = mysqli_query($conn, $sql);
                                            while ($linha = mysqli_fetch_assoc($dados)) {
                                                $nome_quadra_s = $linha['nome'];
                                                $id_quadra = $linha['id'];
                                                $selected = '';
                                                if($nome_quadra_s == $nome_quadra){
                                                    $selected = "selected";
                                                }
                                                echo "<option value='$id_quadra' $selected>$nome_quadra_s</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Data</label>
                                        <input type="date" value="<?php echo"$data"; ?>"  class="form-control" name="data">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Hora de Início</label>
                                        <input type="time" value="<?php echo"$hora_inicio"; ?>" class="form-control" name="hora_inicio">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Hora de Fim</label>
                                        <input type="time" class="form-control" value="<?php echo"$hora_fim"; ?>" name="hora_fim">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Valor</label>
                                        <input type="decimal" value="<?php echo"$valor"; ?>" class="form-control" name="valor">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Usuário</label>
                                        <input type="text" value="<?php echo "$nome_usuario"; ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Observação</label>
                                        <input type="text" class="form-control" value="<?php echo "$obs"; ?>" name="obs">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div style="text-align:center">
                                <input type="hidden" name="acao" value="insert">
                                <input type="hidden" name="arena_id" value="<?php echo "$arena_id_logado" ?>">
                                <input type="hidden" name="usuario_id" value="<?php echo "$usuario_id_logado" ?>">
                                <input type="submit" value="Salvar" class="btn btn-success">
                                <a class="btn btn-primary" href="index.php">Voltar ao inicio</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?PHP
        include "../../shared/footer.php";
        ?>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#select_cli").select2({
                placeholder: 'Selecione um cliente'
            });
        });
    </script>    
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/demo/chart-area-demo.js"></script>
    <script src="../../assets/demo/chart-bar-demo.js"></script>
</body>

</html>