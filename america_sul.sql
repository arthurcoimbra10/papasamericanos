CREATE DATABASE IF NOT EXISTS america_sul CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE america_sul;

CREATE TABLE IF NOT EXISTS paises (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL UNIQUE,
    capital VARCHAR(100) NOT NULL,
    idioma VARCHAR(100) NOT NULL,
    moeda VARCHAR(100) NOT NULL,
    populacao VARCHAR(100) NOT NULL,
    area VARCHAR(100) NOT NULL,
    presidente VARCHAR(100) NOT NULL,
    idh DECIMAL(4,3) NOT NULL,
    pib VARCHAR(100) NOT NULL,
    educacao VARCHAR(100) NOT NULL,
    seguranca VARCHAR(100) NOT NULL,
    saude VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    bandeira VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO paises (nome, capital, idioma, moeda, populacao, area, presidente, idh, pib, educacao, seguranca, saude, descricao, bandeira) VALUES
('Argentina', 'Buenos Aires', 'Espanhol', 'Peso argentino', '46 milhões', '2.780.400 km²', 'Javier Milei', 0.845, 'USD 1,1 trilhão', 'Alta', 'Moderada', 'Alta', 'A Argentina é o segundo maior país da América do Sul, com destaque para agricultura, turismo e indústria.', 'Argentina.png'),
('Bolívia', 'Sucre', 'Espanhol, quéchua e aimará', 'Boliviano', '12 milhões', '1.098.581 km²', 'Luis Arce', 0.698, 'USD 45 bilhões', 'Média', 'Moderada', 'Média', 'A Bolívia possui grande diversidade geográfica, incluindo os Andes e parte da Floresta Amazônica.', 'Bolivia.png'),
('Brasil', 'Brasília', 'Português', 'Real', '203 milhões', '8.515.767 km²', 'Luiz Inácio Lula da Silva', 0.760, 'USD 2,2 trilhões', 'Média', 'Moderada', 'Média', 'O Brasil é o maior país da América do Sul e abriga grande parte da Floresta Amazônica.', 'Brasil.png'),
('Chile', 'Santiago', 'Espanhol', 'Peso chileno', '20 milhões', '756.102 km²', 'Gabriel Boric', 0.860, 'USD 335 bilhões', 'Alta', 'Alta', 'Alta', 'O Chile é um país longo e estreito, conhecido pela Cordilheira dos Andes e pelo Deserto do Atacama.', 'Chile.png'),
('Colômbia', 'Bogotá', 'Espanhol', 'Peso colombiano', '53 milhões', '1.141.748 km²', 'Gustavo Petro', 0.758, 'USD 418 bilhões', 'Média', 'Moderada', 'Média', 'A Colômbia possui costas no Caribe e no Pacífico e é reconhecida por sua diversidade natural e cultural.', 'Colombia.png'),
('Equador', 'Quito', 'Espanhol', 'Dólar americano', '18 milhões', '283.561 km²', 'Daniel Noboa', 0.765, 'USD 121 bilhões', 'Média', 'Moderada', 'Média', 'O Equador recebe esse nome por ser atravessado pela linha do Equador e inclui as Ilhas Galápagos.', 'Equador.png'),
('Guiana', 'Georgetown', 'Inglês', 'Dólar guianense', '830 mil', '214.969 km²', 'Irfaan Ali', 0.714, 'USD 25 bilhões', 'Média', 'Moderada', 'Média', 'A Guiana é o único país da América do Sul cujo idioma oficial é o inglês.', 'Guiana.png'),
('Paraguai', 'Assunção', 'Espanhol e guarani', 'Guarani', '7 milhões', '406.752 km²', 'Santiago Peña', 0.731, 'USD 45 bilhões', 'Média', 'Moderada', 'Média', 'O Paraguai é um país sem saída para o mar, localizado na região central da América do Sul.', 'Paraguay.png'),
('Peru', 'Lima', 'Espanhol, quéchua e aimará', 'Sol', '34 milhões', '1.285.216 km²', 'Dina Boluarte', 0.762, 'USD 289 bilhões', 'Média', 'Moderada', 'Média', 'O Peru é conhecido por seu patrimônio histórico, incluindo Machu Picchu e antigas civilizações andinas.', 'Peru.png'),
('Suriname', 'Paramaribo', 'Neerlandês', 'Dólar surinamês', '640 mil', '163.820 km²', 'Chan Santokhi', 0.722, 'USD 4 bilhões', 'Média', 'Moderada', 'Média', 'O Suriname é o menor país independente da América do Sul e tem forte presença de florestas tropicais.', 'Suriname.png'),
('Uruguai', 'Montevidéu', 'Espanhol', 'Peso uruguaio', '3,4 milhões', '176.215 km²', 'Yamandú Orsi', 0.830, 'USD 80 bilhões', 'Alta', 'Alta', 'Alta', 'O Uruguai se destaca por seus indicadores sociais e por sua costa banhada pelo Oceano Atlântico.', 'Uruguay.png'),
('Venezuela', 'Caracas', 'Espanhol', 'Bolívar', '29 milhões', '916.445 km²', 'Nicolás Maduro', 0.709, 'USD 110 bilhões', 'Média', 'Moderada', 'Média', 'A Venezuela possui grandes reservas de petróleo e paisagens que incluem praias, montanhas e a região amazônica.', 'Venezuela.png');
