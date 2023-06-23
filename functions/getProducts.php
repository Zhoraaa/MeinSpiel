<?php
$query = "SELECT 
  products.id,
  products.name, 
  products.description, 
  products.image, 
  products.cost, 
  products.sale_cost, 
  products.memory, 
  products.ssd, 
  products.release_date, 
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
  INNER JOIN ram ON products.ram = ram.id";

$res = $con->query($query);
$products = $res->fetch_all(MYSQLI_ASSOC);
return $products;