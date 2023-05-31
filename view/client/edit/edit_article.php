<?php
    require_once("../../../controller/homeController.php");
    $obj = new homeController();
    $id = $_POST["id"];
    header("Location: ../article.php?id=" . $id);
    exit();
?>