<?php

require_once 'db.php';
require_once 'Models/Product.php';

session_start();

if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}

if(isset($_GET['limit']) && !empty($_GET['limit'])){
    $limit = (int) strip_tags($_GET['limit']);
}else{
    $limit = 10;
}

$start = ($currentPage * $limit) - $limit;

$nbProducts = Product::getCountProducts();
$products = Product::getAllProducts($start, $limit);

$totalPages = ceil($nbProducts / $limit);

$previous = $currentPage -1;
$next = $currentPage + 1;

include 'view_products.php';
