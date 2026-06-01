<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_livro = $_POST["id_livro"];
    $matricula = $_POST["matricula"];

    $sql = "INSERT INTO reserva (matricula, id_livro, data_retirada, data_entrega, status, data_emprestimo)
            VALUES ('$matricula', '$id_livro', CURDATE(), DATE_ADD(CURDATE(), INTERVAL 7 DAY), 1, CURDATE())";

    mysqli_query($conexao, $sql);

    mysqli_query($conexao, "UPDATE livro SET status = 1 WHERE id = '$id_livro'");

    header("Location: devolucao.php");
    exit;
}

$livros = mysqli_query($conexao, "SELECT * FROM livro WHERE status = 0 OR status = 'Disponível' OR status IS NULL ORDER BY titulo");
$alunos = mysqli_query($conexao, "SELECT * FROM aluno ORDER BY nome");

$titulo_pagina = "Empréstimo";
include "header.php";
?>

<div class="card">
    <h1>Realizar Empréstimo</h1>

    <form method="POST">
        <label>Livro:</label>
        <select name="id_livro" required>
            <option value="">Selecione</option>

            <?php while ($livro = mysqli_fetch_assoc($livros)) { ?>
                <option value="<?php echo $livro['id']; ?>">
                    <?php echo $livro['titulo']; ?>
                </option>
            <?php } ?>
        </select>

        <label>Aluno:</label>
        <select name="matricula" required>
            <option value="">Selecione</option>

            <?php while ($aluno = mysqli_fetch_assoc($alunos)) { ?>
                <option value="<?php echo $aluno['matricula']; ?>">
                    <?php echo $aluno['nome']; ?> - Matrícula: <?php echo $aluno['matricula']; ?>
                </option>
            <?php } ?>
        </select>

        <button type="submit">Emprestar</button>
    </form>
</div>

<?php include "footer.php"; ?>
