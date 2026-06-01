<?php
include "conexao.php";

$id = $_GET["id"];

mysqli_query($conexao, "DELETE FROM area WHERE id = '$id'");

header("Location: listar_area.php");
exit;
?>
