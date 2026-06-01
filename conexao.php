<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "biblioteca";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conexao) {
    die("Erro ao conectar com o banco de dados");
}
?>
