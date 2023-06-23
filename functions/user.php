<?php
$user = ($_COOKIE['user']) ?? null;
if ($user) {
  $query = "SELECT * FROM `users` WHERE `id`='$user'";
  $res = $con->query($query);
  $user = mysqli_fetch_assoc($res);
}
return $user;