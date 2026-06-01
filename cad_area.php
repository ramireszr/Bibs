<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];

    $sql = "INSERT INTO area (nome) VALUES ('$nome')";
    mysqli_query($conexao, $sql);

    header("Location: listar_area.php");
    exit;
}

$titulo_pagina = "Cadastrar Área";
include "header.php";
?>

<div class="card">
    <h1>Cadastrar Área</h1>

    <form method="POST">
        <label>Nome da Área:</label>
        <input type="text" name="nome" required>

        <button type="submit">Salvar</button>
    </form>
</div>

<?php include "footer.php"; ?>
