<?php
require 'conexao.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) { header('Location: listar_pais.php?erro=País+inválido.'); exit; }
$stmt = $pdo->prepare('SELECT * FROM paises WHERE id = ?'); $stmt->execute([$id]); $pais = $stmt->fetch();
if (!$pais) { header('Location: listar_pais.php?erro=País+não+encontrado.'); exit; }
$paginaAtual = ''; require 'menu.php';
?>
<main class="container"><section class="secao"><h1>Editar País</h1>
    <?php if (!empty($_GET['erro'])): ?><div class="alerta alerta-perigo"><?= htmlspecialchars($_GET['erro']) ?></div><?php endif; ?>
    <form action="atualizar_pais.php" method="post" enctype="multipart/form-data"><input type="hidden" name="id" value="<?= $pais['id'] ?>"><input type="hidden" name="bandeira_atual" value="<?= htmlspecialchars($pais['bandeira']) ?>">
        <div class="form-grid">
        <?php foreach (['nome'=>'Nome do país','capital'=>'Capital','idioma'=>'Idioma oficial','moeda'=>'Moeda','populacao'=>'População','area'=>'Área territorial','presidente'=>'Presidente','pib'=>'PIB','educacao'=>'Educação','seguranca'=>'Segurança','saude'=>'Saúde'] as $campo => $rotulo): ?><div class="form-grupo"><label for="<?= $campo ?>"><?= $rotulo ?> *</label><input id="<?= $campo ?>" name="<?= $campo ?>" type="text" required maxlength="100" value="<?= htmlspecialchars($pais[$campo]) ?>"></div><?php endforeach; ?>
        <div class="form-grupo"><label for="idh">IDH *</label><input id="idh" name="idh" type="number" min="0" max="1" step="0.001" required value="<?= htmlspecialchars($pais['idh']) ?>"></div>
        </div>
        <div class="form-grupo"><label for="descricao">Descrição *</label><textarea id="descricao" name="descricao" required maxlength="3000"><?= htmlspecialchars($pais['descricao']) ?></textarea></div>
        <div class="form-grupo"><label for="bandeira">Nova bandeira (opcional)</label><img class="bandeira-edicao" src="imagens/<?= rawurlencode($pais['bandeira']) ?>" alt="Bandeira atual"><input id="bandeira" name="bandeira" type="file" accept="image/jpeg,image/png,image/webp"><small>Se enviada, a nova imagem será usada; a atual será preservada.</small></div>
        <div class="btn-grupo"><button class="btn btn-sucesso" type="submit">Salvar Alterações</button><a class="btn btn-primario" href="detalhes.php?id=<?= $pais['id'] ?>">Cancelar</a></div>
    </form>
</section></main></body></html>
