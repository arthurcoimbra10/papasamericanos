<?php
$paginaAtual = basename($_SERVER['PHP_SELF'] ?? 'index.php');
function itemMenu(string $arquivo, string $rotulo, string $paginaAtual): string {
    $ativo = $paginaAtual === $arquivo ? 'ativo' : '';
    return '<li><a class="' . $ativo . '" href="' . $arquivo . '">' . $rotulo . '</a></li>';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Países da América do Sul</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <div class="header-top"><a href="index.php" class="logo">Países América do Sul</a></div>
    <nav><ul>
        <?= itemMenu('index.php', 'Início', $paginaAtual) ?>
        <?= itemMenu('listar_pais.php', 'Listar Países', $paginaAtual) ?>
        <?= itemMenu('cadastrar_pais.php', 'Cadastrar País', $paginaAtual) ?>
    </ul></nav>
</header>
