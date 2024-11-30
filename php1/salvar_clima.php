<?php
header('Content-Type: application/json');


$host = 'localhost';
$dbname = 'clima'; 
$username = 'root'; 
$password = '';


$dadosRecebidos = json_decode(file_get_contents('php://input'), true);

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO clima (cidade, temperatura_max, temperatura_min, umidade, vento) VALUES (:cidade, :temperatura_max, :temperatura_min, :umidade, :vento)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':cidade', $dadosRecebidos['cidade']);
    $stmt->bindParam(':temperatura_max', $dadosRecebidos['temperatura_max']);
    $stmt->bindParam(':temperatura_min', $dadosRecebidos['temperatura_min']);
    $stmt->bindParam(':umidade', $dadosRecebidos['umidade']);
    $stmt->bindParam(':vento', $dadosRecebidos['vento']);
    
    if ($stmt->execute()) {
        echo json_encode(['message' => 'Dados salvos com sucesso']);
    } else {
        echo json_encode(['error' => 'Falha ao salvar os dados']);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erro ao conectar ao banco de dados: ' . $e->getMessage()]);
}
?>
