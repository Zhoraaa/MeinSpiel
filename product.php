<?php
require_once('pageBase.php');

if (!empty($_GET['id'])) {
  require('functions/getProduct.php');
  if (isset($_GET['edit']) && $user['role'] == 1) {
    include "admin/editProduct.php";
  } else {
    include "user/seeProduct.php";
  }
} elseif ($user['role'] == 1 && empty($_GET['id'])) {
  include "admin/setProduct.php";
}
endPage();
