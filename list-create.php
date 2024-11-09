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
                        Adicionar Tarefa <i class="bi bi-list-task"></i>
                        <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="acoes.php" method="POST">
                        <div class="mb-3">
                            <label for="txtNome">Nome da Tarefa</label>
                            <input type="text" name="txtNome" id="txtNome" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="txtdescricao">Descrição</label>
                            <input type="text" name="txtDescricao" id="txtDescrição" class="form-control">
                        </div>
                        <select class="form-select" aria-label="Default select example" name="txtStatus">
                            <option selected>Status da Tarefa</option>
                            <option value="1">Execução</option>
                            <option value="2">Pendente</option>
                            <option value="3">Concluido</option>
                        </select>
                        <br>
                        <div class="mb-3">
                            <label for="txtDataLimite">Data Limite</label>
                            <input type="date" name="txtDataLimite" id="txtDataLimite" class="form-control">
                        </div>

                        <br>
                        <div class="mb-3">
                            <button type="submit" name="create-list" class="btn btn-info float-end">Salvar Tarefa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

