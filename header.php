<?php
if (!isset($titulo_pagina)) {
    $titulo_pagina = "Biblioteca";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo_pagina; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="topo">
    <a class="logo" href="index.php"><span>📚</span> Biblioteca</a>

    <nav class="menu">
        <a href="cad_livro.php">Cadastrar Livro</a>
        <a href="listar_livro.php">Listar Livros</a>
        <a href="cad_aluno.php">Cadastrar Aluno</a>
        <a href="cad_area.php">Cadastrar Área</a>
        <a href="listar_area.php">Listar Área</a>
        <a href="emprestimo.php">Empréstimo</a>
        <a href="devolucao.php">Devolução</a>
    </nav>
</header>

<main class="container">
