<?php

require_once 'database.php'; // Include the Database class

class Product extends Database{
    public function addProductToCart($product_id, $renter_id){ //removed quantity parameter
        $db = $this->connect();
        try{
            //Check if the item already exists in the cart for this renter
            $stmtCheck = $db->prepare("SELECT id FROM cart_items WHERE renter_id = :renter_id AND product_id = :product_id");
            $stmtCheck->bindParam(':renter_id', $renter_id);
            $stmtCheck->bindParam(':product_id', $product_id);
            $stmtCheck->execute();
            $existingItem = $stmtCheck->fetch(PDO::FETCH_ASSOC);


            if ($existingItem) { //Item already in cart, don't add it again.  Could handle increasing quantity here if needed.
                return true; // Or you might throw an exception or return a specific message indicating the item is already in the cart.
            } else {
                // Insert new entry since product not in cart
                $stmt = $db->prepare("INSERT INTO cart_items (renter_id, product_id) VALUES (:renter_id, :product_id)");
                $stmt->bindParam(':renter_id', $renter_id);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->execute();
                return true;
            }

        } catch(PDOException $e){
            echo "Error adding product to cart: " . $e->getMessage();
            return false;
        }
    }


    public function getProductById($product_id){
        $db = $this->connect();
        try{
            $stmt = $db->prepare("SELECT * FROM products WHERE id = :product_id"); 
            $stmt->bindParam(':product_id', $product_id);
            $stmt->execute();
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            return $product; 
        } catch(PDOException $e){
            echo "Error retrieving product: " . $e->getMessage();
            return null; 
        }
    }
}


?>