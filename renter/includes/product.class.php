<?php

require_once 'db_connect.php';

class Products {
    // Attributes
    public $id;
    public $owner_id;
    public $name;
    public $brand;
    public $description;
    public $rental_price;
    public $status;
    public $created_at;
    public $updated_at;
    public $image;
    public $quantity;
    public $category;
    public $rental_period;

    protected $db;

    function __construct() {
        $this->db = new Database();
    }

    function fetch() {
        $query = "SELECT * FROM products"; // Example query
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC); // Make sure this returns an array
    }

    







}