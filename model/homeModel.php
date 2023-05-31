<?php
require_once('C:/xampp/htdocs/proyecto/config/dbFactory.php');
require_once('C:/xampp/htdocs/proyecto/model/ArticleRepository.php');

class homeModel {
    private $repository;

    public function __construct() {
        $this->repository = new ArticleRepository();
    }

    public function add_article($type, $name, $amount, $image, $weight, $width, $height, $length, $fragile) {
        $id = $this->repository->addArticle($type, $name, $amount, $image, $weight, $width, $height, $length, $fragile);
        return $id;
    }

    public function read_article() {
        return $this->repository->getAllArticles();
    }

    public function read_article_id($id) {
        return $this->repository->getArticle($id);
    }

    public function update_article($id, $name, $amount, $image, $weight, $width, $height, $length, $fragile) {
        $result = $this->repository->updateArticle($id, $name, $amount, $image, $weight, $width, $height, $length, $fragile);
        return $result ? $id : false;
    }

    public function delete_article($id) {
        return $this->repository->deleteArticle($id);
    }
}
?>
