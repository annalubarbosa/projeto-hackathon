<?php
require "conexao.php";

// Verifica se o texto chegou via post
if (isset($_POST['texto']) && !empty(trim($_POST['texto']))) {
    $texto = trim($_POST['texto']);

    // Inserir o registro no banco de dados
    $stmt = $pdo->prepare("INSERT INTO mensagens (texto) VALUES (:texto)");
    $stmt->bindParam(":texto", $texto);

    if($stmt->execute()) {
        echo json_encode(['status' => 'suceso']);
    } else {
        echo json_encode(['status' => 'erro']);
    }
}