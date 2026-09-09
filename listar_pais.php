<?php
require 'conexao.php';
$busca = trim($_GET['busca'] ?? '');
$ordem = ($_GET['ordem'] ?? 'nome') === 'id' ? 'id' : 'nome';
$sql = 'SELECT * FROM paises';
$params = [];
if ($busca !== '') { $sql .= ' WHERE nome LIKE :busca OR capital LIKE :busca'; $params['busca'] = "%$busca%"; }
$sql .= " ORDER BY $ordem ASC";
$stmt = $pdo->prepare($sql); $stmt->execute($params); $paises = $stmt->fetchAll();
$paginaAtual = 'listar_pais.php'; require 'menu.php';
?>
<main class="container">
    <section class="secao">
        <div class="titulo-linha"><div><h1>Países Cadastrados</h1><p><?= count($paises) ?> país(es) encontrado(s).</p></div><a class="btn btn-sucesso" href="cadastrar_pais.php">Cadastrar País</a></div>
        <?php if (!empty($_GET['sucesso'])): ?><div class="alerta alerta-sucesso"><?= htmlspecialchars($_GET['sucesso']) ?></div><?php endif; ?>
        <?php if (!empty($_GET['erro'])): ?><div class="alerta alerta-perigo"><?= htmlspecialchars($_GET['erro']) ?></div><?php endif; ?>
        <form class="filtros" method="get">
            <input type="text" name="busca" value="<?= htmlspecialchars($busca) ?>" placeholder="Buscar por país ou capital">
            <select name="ordem"><option value="nome">Ordenar por nome</option><option value="id" <?= $ordem === 'id' ? 'selected' : '' ?>>Ordem de cadastro</option></select>
            <button class="btn btn-primario" type="submit">Buscar</button>
        </form>
        <?php if (!$paises): ?><div class="alerta alerta-info">Nenhum país encontrado. <a href="cadastrar_pais.php">Cadastre o primeiro país.</a></div>
        <?php else: ?><div class="tabela-responsiva"><table><thead><tr><th>Bandeira</th><th>País</th><th>Capital</th><th>Idioma</th><th class="coluna-acoes">Ações</th></tr></thead><tbody>
            <?php foreach ($paises as $pais): ?><tr>
                <td><img class="bandeira-mini" src="imagens/<?= rawurlencode($pais['bandeira']) ?>" alt="Bandeira de <?= htmlspecialchars($pais['nome']) ?>"></td>
                <td><?= htmlspecialchars($pais['nome']) ?></td><td><?= htmlspecialchars($pais['capital']) ?></td><td><?= htmlspecialchars($pais['idioma']) ?></td>
                <td class="coluna-acoes"><a class="btn btn-info btn-pequeno" href="detalhes.php?id=<?= $pais['id'] ?>">Ver</a><a class="btn btn-alerta btn-pequeno" href="editar_pais.php?id=<?= $pais['id'] ?>">Editar</a><a class="btn btn-perigo btn-pequeno" href="excluir_pais.php?id=<?= $pais['id'] ?>">Excluir</a></td>
            </tr><?php endforeach; ?>
        </tbody></table></div><?php endif; ?>
    </section>
</main>
</body></html>
