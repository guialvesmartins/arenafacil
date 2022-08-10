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
</head>

<body class="sb-nav-fixed">
    <?php
    include "../../shared/navbar.php";
    include "../../shared/menu.php";
    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Esportes</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Início</li>
                    <li class="breadcrumb-item active">Configurações</li>
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Dia da Semana</label>
                                        <select class="form-select" name="dia_semana" aria-label="Default select example">                                        
                                        <option value="2 - Segunda-Feira">2 - Segunda-Feira</option>
                                        <option value="3 - Terça-Feira">3 - Terça-Feira</option>
                                        <option value="4 - Quarta-Feira">4 - Quarta-Feira</option>
                                        <option value="5 - Quinta-Feira">5 - Quinta-Feira</option>
                                        <option value="6 - Sexta-Feira">6 - Sexta-Feira</option>
                                        <option value="7 - Sábado">7 - Sábado</option>
                                        <option value="1 - Domingo">1 - Domingo</option>                                     
                                    </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Hora de Início</label>
                                        <input type="time" class="form-control" name="hora_inicio">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Hora de Fim</label>
                                        <input type="time" class="form-control" name="hora_fim">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div style="text-align:center">
                                <input type="hidden" name="acao" value="insert">
                                <input type="hidden" name="arena_id" value="<?php echo"$arena_id_logado" ?>">
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


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/demo/chart-area-demo.js"></script>
    <script src="../../assets/demo/chart-bar-demo.js"></script>
</body>

</html>