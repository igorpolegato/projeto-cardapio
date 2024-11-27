<?php
    include '../utils/database.php';
    $db = new Database();


    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $success = $db -> login($email, $senha);

    if ($success) {
        session_start();

        $_SESSION['user_id'] = $success['id'];
        header('Location: /pages/home.php');
    }

    else {
        echo "Erro no login";
    }

    $db -> close_conn();
?>
