<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $data_nascimento = $_POST["data_nascimento"];

    $sql = "INSERT INTO aluno (nome, email, cpf, data_nascimento)
            VALUES ('$nome', '$email', '$cpf', '$data_nascimento')";

    mysqli_query($conexao, $sql);

    header("Location: cad_aluno.php?ok=1");
    exit;
}

$titulo_pagina = "Cadastrar Aluno";
include "header.php";
?>

<div class="card">
    <h1>Cadastrar Aluno</h1>

    <?php if (isset($_GET["ok"])) { ?>
        <div class="msg">Aluno cadastrado com sucesso!</div>
    <?php } ?>

    <form method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Email:</label>
        <input type="email" name="email">

        <label>CPF:</label>
        <input type="text" name="cpf">

        <label>Data de nascimento:</label>
        <input type="date" name="data_nascimento">

        <button type="submit">Salvar</button>
    </form>
</div>

<?php include "footer.php"; ?>
