<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $id_area = $_POST["id_area"];

    $sql = "INSERT INTO livro (titulo, autor, id_area, status)
            VALUES ('$titulo', '$autor', '$id_area', 0)";

    mysqli_query($conexao, $sql);

    header("Location: listar_livro.php");
    exit;
}

$areas = mysqli_query($conexao, "SELECT * FROM area ORDER BY nome");

$titulo_pagina = "Cadastrar Livro";
include "header.php";
?>

<div class="card">
    <h1>Cadastrar Livro</h1>

    <form method="POST">
        <label>Título:</label>
        <input type="text" name="titulo" required>

        <label>Autor:</label>
        <input type="text" name="autor" required>

        <label>Área:</label>
        <select name="id_area" required>
            <option value="">Selecione</option>

            <?php while ($area = mysqli_fetch_assoc($areas)) { ?>
                <option value="<?php echo $area['id']; ?>">
                    <?php echo $area['nome']; ?>
                </option>
            <?php } ?>
        </select>

        <button type="submit">Salvar</button>
    </form>
</div>

<?php include "footer.php"; ?>
