<?php

$host = 'localhost'; 
$username = 'root';  
$password = '';      
$dbname = 'clima';  

try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM clima";
    $pdo->exec($sql);

    echo json_encode(['success' => true, 'message' => 'Todos os dados foram apagados com sucesso.']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erro ao limpar os dados: ' . $e->getMessage()]);
}
?>
