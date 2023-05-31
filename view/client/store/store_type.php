<?php
    require_once("../../../controller/homeController.php");
    $obj = new homeController();
    $type = $_POST["type"];
    $name = "";
    $amount = "";
    $image = "";
    $weight = "";
    $width = "";
    $height = "";
    $length = "";
    $fragile = "";
    $id=$obj->store_article($type, $name, $amount, $image, $weight, $width, $height, $length, $fragile);
    header("Location: ../article.php?id=" . $id);
    exit();
?>