<?php
require 'conexao.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) { header('Location: listar_pais.php?erro=País+inválido.'); exit; }
$stmt = $pdo->prepare('SELECT * FROM paises WHERE id = ?'); $stmt->execute([$id]); $pais = $stmt->fetch();
if (!$pais) { header('Location: listar_pais.php?erro=País+não+encontrado.'); exit; }
$coordenadas = ['Argentina'=>[-38.4,-63.6], 'Bolívia'=>[-16.3,-63.6], 'Brasil'=>[-14.2,-51.9], 'Chile'=>[-35.7,-71.5], 'Colômbia'=>[4.6,-74.1], 'Equador'=>[-1.8,-78.2], 'Guiana'=>[4.9,-58.9], 'Paraguai'=>[-23.4,-58.4], 'Peru'=>[-9.2,-75.0], 'Suriname'=>[3.9,-56.0], 'Uruguai'=>[-32.5,-55.8], 'Venezuela'=>[6.4,-66.6]];
$coord = $coordenadas[$pais['nome']] ?? [-15, -60];
require 'menu.php';
?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<main class="container"><section class="secao detalhe-pais">
    <div class="titulo-linha"><h1><?= htmlspecialchars($pais['nome']) ?></h1><div class="btn-grupo"><a class="btn btn-alerta" href="editar_pais.php?id=<?= $pais['id'] ?>">Editar</a><a class="btn btn-primario" href="listar_pais.php">Voltar</a></div></div>
    <?php if (!empty($_GET['sucesso'])): ?><div class="alerta alerta-sucesso"><?= htmlspecialchars($_GET['sucesso']) ?></div><?php endif; ?>
    <img class="bandeira-grande" src="imagens/<?= rawurlencode($pais['bandeira']) ?>" alt="Bandeira de <?= htmlspecialchars($pais['nome']) ?>">
    <div class="dados-grid">
        <?php foreach (['Capital'=>'capital','Idioma oficial'=>'idioma','Moeda'=>'moeda','População'=>'populacao','Área territorial'=>'area','Presidente'=>'presidente','IDH'=>'idh','PIB'=>'pib','Educação'=>'educacao','Segurança'=>'seguranca','Saúde'=>'saude'] as $rotulo => $campo): ?><div class="dado"><strong><?= $rotulo ?></strong><span><?= htmlspecialchars($pais[$campo]) ?></span></div><?php endforeach; ?>
    </div>
    <h2>Descrição</h2><p class="descricao"><?= nl2br(htmlspecialchars($pais['descricao'])) ?></p>
    <h2>Localização</h2><div id="mapa"></div>
</section></main>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script><script>const mapa=L.map('mapa').setView([<?= $coord[0] ?>,<?= $coord[1] ?>],4);L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{attribution:'© OpenStreetMap'}).addTo(mapa);L.marker([<?= $coord[0] ?>,<?= $coord[1] ?>]).addTo(mapa).bindPopup(<?= json_encode($pais['nome']) ?>).openPopup();</script>
</body></html>
