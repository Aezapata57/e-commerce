<?php
require_once("C:/xampp/htdocs/proyecto/model/ArticleRepository.php");
require_once("C:/xampp/htdocs/proyecto/model/homeModel.php");

class homeController {
    private $MODEL;

    public function __construct() {
        $this->MODEL = new homeModel();
    }

    public function store_article($type, $name, $amount, $image, $weight, $width, $height, $length, $fragile) {
        $id = $this->MODEL->add_article($type, $name, $amount, $image, $weight, $width, $height, $length, $fragile);
        return $id;
    }

    public function show_article() {
        return $this->MODEL->read_article();
    }

    public function call_article($id) {
        return $this->MODEL->read_article_id($id);
    }

    public function update_article($id, $name, $amount, $image, $weight, $width, $height, $length, $fragile) {
        $result = $this->MODEL->update_article($id, $name, $amount, $image, $weight, $width, $height, $length, $fragile);
        return $result ? $id : false;
    }

    public function delete_article($id) {
        return $this->MODEL->delete_article($id);
    }
}
?>
