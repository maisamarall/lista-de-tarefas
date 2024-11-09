<?php
session_start();
require_once('conexao.php');

if (isset($_POST['create-list'])) {
    $nome = trim($_POST['txtNome']);
    $descricao = trim($_POST['txtDescricao']);
    $status = trim($_POST['txtStatus']);
    $dataLimite = trim($_POST['txtDataLimite']);
    $sql = "INSERT INTO tarefas (Nome, Descrição, Status, Data_Limite) VALUES('$nome', '$descricao', '$status', '$dataLimite')";

    mysqli_query($conn, $sql);

    header('Location: index.php');
    exit();
}

if (isset($_POST['delete_tarefas'])){
    $tarefaId = mysqli_real_escape_string($conn, $_POST['delete_tarefas']);
    $sql = "DELETE FROM tarefas WHERE id = '$tarefas_id'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "Tarefa com ID {$tarefas_id} excluido com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Ops! Não foi possível excluir a tarefa";
        $_SESSION['type'] = 'error';
    }

    header('Location: index.php');
    exit();
}

if (isset($_POST['edit_tarefa'])) {
    $tarefasId = mysqli_real_escape_string($conn, $_POST['tarefas_id']);
    $nome = trim($_POST['txtNome']);
    $descricao = trim($_POST['txtdescricao']);
    $status = trim($_POST['txtStatus']);
    $data = trim($_POST['txtDataLimite']);

    $sql = "UPDATE tarefas SET Nome = '{$nome}', Descrição = '{$descricao}', Status = '{$status}', Data_Limite = '{$data}' WHERE id = '{$tarefasId}'";

    // $sql = "UPDATE tarefas SET Nome = '{$nome}', Descrição = '{$descricao}', Status = '{$status}', Data_Limite = '{$data}' WHERE id = '{$tarefasId}'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "Tarefa {$tarefasId}atualizada com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Não foi possível atualizar a tarefa {$tarefasId}.";
        $_SESSION['type'] = 'error';
    }

    header("Location: index.php");
    exit;
}
