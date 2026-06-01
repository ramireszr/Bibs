<?php
include "conexao.php";

$sql = "SELECT livro.*, area.nome AS nome_area
        FROM livro
        LEFT JOIN area ON livro.id_area = area.id
        ORDER BY livro.id DESC";

$resultado = mysqli_query($conexao, $sql);

$titulo_pagina = "Listar Livros";
include "header.php";
?>

<h1>Livros Cadastrados</h1>

<table>
    <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Área</th>
        <th>Status</th>
        <th>Excluir</th>
    </tr>

    <?php while ($livro = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo $livro["titulo"]; ?></td>
            <td><?php echo $livro["autor"]; ?></td>
            <td><?php echo $livro["nome_area"]; ?></td>
            <td>
                <?php
                if ($livro["status"] == 1 || $livro["status"] == "Emprestado") {
                    echo '<span class="status emprestado">Emprestado</span>';
                } else {
                    echo '<span class="status disponivel">Disponível</span>';
                }
                ?>
            </td>
            <td>
                <a class="btn btn-danger btn-small" href="excluir_livro.php?id=<?php echo $livro['id']; ?>" onclick="return confirm('Excluir este livro?')">
                    Excluir
                </a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php include "footer.php"; ?>
