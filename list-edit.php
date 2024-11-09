<?php
session_start();
require_once('conexao.php');

$tarefas = [];

if (!isset($_GET['id'])) {
    header('Location: index.php');
} else {
    $tarefasId = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM tarefas WHERE id = '{$tarefasId}'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $tarefas = mysqli_fetch_array($query);
    }
}

?>
<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h4>
                    Editar Tarefa <i class="bi bi-list-task"></i>
                    <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="acoes.php" method="POST">
                    <input type="hidden" name="tarefas_id" value="<?= $tarefas['id'] ?>">
                    <div class="mb-3">
                        <label for="txtNome">Nome da Tarefa</label>
                        <input type="text" name="txtNome" id="txtNome" value="<?=$tarefas['Nome']?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="txtdescricao">Descrição</label>
                        <input type="text" name="txtdescricao" id="txtdescricao" value="<?=$tarefas['Descrição']?>" class="form-control">
                    </div>
                    <div>
                    <select class="form-select" aria-label="Default select example" name="txtStatus" id="txtStatus">
                        <option selected>Status</option>
                        <option value="1" <?= $tarefas['Status'] == 1 ? 'selected' : '' ?>>Pendente</option>
                        <option value="2" <?= $tarefas['Status'] == 2 ? 'selected' : '' ?>>Execução</option>
                        <option value="3" <?= $tarefas['Status'] == 3 ? 'selected' : '' ?>>Concluido</option>
                    </select>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="txtDataLimite">Data Limite</label>
                        <input type="date" name="txtDataLimite" id="txtDatalimite" value="<?=$tarefas['Data_Limite']?>" class="form-control">
                    </div>

                    <br>
                    <div class="mb-3">
                        <button type="submit" name="edit_tarefa" class="btn btn-info float-end">Salvar Tarefa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>