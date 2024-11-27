function removerPedido(pedido) {
    var xhr = new XMLHttpRequest();
    const data = `pedido_id=${pedido}`;

    xhr.open("POST", "/cruds/remover_pedido.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = () => {
        if (xhr.status == 200) {
            console.log("SUCESSO", xhr.responseText);
        }

        else {
            console.log("ERROR");
            console.log(xhr.responseText);
        }
    }

    xhr.send(data);
}
