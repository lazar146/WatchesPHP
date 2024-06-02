<?php

include "connection.php";


$upit = "SELECT * from product p inner join price pr ON p.productId=pr.productId";


$rez = $konekcija->query($upit);

$rezultat = $rez->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($rezultat);
?>