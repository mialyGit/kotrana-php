<?php

class Product {

    public static function getAllProducts($start=0, $limit=1000) {
        global $conn;

        $sql = "SELECT * FROM products LIMIT $start, $limit";
        
        $result = $conn->query($sql);
        $products = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }

        return $products;
    }

    public static function getCountProducts() {
        global $conn;

        $sql = "SELECT COUNT(*) AS nb_products FROM `products`";
        $result = $conn->query($sql);
        
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return (int) $row['nb_products'];
        } else {
            return 0;
        }
    }

    public static function insertProduct($name, $price, $description, $type) {
        global $conn;
        
        $sql = "INSERT INTO products (name, price, description, type) VALUES (?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdss", $name, $price, $description, $type);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function insertBatchProduct(array $data, int $limit = 500) {
        global $conn;

        $chunks = array_chunk($data, $limit);

        $sql = "INSERT INTO `products` (name, price, description, type) VALUES ";

        $countInserted = 0;

        foreach ($chunks as $chunk) {
            $valueStrings = [];

            foreach ($chunk as $row) {
                $valueStrings[] = "('".$row['name']."', ".$row['price'].", '".$row['description']."', '".$row['type']."')";
            }

            $sql .= implode(',', $valueStrings);

            $stmt = $conn->prepare($sql);

            if($stmt->execute()) {
                $countInserted = $countInserted + $stmt->affected_rows;
            }

        }

        return $countInserted;
    }
}