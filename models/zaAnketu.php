<?php
session_start();
include "connection.php";

function pitanja($pollId,$value){
    include "connection.php";

    $upit = "SELECT * FROM poll where pollId = $pollId";

    $rez = $konekcija->query($upit);

    $rezultat = $rez->fetch();

    $upit1 = "SELECT * FROM answers where pollId = $pollId";

    $rez1 = $konekcija->query($upit1);

    $rezultat1 = $rez1->fetchAll();

    $user = $_SESSION['user']['userId'];





    $upit2 = "SELECT * FROM pollanswer where userId=$user";

    $rez2 = $konekcija->query($upit2);

    $rezultat2 = $rez2->fetch();


    if($rezultat2){
        echo "<div class='pitanjaBlok'>";
        echo
        "
        <div class='naslovA'>
        <h3>{$rezultat["name"]}</h3>
        </div>
        <div class='pitanje'>
            <ul id='pit'>";

        foreach($rezultat1 as $i){
            echo "<li><input type='radio' name='$value' id='$value' value='{$i["answerId"]}'>{$i["answer"]} &nbsp; (";
            $id=$i["answerId"];
            echo brojGlasova($id);

            echo ")</li>";
        }
        echo
        "
        </ul>
        </div>
        </div>
        ";

    }

    else{

        echo "<div class='pitanjaBlok'>";
        echo
        "
    <div class='naslovA'>
    <h3>{$rezultat["name"]}</h3>
    </div>
    <div class='pitanje'>
        <ul id='pit'>";

        foreach($rezultat1 as $i){
            echo "<li><input type='radio' name='$value' id='$value' value='{$i["answerId"]}'>{$i["answer"]}</li>";
        }
        echo
        "
    </ul>
    </div>
    </div>
    ";

    }
}
function brojGlasova($id){
    include "connection.php";

    $upit = "SELECT count(answerId) FROM pollanswer where answerId = $id";

    $rez = $konekcija->query($upit);

    $rezultat = $rez->fetch();


    return $rezultat['count(answerId)'];
}
function upisiAnketu(){
    if(isset($_POST["dugme"])){
        $pitanje1 = $_POST["pitanje1"];
        $pitanje2 = $_POST["pitanje2"];

        $user = $_SESSION['user']['userId'];



        include "connection.php";

        $upit = "SELECT * FROM pollanswer where userId=$user";

        $rez = $konekcija->query($upit);

        $rezultat = $rez->fetchAll();

        if($rezultat){
            echo "<h1>You are already voted</h1>";
        }
        else{
            upisAnkete($pitanje1,$pitanje2,$user);
            echo "<h1>You are successfully voted</h1>";
        }

    }


}
upisiAnketu();
function upisAnkete($prvo,$drugo,$id){
    include "connection.php";

    $zaId = null;

    $timestamp=time();
    $date = date('Y-m-d H:i:s');
    $upit = "INSERT INTO pollanswer values (null,$id,$prvo,'$date')";

    $konekcija -> query($upit);

    $upit1 = "INSERT INTO pollanswer values (null,$id,$drugo,'$date')";

    $konekcija -> query($upit1);
}
?>