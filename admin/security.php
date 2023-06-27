<?php
if ($user['role'] != 1) {
    $_SESSION['result'] = "Куда мы лезем?";
    header("location: ../");
}