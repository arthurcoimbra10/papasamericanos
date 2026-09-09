<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: cadastrar_pais.php'); exit; }

$campos = ['nome', 'capital', 'idioma', 'moeda', 'populacao', 'area', 'presidente', 'idh', 'pib', 'educacao', 'seguranca', 'saude', 'descricao'];
$dados = [];
foreach ($campos as $campo) {
    $dados[$campo] = trim($_POST[$campo] ?? '');
    if ($dados[$campo] === '') { header('Location: cadastrar_pais.php?erro=Preencha+todos+os+campos.'); exit; }
}
if (!is_numeric($dados['idh']) || $dados['idh'] < 0 || $dados['idh'] > 1) { header('Location: cadastrar_pais.php?erro=Informe+um+IDH+entre+0+e+1.'); exit; }

if (!isset($_FILES['bandeira']) || $_FILES['bandeira']['error'] !== UPLOAD_ERR_OK) { header('Location: cadastrar_pais.php?erro=Envie+a+bandeira+do+país.'); exit; }
if ($_FILES['bandeira']['size'] > 3 * 1024 * 1024) { header('Location: cadastrar_pais.php?erro=A+imagem+deve+ter+no+máximo+3+MB.'); exit; }

$tipos = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'];
$tipo = (new finfo(FILEINFO_MIME_TYPE))->file($_FILES['bandeira']['tmp_name']);
if (!isset($tipos[$tipo])) { header('Location: cadastrar_pais.php?erro=Formato+de+imagem+inválido.'); exit; }

$nomeArquivo = strtolower(preg_replace('/[^a-z0-9]+/i', '-', iconv('UTF-8', 'ASCII//TRANSLIT', $dados['nome'])));
$nomeArquivo = trim($nomeArquivo, '-') . '-' . bin2hex(random_bytes(4)) . '.' . $tipos[$tipo];
$destino = __DIR__ . '/imagens/' . $nomeArquivo;
if (!move_uploaded_file($_FILES['bandeira']['tmp_name'], $destino)) { header('Location: cadastrar_pais.php?erro=Não+foi+possível+salvar+a+imagem.'); exit; }

try {
    $sql = 'INSERT INTO paises (nome, capital, idioma, moeda, populacao, area, presidente, idh, pib, educacao, seguranca, saude, descricao, bandeira) VALUES (:nome, :capital, :idioma, :moeda, :populacao, :area, :presidente, :idh, :pib, :educacao, :seguranca, :saude, :descricao, :bandeira)';
    $dados['bandeira'] = $nomeArquivo;
    $pdo->prepare($sql)->execute($dados);
    header('Location: listar_pais.php?sucesso=País+cadastrado+com+sucesso.');
} catch (PDOException $e) {
    header('Location: cadastrar_pais.php?erro=Não+foi+possível+cadastrar+o+país.');
}
exit;
