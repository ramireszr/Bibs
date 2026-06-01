<?php
include "conexao.php";

$resultado = mysqli_query($conexao, "SELECT * FROM area ORDER BY id DESC");

$titulo_pagina = "Listar Área";
include "header.php";
?>

<h1>Áreas Cadastradas</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Excluir</th>
    </tr>

    <?php while ($area = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo $area["id"]; ?></td>
            <td><?php echo $area["nome"]; ?></td>
            <td>
                <a class="btn btn-danger btn-small" href="excluir_area.php?id=<?php echo $area['id']; ?>" onclick="return confirm('Excluir esta área?')">
                    Excluir
                </a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php include "footer.php"; ?>
