<?php

    require "banco.php";

    $cidade = $_GET['cidade'] ?? null;
    $temperatura_max = $_GET['temperatura_max'] ?? null;
    $temperatura_min = $_GET['temperatura_min'] ?? null;
    $umidade = $_GET['umidade'] ?? null;
    $vento = $_GET['vento'] ?? null;


    if (is_null($cidade) || is_null($temperatura_max) || is_null($temperatura_min) || is_null($umidade) || is_null($vento)) {
        echo 'Erro, cidade, temperatura_max, temperatura_min, umidade e vento são obrigatórios';
        exit();
}

    $sql = "UPDATE clima SET temperatura_max = :temperatura_max, temperatura_min = :temperatura_min, umidade = :umidade, vento = :vento WHERE cidade = :cidade";
    $qry = $con->prepare($sql);

    $qry->bindParam(':cidade', $cidade, PDO::PARAM_STR);
    $qry->bindParam(':temperatura_max', $temperatura_max, PDO::PARAM_INT);
    $qry->bindParam(':temperatura_min', $temperatura_min, PDO::PARAM_INT);
    $qry->bindParam(':umidade', $umidade, PDO::PARAM_INT);
    $qry->bindParam(':vento', $vento, PDO::PARAM_INT);

    try {
        if ($qry->execute()) {
            $nr = $qry->rowCount();
            echo $nr; // Retorna o número de linhas afetadas
        } else {
            echo 'Erro ao executar a consulta';
        }
}   catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
}

// Teste:
// http://localhost/clima/php2/clima_alterar.php?cidade=Nonoai&temperatura_max=30&temperatura_min=20&umidade=70&vento=10
?>
