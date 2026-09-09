<?php $paginaAtual = 'cadastrar_pais.php'; require 'menu.php'; ?>
<main class="container">
    <section class="secao">
        <h1>Cadastrar País</h1>
        <p>Preencha as informações e envie a bandeira do país.</p>
        <?php if (!empty($_GET['erro'])): ?><div class="alerta alerta-perigo"><?= htmlspecialchars($_GET['erro']) ?></div><?php endif; ?>
        <form action="salvar_pais.php" method="post" enctype="multipart/form-data">
            <div class="form-grid">
                <div class="form-grupo"><label for="nome">Nome do país *</label><input id="nome" name="nome" type="text" required maxlength="100"></div>
                <div class="form-grupo"><label for="capital">Capital *</label><input id="capital" name="capital" type="text" required maxlength="100"></div>
                <div class="form-grupo"><label for="idioma">Idioma oficial *</label><input id="idioma" name="idioma" type="text" required maxlength="100"></div>
                <div class="form-grupo"><label for="moeda">Moeda *</label><input id="moeda" name="moeda" type="text" required maxlength="100"></div>
                <div class="form-grupo"><label for="populacao">População *</label><input id="populacao" name="populacao" type="text" required maxlength="100" placeholder="Ex.: 46 milhões"></div>
                <div class="form-grupo"><label for="area">Área territorial *</label><input id="area" name="area" type="text" required maxlength="100" placeholder="Ex.: 2.780.400 km²"></div>
                <div class="form-grupo"><label for="presidente">Presidente *</label><input id="presidente" name="presidente" type="text" required maxlength="100"></div>
                <div class="form-grupo"><label for="idh">IDH *</label><input id="idh" name="idh" type="number" required min="0" max="1" step="0.001" placeholder="Ex.: 0.845"></div>
                <div class="form-grupo"><label for="pib">PIB *</label><input id="pib" name="pib" type="text" required maxlength="100" placeholder="Ex.: USD 1,1 trilhões"></div>
                <div class="form-grupo"><label for="educacao">Educação *</label><input id="educacao" name="educacao" type="text" required maxlength="100"></div>
                <div class="form-grupo"><label for="seguranca">Segurança *</label><input id="seguranca" name="seguranca" type="text" required maxlength="100"></div>
                <div class="form-grupo"><label for="saude">Saúde *</label><input id="saude" name="saude" type="text" required maxlength="100"></div>
            </div>
            <div class="form-grupo"><label for="descricao">Descrição *</label><textarea id="descricao" name="descricao" required maxlength="3000"></textarea></div>
            <div class="form-grupo"><label for="bandeira">Bandeira do país *</label><input id="bandeira" name="bandeira" type="file" accept="image/jpeg,image/png,image/webp" required><small>Formatos aceitos: JPG, PNG e WEBP (máx. 3 MB).</small></div>
            <div class="btn-grupo"><button class="btn btn-sucesso" type="submit">Salvar País</button><a class="btn btn-primario" href="listar_pais.php">Cancelar</a></div>
        </form>
    </section>
</main>
</body></html>
