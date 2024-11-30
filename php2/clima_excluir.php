<?php
    require "banco.php"; 
    
    $cidade = $_GET['cidade'] ?? '';  

    $sql = "DELETE FROM clima WHERE cidade = :cidade";
    $qry = $con->prepare($sql);
    $qry->bindParam(':cidade', $cidade, PDO::PARAM_STR);
    $success = $qry->execute();
    echo json_encode(['success' => $success]);


    //Testar
    //http://localhost/clima/php2/clima_excluir.php?cidade=SãoPaulo
?>


