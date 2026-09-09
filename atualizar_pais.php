<?php
require 'conexao.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: listar_pais.php'); exit; }
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!$id) { header('Location: listar_pais.php?erro=País+inválido.'); exit; }
$campos = ['nome', 'capital', 'idioma', 'moeda', 'populacao', 'area', 'presidente', 'idh', 'pib', 'educacao', 'seguranca', 'saude', 'descricao']; $dados = ['id' => $id];
foreach ($campos as $campo) { $dados[$campo] = trim($_POST[$campo] ?? ''); if ($dados[$campo] === '') { header("Location: editar_pais.php?id=$id&erro=Preencha+todos+os+campos."); exit; } }
if (!is_numeric($dados['idh']) || $dados['idh'] < 0 || $dados['idh'] > 1) { header("Location: editar_pais.php?id=$id&erro=Informe+um+IDH+entre+0+e+1."); exit; }
$stmt = $pdo->prepare('SELECT bandeira FROM paises WHERE id = ?'); $stmt->execute([$id]); $atual = $stmt->fetch();
if (!$atual) { header('Location: listar_pais.php?erro=País+não+encontrado.'); exit; }
$dados['bandeira'] = $atual['bandeira'];
if (isset($_FILES['bandeira']) && $_FILES['bandeira']['error'] !== UPLOAD_ERR_NO_FILE) {
    $tipos = ['image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp'];
    $tipo = $_FILES['bandeira']['error'] === UPLOAD_ERR_OK ? (new finfo(FILEINFO_MIME_TYPE))->file($_FILES['bandeira']['tmp_name']) : '';
    if (!isset($tipos[$tipo]) || $_FILES['bandeira']['size'] > 3 * 1024 * 1024) { header("Location: editar_pais.php?id=$id&erro=Envie+uma+imagem+JPG,+PNG+ou+WEBP+de+até+3+MB."); exit; }
    $base = strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', iconv('UTF-8', 'ASCII//TRANSLIT', $dados['nome'])), '-'));
    $dados['bandeira'] = $base . '-' . bin2hex(random_bytes(4)) . '.' . $tipos[$tipo];
    if (!move_uploaded_file($_FILES['bandeira']['tmp_name'], __DIR__ . '/imagens/' . $dados['bandeira'])) { header("Location: editar_pais.php?id=$id&erro=Não+foi+possível+salvar+a+imagem."); exit; }
}
$sql = 'UPDATE paises SET nome=:nome, capital=:capital, idioma=:idioma, moeda=:moeda, populacao=:populacao, area=:area, presidente=:presidente, idh=:idh, pib=:pib, educacao=:educacao, seguranca=:seguranca, saude=:saude, descricao=:descricao, bandeira=:bandeira WHERE id=:id';
$pdo->prepare($sql)->execute($dados);
header("Location: detalhes.php?id=$id&sucesso=Alterações+salvas+com+sucesso."); exit;
