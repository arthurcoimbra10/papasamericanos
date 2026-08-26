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
            <p style="font-size: 16px; color: var(--cor-texto-claro); margin: 15px 0 25px;">
                Gerenciar informações dos países da América do Sul de forma simples e organizada
            </p>
            
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
                    <div class="card-titulo">Listar Países</div>
                    <div class="card-descricao">
                        Visualize todos os países cadastrados da América do Sul com suas informações completas.
                    </div>
                    <a href="listar_pais.php" class="btn btn-primario">Acessar</a>
                </div>

                <div class="card">
                    <div class="card-titulo">Cadastrar País</div>
                    <div class="card-descricao">
                        Adicione um novo país ao sistema com todos os seus dados e upload da bandeira.
                    </div>
                    <a href="cadastrar_pais.php" class="btn btn-sucesso">Cadastrar</a>
                </div>

                <div class="card">
                    <div class="card-titulo">Editar Informações</div>
                    <div class="card-descricao">
                        Atualize dados de países já cadastrados e mantenha as informações sempre precisas.
                    </div>
                    <a href="listar_pais.php" class="btn btn-alerta">Acessar</a>
                </div>

                <div class="card">
                    <div class="card-titulo">Remover País</div>
                    <div class="card-descricao">
                        Delete países do sistema com segurança e precisão quando necessário.
                    </div>
                    <a href="listar_pais.php" class="btn btn-perigo">Acessar</a>
                </div>

                <div class="card">
                    <div class="card-titulo">Ver Detalhes</div>
                    <div class="card-descricao">
                        Consulte informações completas de cada país incluindo bandeira e dados geográficos.
                    </div>
                    <a href="listar_pais.php" class="btn btn-info">Consultar</a>
                </div>

                <div class="card">
                    <div class="card-titulo">Sobre o Sistema</div>
                    <div class="card-descricao">
                        Saiba mais sobre o sistema de gerenciamento de países da América do Sul.
                    </div>
                    <a href="#sobre" class="btn btn-primario">Saber Mais</a>
                </div>
            </div>
        </div>

        <div class="secao" id="sobre">
            <h2>Sobre o Sistema</h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
                <div>
                    <h3>Objetivo</h3>
                    <p>
                        Desenvolver um sistema web intuitivo e eficiente para gerenciar informações 
                        sobre os países da América do Sul, permitindo cadastro, consulta, edição e exclusão de dados.
                    </p>
                </div>
                
                <div>
                    <h3>Armazenamento</h3>
                    <p>
                        Todas as informações são armazenadas de forma segura em banco de dados MySQL, 
                        com suporte a upload de bandeiras em alta qualidade.
                    </p>
                </div>
                
                <div>
                    <h3>Funcionalidades</h3>
                    <p>
                        Interface responsiva, fácil de usar, com validações de dados, 
                        busca, ordenação e filtros avançados para melhor experiência do usuário.
                    </p>
                </div>
            </div>

            <hr style="margin: 25px 0; border: 1px solid var(--cor-borda);">

            <h3>Países da América do Sul</h3>
            <p style="margin-bottom: 15px;">
                O sistema foi desenvolvido para gerenciar informações dos seguintes países:
            </p>
            <p style="text-align: center; font-size: 15px; line-height: 2;">
                <strong>Argentina • Bolívia • Brasil • Chile • Colômbia • Equador • Guiana • Paraguai • Peru • Surinã • Uruguai • Venezuela</strong>
            </p>
        </div>

        <div class="secao" id="estatisticas">
            <h2>Estatísticas do Sistema</h2>
            
            <div class="cards-grid">
                <div style="background: linear-gradient(135deg, #3498db, #2980b9); color: white; padding: 30px; border-radius: var(--raio-borda); text-align: center;">
                    <div style="font-size: 36px; font-weight: bold;">
                        <?php
                            // Contar países cadastrados
                            require_once 'conexao.php';
                            
                            try {
                                $stmt = $pdo->query("SELECT COUNT(*) as total FROM paises");
                                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                                echo $resultado['total'] ?? 0;
                            } catch (Exception $e) {
                                echo "0";
                            }
                        ?>
                    </div>
                    <div style="font-size: 14px; margin-top: 10px;">
                        Países Cadastrados
                    </div>
                </div>

                <div style="background: linear-gradient(135deg, #27ae60, #229954); color: white; padding: 30px; border-radius: var(--raio-borda); text-align: center;">
                    <div style="font-size: 36px; font-weight: bold;">12</div>
                    <div style="font-size: 14px; margin-top: 10px;">
                        Países da América do Sul
                    </div>
                </div>

                <div style="background: linear-gradient(135deg, #e74c3c, #c0392b); color: white; padding: 30px; border-radius: var(--raio-borda); text-align: center;">
                    <div style="font-size: 36px; font-weight: bold;">OK</div>
                    <div style="font-size: 14px; margin-top: 10px;">
                        Sistema Ativo
                    </div>
                </div>
            </div>
        </div>

        <!-- SEÇÃO DE GUIA RÁPIDO -->
        <div class="secao">
            <h2>Guia Rápido</h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                <div>
                    <h3 style="color: var(--cor-secundaria); margin-bottom: 10px;">Como Listar Países?</h3>
                    <p>
                        Clique em "Listar Países" no menu ou acesse a seção de Listar Países. 
                        Você verá uma tabela com todos os países cadastrados no sistema.
                    </p>
                </div>
                
                <div>
                    <h3 style="color: var(--cor-sucesso); margin-bottom: 10px;">Como Cadastrar?</h3>
                    <p>
                        Clique em "Novo País" e preencha o formulário com as informações desejadas. 
                        Não esqueça de fazer upload da bandeira do país.
                    </p>
                </div>
                
                <div>
                    <h3 style="color: var(--cor-alerta); margin-bottom: 10px;">Como Editar?</h3>
                    <p>
                        Na lista de países, clique no botão "Editar" do país desejado, 
                        atualize as informações e salve as alterações.
                    </p>
                </div>
                
                <div>
                    <h3 style="color: var(--cor-perigo); margin-bottom: 10px;">Como Deletar?</h3>
                    <p>
                        Na lista de países, clique no botão "Excluir" do país desejado 
                        e confirme a exclusão quando solicitado.
                    </p>
                </div>
            </div>
        </div>
    </main>

    <footer id="contato">
        <p>&copy; 2024 - Sistema de Gerenciamento de Países da América do Sul</p>
        <p>Desenvolvido com dedicação para melhor organização e consulta de dados</p>
        <p style="margin-top: 15px; font-size: 12px; color: rgba(255,255,255,0.7);">
            Entre em contato para sugestões e melhorias | 
            <a href="#">Reportar Problema</a>
        </p>
    </footer>
</body>
</html>
