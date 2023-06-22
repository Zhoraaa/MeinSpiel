<?php
require_once('pageBase.php');

if ($user['role'] != 1 && !empty($_GET['productID'])) {
  include "user/seeProduct.php";
  } elseif ($user['role'] == 1 && empty($_GET['productID'])) {
  include "admin/setProduct.php";
}
endPage();
?>