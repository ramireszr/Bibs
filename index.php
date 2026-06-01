<?php
include "conexao.php";

$titulo_pagina = "Biblioteca";
include "header.php";

$consulta_livros = mysqli_query($conexao, "SELECT COUNT(*) AS total FROM livro");
$dados_livros = mysqli_fetch_assoc($consulta_livros);
$total_livros = $dados_livros["total"];

$consulta_alunos = mysqli_query($conexao, "SELECT COUNT(*) AS total FROM aluno");
$dados_alunos = mysqli_fetch_assoc($consulta_alunos);
$total_alunos = $dados_alunos["total"];

$consulta_reservas = mysqli_query($conexao, "SELECT COUNT(*) AS total FROM reserva");
$dados_reservas = mysqli_fetch_assoc($consulta_reservas);
$total_reservas = $dados_reservas["total"];
?>

<section class="hero">
    <div>
        <span class="tag">Sistema de Biblioteca</span>
        <h1>Gerencie livros, alunos e empréstimos.</h1>
        <p class="lead">Sistema feito em PHP e MySQL para cadastro de livros, áreas, alunos, empréstimos e devoluções.</p>

        <div class="acoes">
            <a class="btn" href="listar_livro.php">Ver Livros</a>
            <a class="btn btn-sec" href="cad_livro.php">Adicionar Livro</a>
        </div>
    </div>

    <div class="painel">
        <h2>Painel rápido</h2>
        <div class="mini"><strong> Livros</strong><br>Total cadastrados: <?php echo $total_livros; ?></div>
        <div class="mini"><strong> Alunos</strong><br>Total cadastrados: <?php echo $total_alunos; ?></div>
        <div class="mini"><strong> Reservas</strong><br>Total cadastradas: <?php echo $total_reservas; ?></div>
    </div>
</section>

<?php include "footer.php"; ?>
