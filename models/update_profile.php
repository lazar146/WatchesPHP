<?php
session_start();
include "connection.php";
echo "uso2";
if(isset($_POST["Fname"])){
    echo "uso1";
    $user = $_SESSION["user"];
    $ime = $_POST["Fname"];
          $prezime = $_POST["Lname"];
                $username = $_POST["Uname"];
                    $email = $_POST["email"];
    $roleId = $user["roleId"];
    $password = $user["Password"];
    $img = $user["img"];
    $greska1=false;
    $greska2=false;
    $greska3=false;
    $greska4=false;

    if($ime == null){
        $greska2= true;
    }
    else $greska2 = false;

    if($prezime == null){
        $greska3 = true;
    }
    else $greska3 = false;

    if($username == null){
        $greska4 = true;
    }
    else $greska4 = false;

    if($email == null){
        $greska5 = true;
    }
    else $greska5 = false;



    if($greska1 == false && $greska2 == false && $greska3 == false && $greska4 == false && $greska5 == false ){
        $upit = $konekcija->prepare("UPDATE users SET roleId=:roleId,fisrtName=:fisrtName,lastName=:lastName,Username=:Username,Email=:Email,Password=:Password,img=:img where userId={$user["userId"]}");
        $upit -> bindParam(":roleId",$roleId);
        $upit -> bindParam(":fisrtName",$ime);
        $upit -> bindParam(":lastName",$prezime);
        $upit -> bindParam(":Username",$username);
        $upit -> bindParam(":Email",$email);
        $upit -> bindParam(":Password",$password);
        $upit -> bindParam(":img",$img);



        $rezultat = $upit->execute();
        http_response_code(200);
        header("Location: ../index.php?page=profile");
        echo $rezultat;
    }
    else {echo"greska";
        http_response_code(404);}
}