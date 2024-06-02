<?php
$slika = $_FILES["profile-picture-upload"];
$targetDir = "assets/images/img-resize/";
$zaMove = "../assets/images/" . basename($_FILES["profile-picture-upload"]["name"]);
$targetFile = $targetDir . basename($_FILES["profile-picture-upload"]["name"]);

$id = $_POST["user"];

cutImage($slika);

        include "connection.php";

        $upit = $konekcija -> prepare("UPDATE users SET img=:slika where userId = $id");

        $upit->bindParam(':slika', $targetFile);



        $upit->execute();

        Header("Location: ../index.php?page=profile");

function cutImage($slika,$profile=true){
    $tmp=$slika['tmp_name'];
    $name=$slika['name'];
    $type=$slika['type'];
    list($sirina,$visina)=getimagesize($tmp);
    if($profile){
        $nova_sirina=180;
        $nova_visina=180;
    }
    else{
        $nova_sirina=0;
        $nova_visina=0;
    }
    if($type=="image/jpeg"){$izvorna_slika=imagecreatefromjpeg($tmp);}
    else if($type=="image/png"){$izvorna_slika=imagecreatefrompng($tmp);}
    $objekat_slika=imagecreatetruecolor($nova_sirina,$nova_visina);
    imagecopyresampled($objekat_slika,$izvorna_slika,0,0,0,0,$nova_sirina,$nova_visina,$sirina,$visina);
    move_uploaded_file($tmp,"../assets/images/".$name);
    if($type=="image/jpeg"){
        imagejpeg($objekat_slika,"../assets/images/img-resize/".$name);
    }
    if($type=="image/png"){
        imagepng($objekat_slika,"../assets/images/img-resize/".$name);
    }




}



?>
