<?php
require_once("../../../controller/homeController.php");
$obj = new homeController();

$id = $_POST["id"];
$name = $_POST["name"];
$amount = $_POST["amount"];
$weight = $_POST["weight"];
$width = $_POST["width"];
$height = $_POST["height"];
$length = $_POST["length"];
$fragile = isset($_POST["fragile"]) ? 1 : 0;
$image = "";

if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
    $file_name = $_FILES["image"]["name"];
    $file_tmp = $_FILES["image"]["tmp_name"];
    $target_dir = "../../../asset/image_article/";
    $target_path = $target_dir . $id . "_" . $file_name;
    move_uploaded_file($file_tmp, $target_path);
    $image = $target_path;
} elseif (!empty($_POST["existing_image"])) {
    $image = $_POST["existing_image"];
}

$obj->update_article($id, $name, $amount, $image, $weight, $width, $height, $length, $fragile);

header("Location:../inventory.php");
?>