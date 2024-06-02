<?php 




function ispisImenaTabela(){

    include "../models/connection.php";

    $upit = "SHOW TABLES FROM id20857701_bazawatchesphp";

    $rez = $konekcija->query($upit);

    $rezultat = $rez->fetchAll();

    $imena = array();

    foreach($rezultat as $i){
        $imena[]=$i["Tables_in_id20857701_bazawatchesphp"];
    }
    foreach($imena as $i){
        echo "<li><a href='indexA.php?page=tables&table=".$i."'>$i</a></li>";
    }
}

