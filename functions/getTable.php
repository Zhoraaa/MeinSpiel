<?php
function getTable($query, $con)
{
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
  
  ORDER BY `name` ASC";

  $res = $con->query($query);
  $products = $res->fetch_all(MYSQLI_ASSOC);

  foreach ($products as $product) {
    $id = $product['id'];
    $query = "SELECT COUNT(*) 
  FROM `keys` 
  INNER JOIN `products`
  ON `keys`.`game` = `products`.`id`
  WHERE `keys`.`game` = $id";
    $res = $con->query($query);
    $get = $res->fetch_assoc();
    $product['count'] = $get['COUNT(*)'];

    if ($product['cost'] > $product['sale_cost'] && $product['sale_cost'] != null) {
      $product['sale_percentage'] = round(100 - ($product['sale_cost'] / $product['cost'] * 100), 0);
    }
  }

  return $products;
}
