<?php
require_once('C:/xampp/htdocs/proyecto/config/db.php');
require_once('C:/xampp/htdocs/proyecto/config/dbFactory.php');

class ArticleRepository {
    private $db;

    public function __construct() {
        $this->db = dbFactory::createDB()->conexion();
    }

    public function addArticle($type, $name, $amount, $image, $weight, $width, $height, $length, $fragile) {
        $statement = $this->db->prepare("INSERT INTO article VALUES(null, :TYPE, :NAME, :AMOUNT, :IMAGE, :WEIGHT, :WIDTH, :HEIGHT, :LENGTH, :FRAGILE)");
        $statement->bindParam(":TYPE", $type);
        $statement->bindParam(":NAME", $name);
        $statement->bindParam(":AMOUNT", $amount);
        $statement->bindParam(":IMAGE", $image);
        $statement->bindParam(":WEIGHT", $weight);
        $statement->bindParam(":WIDTH", $width);
        $statement->bindParam(":HEIGHT", $height);
        $statement->bindParam(":LENGTH", $length);
        $statement->bindParam(":FRAGILE", $fragile);
        
        try {
            $statement->execute();
            $id = $this->db->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getArticle($id) {
        $statement = $this->db->prepare("SELECT * FROM article WHERE id = :ID");
        $statement->bindParam(":ID", $id);
        $statement->execute();
        return $statement->fetch();
    }

    public function getAllArticles() {
        $statement = $this->db->prepare("SELECT * FROM article");
        $statement->execute();
        return $statement->fetchAll();
    }

    public function updateArticle($id, $name, $amount, $image, $weight, $width, $height, $length, $fragile) {
        $statement = $this->db->prepare("UPDATE article SET NAME = :NAME, AMOUNT = :AMOUNT, IMAGE = :IMAGE, WEIGHT = :WEIGHT, WIDTH = :WIDTH, HEIGHT = :HEIGHT, LENGTH = :LENGTH, FRAGILE = :FRAGILE WHERE ID = :ID");
        $statement->bindParam(":NAME", $name);
        $statement->bindParam(":AMOUNT", $amount);
        $statement->bindParam(":IMAGE", $image);
        $statement->bindParam(":WEIGHT", $weight);
        $statement->bindParam(":WIDTH", $width);
        $statement->bindParam(":HEIGHT", $height);
        $statement->bindParam(":LENGTH", $length);
        $statement->bindParam(":FRAGILE", $fragile);
        $statement->bindParam(":ID", $id);
        
        try {
            $statement->execute();
            return $id;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteArticle($id) {
        $statement = $this->db->prepare("DELETE FROM article WHERE ID = :ID");
        $statement->bindParam(":ID", $id);
        
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
