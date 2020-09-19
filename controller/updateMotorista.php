<?php

    include_once '../model/Conexao.class.php';
    include_once '../model/Manager.class.php';
    

    $manager = new Manager();

    $updateMot = $_POST;
    $id = $_POST['id'];

    if(isset($id) && !empty($id)){
        $manager->updateMotorista("motorista", $updateMot, $id);
        header("Location: ../index.php?motorista_update_success");

    }

    ?>