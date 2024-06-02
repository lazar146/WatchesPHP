<?php
session_start();
?>
<?php

include "connection.php";



$upit = "SELECT p.productId, p.Name,p.img,pr.priceId,pr.price,pr.oldPrice,g.Type,b.naslov,s.DisplayType,s.CaseType,s.WaterResistance,s.ItemWeight
    FROM product p inner join price pr ON p.productId=pr.productId inner join gender g ON p.genderId=g.genderId inner join brands b ON p.brandId=b.brandId 
    inner join specification s ON p.productId=s.productId where 1=1";

// if(isset($_POST['brendSaStrane'])){
//     $brend1 = $_POST['brendSaStrane'];

  
//     $upit .= " and p.brandId IN ($brend1)";
// }
if(isset($_POST['brendovi'])){
    
   $brend = implode(',',$_POST['brendovi']);

    

   $upit .= " and p.brandId IN (".$brend.")";
           }
if(isset($_POST['price'])){
        $ss=implode(',',$_POST['price']);
        

        
        $upit .= " and pr.priceId IN (".$ss.")";
       
}

if(!empty($_POST['search'])){

    $src = $_POST['search'];

    $upit.=" and Name LIKE '%".$src."%'";

}


if(isset($_POST["sortiraj"])){
    $sortValue = $_POST["sortiraj"];
    switch ($sortValue) {
        case "NameASC":
            $upit.=" ORDER BY Name ASC";
            break;
        case "NameDSC":
            $upit.=" ORDER BY Name DESC";
            break;
        case "PriceASC":
            $upit.=" ORDER BY pr.price ASC";
            break;
        case "PriceDSC":
            $upit.=" ORDER BY pr.price DESC";
            break; 
        default:
            $upit.=" ORDER BY p.productId";  
            break; 

}
}



$rez = $konekcija->query($upit);

$rezultat = $rez->fetchAll(PDO::FETCH_ASSOC);


$brojProzivoda = count($rezultat);

if(isset($_POST["page"])){

    $page = $_POST["page"];

}
else{
    $page = 1;

}
$offSet=((int)$page-1)*3;
$upit .= " LIMIT $offSet,3";

$rez2 = $konekcija->query($upit);

$rezultat2 = $rez2->fetchAll(PDO::FETCH_ASSOC);

$rezultat2[] = [
    "brojProizvoda"=>$brojProzivoda
];
echo json_encode($rezultat2);




?>