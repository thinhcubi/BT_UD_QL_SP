<?php

namespace Model;
use Model\Product;
class ProductDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function getAll(): array
    {
        $sql = "SELECT * FROM `product`";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $products = [];
        foreach ($result as $row) {
            $product = new Product($row['name'],$row['price'],$row['description'],$row['producer']);
            $product->id = $row['id'];
            $products[] = $product;
        }
        return $products;
    }
    public function create(object $product)
    {
        $sql = "INSERT INTO product(name,price,description,producer) VALUES(?,?,?,?) ";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1,$product->name);
        $statement->bindParam(2,$product->price);
        $statement->bindParam(3,$product->description);
        $statement->bindParam(4,$product->producer);
        return $statement->execute();
    }
    public function delete($id)
    {
        $sql = "DELETE FROM product WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1,$id);
        return $statement->execute();
    }
    public function update($id,$product)
    {
        $sql = 'UPDATE `product` SET name = ?,price = ?, description = ? ,producer = ? WHERE id=?';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1,$product->name);
        $stmt->bindParam(2,$product->price);
        $stmt->bindParam(3,$product->description);
        $stmt->bindParam(4,$product->producer);
        $stmt->bindParam(5,$id);
        $stmt->execute();
    }
    public function getID($id): array
    {
        $sql = 'SELECT * FROM `product` WHERE id=?';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $products = [];
        foreach ($result as $item){
            $product = new Product($item['name'],$item['price'],$item['description'],$item['producer']);
            $product->id = $item['id'];
            $products[] = $product ;
        }
        return $products;

    }

}