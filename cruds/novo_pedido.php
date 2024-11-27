<?php
    include '../utils/database.php';
    $db = new Database();
    try {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            
            $product_id = $_POST['product_id'];
            $user_id = $_SESSION['user_id'];
            $qnt = $_POST['quantidade'];

            $product = $db -> get_product($product_id);
            $pedido = $db -> get_card_by_prod($product_id, $user_id);

            if ($pedido) {
                $total_price = $product['preco'] * ($qnt + $pedido['quantidade']);
                $success = $db -> update_cart($pedido['id'], $user_id, $total_price, $qnt, 0);
            }

            else {
                $total_price = $product['preco'] * $qnt;
                echo $total_price;
                $success = $db -> add_to_cart($user_id, $product_id, $total_price, $qnt);
            }

            if ($success) {
                echo json_encode([
                    "status" => "success",
                    "message" => "Produto adicionado",
                    "s" => $success,
                    "p" => $total_price
                ]);
            }

            else {
                echo json_encode([
                    "status" => "error",
                    "message" => "Produto não adicionado"
                ]);
            }
        }
    } catch(Exception $e) {

        echo json_encode(["error" => $e -> getMessage(), "total" => $total_price, 'p' => $product_id]);
    }
?>
