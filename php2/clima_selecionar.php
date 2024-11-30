<?php
    require "banco.php";

    $cidade = $_GET['cidade'];

    $sql = "SELECT * FROM clima WHERE cidade = :cidade";
    $qry = $con->prepare($sql);
    $qry->bindParam(':cidade', $cidade, PDO::PARAM_STR);
    $qry->execute();

    // Recupera os dados da cidade
    $registros = $qry->fetchAll(PDO::FETCH_OBJ);

    echo json_encode([$registros]);

    //Teste
    //http://localhost/clima/php2/clima_selecionar.php?cidade=trindade
?>

