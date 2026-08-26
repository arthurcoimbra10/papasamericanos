<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Países da América do Sul - Sistema de Gerenciamento</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="header-top">
            <a href="index.php" class="logo">
                Países América do Sul
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php" class="ativo">Início</a></li>
                <li><a href="listar_pais.php">Listar Países</a></li>
                <li><a href="cadastrar_pais.php">Novo País</a></li>
                <li><a href="#contato">Sobre</a></li>
            </ul>
        </nav>
    </header>
    <main class="container">
        <div class="secao texto-centro">
            <h1>Sistema de Gerenciamento de Países</h1>
            
            <div class="btn-grupo" style="justify-content: center;">
                <a href="listar_pais.php" class="btn btn-primario btn-grande">
                    Ver Todos os Países
                </a>
                <a href="cadastrar_pais.php" class="btn btn-sucesso btn-grande">
                    Cadastrar Novo País
                </a>
            </div>
        </div>
        <div class="secao">
            <h2>Recursos Disponíveis</h2>
            
            <div class="cards-grid">
                <div class="card">
                  <center>  <div class="card-titulo">Listar Países</div> </center>
                   <center> <a href="listar_pais.php" class="btn btn-primario">Acessar</a> </center>
                </div>

                <div class="card">
                   <center> <div class="card-titulo">Cadastrar País</div> </center>
                   <center> <a href="cadastrar_pais.php" class="btn btn-sucesso">Cadastrar</a> </center>
                </div>

                <div class="card">
                   <center> <div class="card-titulo">Editar Informações</div> </center>
                    <center> <a href="listar_pais.php" class="btn btn-alerta">Acessar</a> </center>
                </div>

                <div class="card">
                   <center> <div class="card-titulo">Remover País</div> </center>
                   <center> <a href="listar_pais.php" class="btn btn-perigo">Acessar</a> </center>
                </div>

                <div class="card">
                   <center> <div class="card-titulo">Ver Detalhes</div> </center>
                    <center> <a href="listar_pais.php" class="btn btn-info">Consultar</a> </center>
                </div>

            </div>  
</body>
</html>
