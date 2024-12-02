<?php

require_once '../../db/db.php';

Class Products{
    //attributes

    public $id;
    public $productname;
    public $category;
    public $price;
    public $availability;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }








}