INSERT INTO tb_categoria (nome) VALUES
('Sushi'),
('Bebidas'),
('Sobremesas'),
('Entradas'),
('Pratos Quentes');

INSERT INTO tb_item (idCategoria, nome, descricao, imagem, preco) VALUES
(1, 'Salmão Nigiri', 'Arroz temperado com fatia de salmão fresco', 'comida.jpg', 12.50),
(1, 'Atum Nigiri', 'Arroz temperado com fatia de atum fresco', 'comida.jpg', 14.00),
(1, 'California Roll', 'Arroz temperado enrolado com kani, abacate e pepino', 'comida.jpg', 18.00),
(1, 'Hot Roll', 'Sushi frito recheado com salmão e cream cheese', 'comida.jpg', 20.00),
(1, 'Sashimi de Salmão', 'Fatias finas de salmão fresco', 'comida.jpg', 25.00);

INSERT INTO tb_item (idCategoria, nome, descricao, imagem, preco) VALUES
(2, 'Refrigerante Lata', 'Escolha entre cola, guaraná ou limão', 'comida.jpg', 6.00),
(2, 'Água Mineral', 'Garrafa de 500ml', 'comida.jpg', 4.50),
(2, 'Chá Gelado', 'Sabor limão ou pêssego', 'comida.jpg', 7.00),
(2, 'Saquê', 'Dose de saquê tradicional japonês', 'comida.jpg', 15.00),
(2, 'Cerveja Importada', 'Garrafa de 355ml', 'comida.jpg', 12.00);

INSERT INTO tb_item (idCategoria, nome, descricao, imagem, preco) VALUES
(3, 'Mochi de Morango', 'Doce de arroz recheado com morango', 'comida.jpg', 10.00),
(3, 'Creme de Matcha', 'Sobremesa cremosa com chá verde', 'comida.jpg', 12.50),
(3, 'Gelato de Gergelim', 'Sorvete feito com gergelim preto', 'comida.jpg', 14.00),
(3, 'Dorayaki', 'Panqueca japonesa recheada com creme doce', 'comida.jpg', 8.00),
(3, 'Pudim Japonês', 'Pudim de leite ao estilo japonês', 'comida.jpg', 10.00);

INSERT INTO tb_item (idCategoria, nome, descricao, imagem, preco) VALUES
(4, 'Edamame', 'Soja verde cozida e temperada com sal', 'comida.jpg', 8.00),
(4, 'Gyoza', 'Pasteizinhos japoneses recheados com carne e vegetais', 'comida.jpg', 15.00),
(4, 'Sunomono', 'Salada agridoce de pepino', 'comida.jpg', 12.00),
(4, 'Missoshiru', 'Sopa de missô com tofu e algas', 'comida.jpg', 10.00),
(4, 'Harumaki', 'Rolinho primavera recheado com vegetais', 'comida.jpg', 14.00);

INSERT INTO tb_item (idCategoria, nome, descricao, imagem, preco) VALUES
(5, 'Yakissoba', 'Macarrão japonês com carne, vegetais e molho especial', 'comida.jpg', 22.00),
(5, 'Tonkatsu', 'Filé de porco empanado e frito', 'comida.jpg', 20.00),
(5, 'Tempurá de Camarão', 'Camarões empanados e fritos ao estilo japonês', 'comida.jpg', 25.00),
(5, 'Teppanyaki de Frango', 'Frango grelhado com vegetais ao molho especial', 'comida.jpg', 28.00),
(5, 'Katsudon', 'Arroz coberto com carne de porco e ovo ao molho especial', 'comida.jpg', 30.00);
