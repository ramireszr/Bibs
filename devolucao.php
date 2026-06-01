<?php
include "conexao.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $consulta = mysqli_query($conexao, "SELECT id_livro FROM reserva WHERE id = '$id'");
    $reserva = mysqli_fetch_assoc($consulta);

    if ($reserva) {
        $id_livro = $reserva["id_livro"];

        mysqli_query($conexao, "UPDATE reserva SET status = 0, data_devolucao = CURDATE() WHERE id = '$id'");
        mysqli_query($conexao, "UPDATE livro SET status = 0 WHERE id = '$id_livro'");
    }

    header("Location: devolucao.php");
    exit;
}

$sql = "SELECT reserva.id, livro.titulo, aluno.nome, reserva.data_retirada, reserva.data_entrega
        FROM reserva
        INNER JOIN livro ON reserva.id_livro = livro.id
        INNER JOIN aluno ON reserva.matricula = aluno.matricula
        WHERE reserva.status = 1
        ORDER BY reserva.id DESC";

$resultado = mysqli_query($conexao, $sql);

$titulo_pagina = "Devolução";
include "header.php";
?>

<h1>Devolução de Livros</h1>

<table>
    <tr>
        <th>Livro</th>
        <th>Aluno</th>
        <th>Data Retirada</th>
        <th>Data Entrega</th>
        <th>Ação</th>
    </tr>

    <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo $linha["titulo"]; ?></td>
            <td><?php echo $linha["nome"]; ?></td>
            <td><?php echo $linha["data_retirada"]; ?></td>
            <td><?php echo $linha["data_entrega"]; ?></td>
            <td>
                <a class="btn btn-small" href="devolucao.php?id=<?php echo $linha['id']; ?>">
                    Devolver
                </a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php include "footer.php"; ?>
