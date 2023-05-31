<?php
    require_once('../../../controller/homeController.php');
    $obj = new homeController();
    $obj->delete_article($_GET['ID']);
?>