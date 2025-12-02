<?php

function connecta_bd(){
    $server = "localhost";
    $user = "root";
    $pass = "Glsarah25!";
    $bd = "cafe_CRUD";
    return new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
}

function cadastra_usuario($id, $usuario, $senha, $nome_complemento){
    $con = connecta_bd();
    $stmt = $con->prepare("INSERT INTO usuarios (id, usuario, senha, nome_complemento)
                            VALUES (:id, :usuario, :senha, :nome_complemento)");
    $stmt->bindParam(':id', $email);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':nome_complemento', $$nome_complemento);
    return $stmt->execute();
}

function cadastra_produto($id, $nome, $categoria, $preco, $descricao, $estoque){
    $con = connecta_bd();
    $stmt = $con->prepare("INSERT INTO produtos (id, nome, categoria, preco, descricao, estoque)
                            VALUES (:id, :nome, :categoria, :preco, :descricao, :estoque)");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':estoque', $estoque);
    return $stmt->execute();
}

cadastra_produto("1", "Café", "Bebida", "5.00", "Café com café", "5");
    
?>