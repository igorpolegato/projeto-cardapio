<?php
    // jdbc:mysql://10.171.140.79:3306/projeto_cardapio?allowPublicKeyRetrieval=true&useSSL=false

    class Database {
        public $conn;

        public function __construct() {
            $servidor = "10.171.140.79";
            $usuario = "igor";
            $senha = "1qaSW@3edFR$";
            $banco = "projeto_cardapio";

            $this -> conn = new mysqli($servidor, $usuario, $senha, $banco);

            if ($this -> conn -> connect_error) {
                echo "Falha de conexão: " . $this -> conn -> connect_error;
            }
        }

        public function close_conn() {
            $this -> conn -> close();
        }

        public function new_user($nome, $email, $data_nascimento, $telefone, $senha, $cep, $rua, $numero, $bairro, $complemento, $cidade, $estado) {
            $q_novo_usuario = "INSERT INTO tb_usuario (nome, email, data_nascimento, telefone, senha, cep, rua, numero, bairro, complemento, cidade, estado)" . "values (?, ?, ?, ?, SHA2(?, 256), ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this -> conn -> prepare($q_novo_usuario);

            if ($stmt) {
                $stmt -> bind_param("ssssssssssss",
                    $nome, $email, $data_nascimento, $telefone, $senha, $cep, $rua, $numero, $bairro, $complemento, $cidade, $estado
                );

                if ($stmt -> execute()) {
                    return true;
                }

                echo "Erro ao criar usuario: " . $stmt -> error;
                return false;
            }
        }

        public function login($email, $senha) {
            $q_login = "SELECT * FROM tb_usuario WHERE email = ? and senha = SHA2(?, 256)";
            $stmt = $this -> conn -> prepare($q_login);

            if ($stmt) {
                $stmt -> bind_param("ss", $email, $senha);

                $stmt -> execute();
                $result = $stmt -> get_result();

                if ($result -> num_rows > 0) {
                    return $result -> fetch_assoc();
                }

                else {
                    return false;
                }
            }
        }

        public function get_categories() {
            $q_categories = "SELECT * FROM tb_categoria";
            $stmt = $this -> conn -> prepare($q_categories);

            if ($stmt) {
                $stmt -> execute();
                $result = $stmt -> get_result();

                return $result;
            }
        }

        public function get_products_by_cat($category_id) {
            $q_products = "SELECT * FROM tb_item WHERE idCategoria = ?";
            $stmt = $this -> conn -> prepare($q_products);

            if ($stmt) {
                $stmt -> bind_param("i", $category_id);

                $stmt -> execute();
                $result = $stmt -> get_result();

                return $result;
            }
        }

        public function get_product($product_id) {
            $q_product = "SELECT * FROM tb_item WHERE id = ?";
            $stmt = $this -> conn -> prepare($q_product);

            if ($stmt) {
                $stmt -> bind_param("i", $product_id);

                $stmt -> execute();
                $result = $stmt -> get_result();

                if ($result -> num_rows > 0) {
                    return $result -> fetch_assoc();
                }

                return null;
            }
        }

        public function get_cart($pedido_id) {
            $q_cart = "SELECT * FROM tb_itens_pedido WHERE id = ?";
            $stmt = $this -> conn -> prepare($q_cart);

            if ($stmt) {
                $stmt -> bind_param("i", $pedido_id);
                $stmt -> execute();

                $result = $stmt -> get_result();

                if ($result -> num_rows > 0) {
                    return $result -> fetch_assoc();
                }

                return null;
            }
        }

        public function get_cart_products($user_id) {
            $q_cart = "SELECT * FROM tb_itens_pedido ip JOIN tb_item i ON ip.idItem = i.id where ip.idUsuario = ?";
            $stmt = $this -> conn -> prepare($q_cart);

            if ($stmt) {
                $stmt -> bind_param("i", $user_id);
                $stmt -> execute();

                $result = $stmt -> get_result();

                return $result;
            }


        }

        public function get_card_by_prod($product_id, $user_id) {
            $q_cart = "SELECT * FROM tb_itens_pedido WHERE idItem = ? and IdUsuario = ?";
            $stmt = $this -> conn -> prepare($q_cart);

            if ($stmt) {
                $stmt -> bind_param("ii", $product_id, $user_id);
                $stmt -> execute();

                $result = $stmt -> get_result();

                if ($result -> num_rows > 0) {
                    return $result -> fetch_assoc();
                }

                return null;
            }

        }

        public function update_cart($pedido_id, $user_id, $total_price, $qnt, $finalizado) {
            if ($this -> get_cart($pedido_id)) {
                $q_update = "UPDATE tb_itens_pedido SET preco = ?, quantidade = ?, finalizado = ? WHERE id = ? and idUsuario = ?";

                $stmt = $this -> conn -> prepare($q_update);

                if ($stmt) {
                    $stmt -> bind_param("diiii", $$total_price, $qnt, $finalizado, $pedido_id, $user_id);

                    if ($stmt -> execute()) {
                        return true;
                    }

                    return false;
                }
            }
        }

        public function add_to_cart($user_id, $product_id, $total_price, $qnt) {
            $q_add = "INSERT INTO tb_itens_pedido (idUsuario, idItem, quantidade, preco, finalizado) VALUES(?, ?, ?, ?, 0)";
            $stmt = $this -> conn -> prepare($q_add);

            if ($stmt) {

                $stmt -> bind_param("iiid", $user_id, $product_id, $qnt, $total_price);

                if ($stmt -> execute()) {
                    return true;
                }

                return false;
            }

        }

        public function delete_cart($pedido_id) {
            $q_add = "DELETE tb_itens_pedido WHERE id = ?";
            $stmt = $this -> conn -> prepare($q_add);

            if ($stmt) {

                $stmt -> bind_param("i", $pedido_id);

                if ($stmt -> execute()) {
                    return true;
                }

                return false;
            }

        }
    }
?>
