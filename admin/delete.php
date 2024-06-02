<?php 

include "../models/connection.php";

if(isset($_POST["dugmad"])){
    $id = $_POST["id"];
    $name = $_POST["name"];

    $upit = "SHOW COLUMNS FROM $name";
    $rez = $konekcija -> query($upit);
    $rezultat = $rez -> fetchAll();

    $imena = array();

        foreach($rezultat as $i){
            $imena[]=$i["Field"];
        }



        $idT = $imena[0];


    $upit1 = "DELETE FROM $name WHERE $idT = :id";

    $del = $konekcija -> prepare($upit1);

    $del->bindParam(":id",$id);

    try {
        $del->execute();
        echo "Uspesno brisanje";
    } catch (PDOExeption $e) {
        echo $e->getMessage();
    }
}