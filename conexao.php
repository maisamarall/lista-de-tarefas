<?php

$host = "localhost"; 
$tarefas = "root";
$senha = "";
$banco = "tarefa";

$conn = mysqli_connect($host, $tarefas, $senha, $banco) or die('Não foi possível conectar');

?> 