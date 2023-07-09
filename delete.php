<?php 
    require_once("config.php");

    $id = $_REQUEST['id'];

    $stm = $connection->prepare("DELETE FROM student WHERE ID=?");
    $result = $stm->execute(array($id));
    if($result==true){
        header('location:view.php?success=Delete Successfully!');
    }
?>