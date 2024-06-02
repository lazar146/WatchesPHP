<?php
session_start();
ob_start();
?>
<?php


include "function.php";


if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    header("Location: ../index.php?page=login");
}
else{
   echo "greska";
}
ob_end_flush();
?>