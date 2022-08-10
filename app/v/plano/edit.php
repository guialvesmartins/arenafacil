<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ArenaFácil - Planos</title>
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
    include "_controle.php";
    $id     = $_GET['id'];
    $dados = select($id);
    $linha = mysqli_fetch_assoc($dados);

    $nome           = $linha['nome'];
    $valor          = $linha['valor'];
    $status         = $linha['status'];
    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Planos</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Início</li>
                    <li class="breadcrumb-item active">Configurações</li>
                    <li class="breadcrumb-item active">Planos</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header">

                        <div class="row">
                            <div class="col" style="text-align:left">
                                <i class="fas fa-plus me-1"></i> Inclusão - Cadastro de Planos
                            </div>
                            <div class="col" style="text-align:right">
                                <?php echo"<a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirmaExclusao'
                                                onclick=" . '"' . "pegar_dados($id, '$nome')" . '"' . "><i class='fas fa-trash me-1'></i> Excluir </a>"; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="_controle.php" method="post">
                            <br>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nome do Plano</label>
                                        <input type="text" class="form-control" value="<?php echo "$nome" ?>" name="nome" placeholder="Nome" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Valor</label>
                                        <input type="number" step="any" class="form-control" value="<?php echo "$valor" ?>" name="valor" placeholder="10,90" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-6">
                                    <select class="form-select" name="status" aria-label="Default select example" required>
                                        <option selected value="1">Ativo</option>
                                        <option value="0">Inativo</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div style="text-align:center">
                                <input type="hidden" name="acao" value="update">
                                <input type="hidden" name="id" value="<?php echo "$id" ?>">
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

    <script>
        function pegar_dados(id, nome) {
            document.getElementById('desc').innerHTML = nome;
            document.getElementById('desc').value = nome;
            document.getElementById('id_exc').value = id;
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/demo/chart-area-demo.js"></script>
    <script src="../../assets/demo/chart-bar-demo.js"></script>
</body>

</html>