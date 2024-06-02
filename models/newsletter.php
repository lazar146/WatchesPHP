
<?php
include "connection.php";

function provera($reg, $proveri)
{

    if (!preg_match($reg, $proveri)) {
        return true;
    }
}





    if(isset($_POST['dugmeN'])){
        $email = $_POST['emailN'];


        var_dump($email);

        $regEmail = "/^[a-z](([a-z])?([0-9])?){1,13}@(gmail|hotmail)\.com$/";




        $greska = provera($regEmail,$email);

        if($greska){
            echo "sintaksna greska";
            http_response_code(422);
        }
        else{
            
            $upit = "INSERT INTO newsletter Values (null,:email)";
            
            $upis=$konekcija->prepare($upit);

            $upis->bindParam(":email", $email);


            $upis->execute();
            return $upis;
        }
    }

    ?>