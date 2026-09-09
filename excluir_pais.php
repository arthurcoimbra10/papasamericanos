<?php
require 'conexao.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    if ($id) { $pdo->prepare('DELETE FROM paises WHERE id = ?')->execute([$id]); }
    header('Location: listar_pais.php?sucesso=Registro+excluído+com+sucesso.'); exit;
}
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) { header('Location: listar_pais.php?erro=País+inválido.'); exit; }
$stmt = $pdo->prepare('SELECT id, nome, bandeira FROM paises WHERE id = ?'); $stmt->execute([$id]); $pais = $stmt->fetch();
if (!$pais) { header('Location: listar_pais.php?erro=País+não+encontrado.'); exit; }
require 'menu.php';
?>
<main class="container"><section class="secao texto-centro"><h1>Excluir País</h1><p>Deseja excluir o registro de <strong><?= htmlspecialchars($pais['nome']) ?></strong>?</p><p>A imagem da bandeira será preservada na pasta de imagens.</p><form method="post" class="btn-grupo confirmar-exclusao"><input type="hidden" name="id" value="<?= $pais['id'] ?>"><button class="btn btn-perigo" type="submit">Sim, excluir registro</button><a class="btn btn-primario" href="listar_pais.php">Cancelar</a></form></section></main>
</body></html>
