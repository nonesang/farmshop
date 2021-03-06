<?php
include_once 'src/config/DB.php';
  class SupplierModel 
  {
    private $conn;
    private $table = 'suppliers';

    public function __construct() {
      $db = new DB();
      $this->conn = $db->connect();
    }

    public function getAll() {
      $sql = "SELECT * FROM suppliers";
      $stmt = $this->conn->query($sql);
      $this->conn = null;
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function findByKey($key) {
      $sql = "SELECT * FROM suppliers WHERE id=:id";

      $stmt = $this->conn->prepare($sql);
      $stmt->execute([':id' => $key]);

      $this->conn = null;
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
  }
  