<?php
function connecta_bd(){
    $servername = "localhost"; 
    $port = 3306;
    $username = "root";
    $password = "Glsarah25!";
    $dbname = "cafe_crud";

    return new PDO("mysql:host=$servername;port=$port;dbname=$dbname;charset=utf8", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}

// ========== FUNÇÕES DE USUÁRIOS ==========
function cadastra_usuario($email, $nome, $senha, $telefone, $dataNascimento){
    $con = connecta_bd();
    $stmt = $con->prepare("INSERT INTO usuarios (email, nome, senha, telefone, dataNascimento)
                           VALUES (:email, :nome, :senha, :telefone, :dataNascimento)");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':dataNascimento', $dataNascimento);

    try {
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            return false;
        }
        return false;
    }
}

function select_usuarios(){
    $con = connecta_bd();
    $stmt = $con->prepare("SELECT * FROM usuarios");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// ========== FUNÇÕES DE PRODUTOS ==========
function cadastra_produto($nome, $categoria, $preco, $descricao, $estoque){
    $con = connecta_bd();
    $stmt = $con->prepare("INSERT INTO produtos (nome, categoria, preco, descricao, estoque)
                           VALUES (:nome, :categoria, :preco, :descricao, :estoque)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':estoque', $estoque);

    try {
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function delete_produto($id){
    $con = connecta_bd();
    $stmt = $con->prepare("DELETE FROM produtos WHERE id = :id");
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

function update_produto($id, $nome, $categoria, $preco, $descricao, $estoque){
    $con = connecta_bd();
    $stmt = $con->prepare("UPDATE produtos
                            SET nome = :nome, categoria = :categoria, preco = :preco, 
                                descricao = :descricao, estoque = :estoque
                            WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':estoque', $estoque);
    return $stmt->execute();
}

function select_produto($id){
    $con = connecta_bd();
    $stmt = $con->prepare("SELECT * FROM produtos WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function select_produtos(){
    $con = connecta_bd();
    $stmt = $con->prepare("SELECT * FROM produtos ORDER BY categoria, nome");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

cadastra_usuario("natanjvansuita@gmail.com", "Natan Vansuita", "natan", "99953-1753", "2007-02-10");
?>