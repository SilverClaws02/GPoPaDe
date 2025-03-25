<?php
require_once 'dbcontroller.php';
//böngésző, vagy kliens; válasz esetén formátuma json
header("Content-Type: application/json");
//bárhonnam megengedett az érkező kérés *wildcarfd
header("Access-Control-Allow-Origin: *");
//megengedett methódusok a következők...
header("Access-Control-Allow-Methods: GET, POST, PATCH, DELETE, OPTIONS");
//fejlécadatok küldése
header("Access-Control-Allow-Headers: Content-Type");

$db= new DBController();
$methods=$_SERVER['REQUEST_METHOD'];

switch ($methods)
{
    case 'GET':
        $products = $db->executeSelectQuery("Select * from products");
        echo json_encode($products, JSON_UNESCAPED_UNICODE);
        break;
    case 'POST':
        $data=json_decode(file_get_contents("php://input"), true);
        $query="INSERT INTO products (name, price, description) VALUES (?, ?, ?)";
        $db->executeSelectQuery($query, [$data['name'], $data['price'], $data['description']]);
        echo json_encode(["message" => "Product Created"]);
        break;
    case 'PATCH':
        $data=json_decode(file_get_contents("php://input"), true);
        $query="UPDATE products SET name=?, price=?, description=? WHERE id=?";
        $db->executeSelectQuery($query, [$data['name'], $data['price'], $data['description'], $data['id']]);
        echo json_encode(["message" => "Product Updated"]);
        break;
    case 'DELETE':
        $data=json_decode(file_get_contents("php://input"), true);
        $query="DELETE FROM products where id=?";
        $db->executeSelectQuery($query, [$data['id']]);
        echo json_encode(["message" => "Product Deleted"]);
        break;
    default:
        echo json_encode(["message" => "Method not supported"]);
        break;
}