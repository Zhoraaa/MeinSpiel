<?php
function getTable($query, $where, $orderBy, $limit)
{
  require "connect.php";
  $where = ($where) ?? null;
  $orderBy = ($orderBy) ?? "ORDER BY `name` ASC";
  $limit = ($limit) ?? null;
  $query = ($query) ?? "SELECT 
  products.id AS id,
  products.name AS name, 
  products.description AS description, 
  products.image AS image, 
  products.cost AS cost, 
  products.sale_cost AS sale_cost, 
  products.memory AS memory, 
  products.ssd AS ssd, 
  products.release_date AS release_date, 
  publishers.name AS publisher, 
  developers.name AS developer, 
  activate_in.name AS shop, 
  os.name AS os, 
  processor_models.name AS processor, 
  videomemory_vars.name AS videocard, 
  ram.name AS ram 
  
  FROM products 
  INNER JOIN publishers ON products.publisher = publishers.id 
  INNER JOIN developers ON products.developer = developers.id 
  INNER JOIN activate_in ON products.shop = activate_in.id 
  INNER JOIN os ON products.os = os.id 
  INNER JOIN processor_models ON products.processor = processor_models.id 
  INNER JOIN videomemory_vars ON products.videocard = videomemory_vars.id 
  INNER JOIN ram ON products.ram = ram.id
  
  $where
  $orderBy
  $limit";

  $res = $con->query($query);
  $products = $res->fetch_all(MYSQLI_ASSOC);

  if (
    isset($_GET['activate_in']) ||
    isset($_GET['developers']) ||
    isset($_GET['publishers'])
  ) {
    $_SESSION['result'] = "Товаров по вашему запросу найдено " . count($products) . ".";
  }

  return $products;
}
