<?php
session_start();
require_once("conexao.php");

$sql = "SELECT * FROM tarefas";
$tarefa = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h4>
                Lista de Tarefas <i class="bi bi-list-task"></i>
            </h4>
            <a href="list-create.php" class="btn btn-info float-end">Adicionar Tarefas</a>
        </div>
        <div class="table table-bordered table-striped">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Data_Limite</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tarefa as $tarefas): ?>
                        <tr>
                            <td><?php echo $tarefas['id']; ?></td>
                            <td><?php echo $tarefas['Nome']; ?></td>
                            <td><?php echo $tarefas['Descrição']; ?></td>
                            <td>
                                <?php
                                if ($tarefas['Status'] == 1) {
                                    echo " Pendente...";
                                } elseif ($tarefas['Status'] == 2) {
                                    echo " Em execução...";
                                } elseif ($tarefas['Status'] == 3) {
                                    echo " Concluído";
                                } else {
                                    echo "Indefinido";
                                }
                                ?>
                            </td>
                            <td><?php echo date('d/m/Y', strtotime($tarefas['Data_Limite'])); ?></td>
                            <td>
                                <a href="list-edit.php?id=<?= $tarefas['id'] ?>" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <form action="acoes.php" method="POST" class="d-inline">
                                    <button onclick="return confirm('Tem certeza que deseja excluir essa tarefa?')" name="delete_tarefas" type="submit" value="<?= $tarefas['id'] ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i><button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>