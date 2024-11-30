<?php
    require "banco.php";

    $sql = "SELECT * FROM clima ORDER BY cidade";
    $qry = $con->prepare($sql);
    $qry->execute();

    $registros = $qry->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($registros);

    //Testar
    //http://localhost/clima/php2/clima_listar.php
?>
