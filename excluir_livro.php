<?php
include "conexao.php";

$id = $_GET["id"];

mysqli_query($conexao, "DELETE FROM livro WHERE id = '$id'");

header("Location: listar_livro.php");
exit;
?>
