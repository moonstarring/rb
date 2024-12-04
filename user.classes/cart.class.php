<?php

require_once 'database.php';

class Cart{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    function addToCart($renterId, $productId) {
        $sql = "INSERT INTO cart_items (renter_id, product_id, created_at, updated_at) VALUES (?, ?, NOW(), NOW())";
        $stmt = $this->db->connect()->prepare($sql); 

        try{
            $stmt->execute([$renterId, $productId]);
            return true;
        } catch (PDOException $e){
            error_log("Error in Cart::addToCart(): " . $e->getMessage());
            return false;
        }
    }
}
?>