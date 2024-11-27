function novoPedido(produto, quantidade) {
    var xhr = new XMLHttpRequest();
    const data = `product_id=${produto}&quantidade=${quantidade}`;

    xhr.open("POST", "/cruds/novo_pedido.php", true);
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
