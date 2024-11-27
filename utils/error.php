<?php
    function error404() {
        header("HTTP/1.1 404 Not Found");
        header("Status: 404 Not Found");

        echo "Página não encontrada.";
        exit;

    }
?>
