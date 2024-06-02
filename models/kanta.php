<?php
session_start();
?>
<?php
include "function.php";
include "connection.php";



if(isset($_SESSION['user'])){
    if(isset($_POST['potvrdaPorudzbine']) ){
    $idKorisnika = $_SESSION['user']['userId'];
    $cart_id = null;
    $timestamp = time();
    $dateAdd = date("Y-m-d H:i:s", $timestamp);
    $dateModif = null;

    


    $upit="INSERT INTO cart values(:cart_id, :idKorisnika, :dateAdd, :dateModif)";
    $stmt=$konekcija->prepare($upit);
    $stmt->bindParam(":idKorisnika", $idKorisnika);
    $stmt->bindParam(":cart_id", $cart_id);
    $stmt->bindParam(":dateAdd", $dateAdd);
    $stmt->bindParam(":dateModif", $dateModif);
    $stmt->execute();
    $cart_id = $konekcija->lastInsertId();
    $timestamp = time();
    $date = date('Y-m-d H:i:s', $timestamp);
    $promena = null;
    $narudzbina = $_POST['kanta'];
    $narudzbina = json_decode($narudzbina, true);
    foreach ($narudzbina as $i)
    {
        $upit="INSERT INTO productcart values( :cart_id,:idProizvoda, :kolicina, :datum)";
        $stmt=$konekcija->prepare($upit);
        $stmt->bindParam(":idProizvoda", $i['id']);
        $stmt->bindParam(":cart_id", $cart_id);
        $stmt->bindParam(":kolicina", $i['quantity']);
        $stmt->bindParam(":datum", $date);
        $stmt->execute();
    }
    echo "You have successfully finished you purchase";
}
}

else{
    http_response_code(400);
    echo "You need to log in first";
}




