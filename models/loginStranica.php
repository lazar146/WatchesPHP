<?php

    session_start();

?>
<?php
include "connection.php";
global $konekcija;
echo "nes";

if(isset($_POST["LogDugme"])) {
    $email = $_POST["LogEmail"];
    $password = $_POST["LogPassword"];
    $LogPassword = md5($password);
    
    echo $email;
    $upit = $konekcija -> prepare("SELECT * FROM users where Email like :email and Password = :password");

    
    $upit->bindParam(":email", $email);
    $upit->bindParam(":password", $LogPassword);
    $upit->execute();

   $user = $upit -> fetch(PDO::FETCH_ASSOC);

    echo $LogPassword;
    var_dump ($user);


    if (isset($user['roleId'])) {
        $roleId = $user['roleId'];
        echo $roleId;
    } else {
        echo "NEMA";
    }



    if($user) {
             $time=date("d.m.Y. h:i:s");
            $_SESSION['user'] = $user;
           http_response_code(200);
           $fajl = fopen("../data/evidencija.txt","a");
           $email = $user['Email'];
           $unesi = $email . " " . $time. "\n";
           fwrite($fajl,$unesi);
    } 
    else {
        http_response_code(404);
        echo "User doesn't exist!";
    }
}
?>