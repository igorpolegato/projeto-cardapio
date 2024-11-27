<?php
    include '../utils/database.php';
    $db = new Database();

    // foreach($_POST as $key => $value) {
    //     echo $key." has the value ". $value . '</br>';
    // }


    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $data_nascimento = $_POST['data_nascimento'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $csenha = $_POST['csenha'] ?? '';
    $cep = $_POST['cep'] ?? '';
    $rua = $_POST['rua'] ?? '';
    $numero = $_POST['numero'] ?? '';
    $bairro = $_POST['bairro'] ?? '';
    $complemento = $_POST['complemento'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $estado = $_POST['estado'] ?? '';

    if (empty($nome) || empty($email) || empty($senha) || empty($csenha) || $csenha !== $senha) {
        echo "Preencha todos os campos com as informações corretas!";
        exit;
    }

    $success = $db -> new_user($nome, $email, $data_nascimento, $telefone, $senha, $cep, $rua, $numero, $bairro, $complemento, $cidade, $estado);

    if ($success) {
        header('Location: /pages/login.html');
    }

    else {
        echo "Não foi possivel criar o usuario";
    }

    $db -> close_conn();
?>
