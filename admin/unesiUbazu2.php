<?php

include "../models/connection.php";

//menu

if(isset($_POST["tabelaIme"])){
    $imeTabele = $_POST["tabelaIme"];
    $idKol = $_POST["id"];
    if($imeTabele == "answers"){
        $id = null;
        $pollAnswer = $_POST["pollAnswer"];
        $nameAnswer = $_POST["nameAnswer"];

        $greska1=false;
        $greska2=false;

        if($pollAnswer){
            $greska1=false;
        }
        else $greska1=true;

        if($nameAnswer == null){
            $greska2 = true;
        }
        else $greska2 = false;

        if($greska1 == false || $greska2 == false){
            $upitt = "UPDATE answers SET pollId=:poll,answer=:answer where answerId=$idKol";
            $upit = $konekcija->prepare($upitt);
            $upit -> bindParam(":poll",$pollAnswer);
            $upit -> bindParam(":answer",$nameAnswer);




            $rezultat = $upit->execute();

            echo $rezultat;
        }
    }

    if($imeTabele == "brands"){
        $brandsSlika = $_POST["brandsSlika"];
        $brandsNaslov = $_POST["brandsNaslov"];
        $brandsTekst = $_POST["brandsTekst"];

        $id = null;
        $greska1=false;
        $greska2=false;
        $greska3=false;

        if($brandsSlika==null){
            $greska1=true;
        }
        else $greska1=false;

        if($brandsNaslov == null){
            $greska2 = true;
        }
        else $greska2=false;

        if($brandsTekst == null){
            $greska3 = true;
        }
        else $greska3=false;


        if($greska1 == false && $greska2 == false && $greska3 == false){
            $upit = $konekcija->prepare("UPDATE brands SET slika=:slika,naslov=:naslov,tekst=:tekst where brandId=$idKol");
            $upit -> bindParam(":slika",$brandsSlika);
            $upit -> bindParam(":naslov",$brandsNaslov);
            $upit -> bindParam(":tekst",$brandsTekst);




            $rezultat = $upit->execute();

            echo $rezultat;
        }
        else echo"greska";
    }

    if($imeTabele == "poll"){
        $id = null;
        $pollName = $_POST["pollName"];
        $active = $_POST["active"];

        $greska1=false;
        $greska2=false;

        if($active){
            $greska1=false;
        }
        else $greska1=true;

        if($pollName == null){
            $greska2 = true;
        }
        else $greska2 = false;

        if($greska1 == false || $greska2 == false){
            $upit = $konekcija->prepare("UPDATE poll SET name=:name,active=:active where pollId=$idKol");
            $upit -> bindParam(":name",$pollName);
            $upit -> bindParam(":active",$active);




            $rezultat = $upit->execute();

            echo $rezultat;
        }
    }

    if($imeTabele == "newsletter"){
        $id = null;
        $email = $_POST["email"];

        $regEmail = "/^[a-z](([a-z])?([0-9])?){1,13}@(gmail|hotmail)\.com$/";

        $greska = false;


        if (!preg_match($regEmail, $email)) {
            $greska = true;
        }

        if($greska){
            echo "sintaksna greska";
            http_response_code(422);
        }
        else{

            $upit = "UPDATE newsletter SET email=:email WHERE newsId=$idKol";

            $upis=$konekcija->prepare($upit);

            $upis->bindParam(":email", $email);


            $upis->execute();
            return $upis;
        }
    }

    if($imeTabele == "products"){
        $brandsId = $_POST["brandsId"];
        $genderId = $_POST["genderId"];
        $productName = $_POST["productName"];
        $productImg = $_POST["productImg"];

        $greska1=false;
        $greska2=false;
        $greska3=false;
        $greska4=false;
        if($brandsId){
            $greska1=false;
        }
        else $greska1=true;

        if($genderId){
            $greska2=false;
        }
        else $greska2=true;

        if($productName == null){
            $greska3=true;
        }
        else $greska3=false;

        if($productImg == null){
            $greska4=true;
        }
        else $greska4=false;


        if($greska1 == false && $greska2 == false && $greska3 == false){
            $upit = $konekcija->prepare("UPDATE product SET brandId=:brand,genderId=:gender,Name=:name,img=:img  WHERE productId=$idKol");
            $upit -> bindParam(":brand",$brandsId);
            $upit -> bindParam(":gender",$genderId);
            $upit -> bindParam(":name",$productName);
            $upit -> bindParam(":img",$productImg);




            $rezultat = $upit->execute();
            http_response_code(200);
            echo $rezultat;
        }
        else {echo"greska";
            http_response_code(404);}
    }

    if($imeTabele == "specification"){
        $productId = $_POST["productId"];
        $displayType = $_POST["displayType"];
        $caseType = $_POST["caseType"];
        $waterResistance = $_POST["waterResistance"];
        $caseMaterial = $_POST["caseMaterial"];
        $itemWeight = $_POST["itemWeight"];
        $id =null;
        $greska1=false;
        $greska2=false;
        $greska3=false;
        $greska4=false;
        $greska5=false;
        $greska6=false;

        if($productId){
            $greska1 = false;
        }
        else $greska1 = true;

        if($displayType == null){
            $greska2= true;
        }
        else $greska2 = false;

        if($caseType == null){
            $greska3 = true;
        }
        else $greska3 = false;

        if($waterResistance == null){
            $greska4 = true;
        }
        else $greska4 = false;

        if($caseMaterial == null){
            $greska5 = true;
        }
        else $greska5 = false;

        if($itemWeight == null){
            $greska6 = true;
        }
        else $greska6 = false;

        if($greska1 == false && $greska2 == false && $greska3 == false && $greska4 == false && $greska5 == false && $greska6 == false){
            $upit = $konekcija->prepare("UPDATE specification SET productId=:productId,DisplayType=:DisplayType,CaseType=:caseType,WaterResistance=:WaterResistance,CaseMaterial=:CaseMaterial,ItemWeight=$itemWeight where specId=$idKol");
            $upit -> bindParam(":productId",$productId);
            $upit -> bindParam(":DisplayType",$displayType);
            $upit -> bindParam(":caseType",$caseType);
            $upit -> bindParam(":WaterResistance",$waterResistance);
            $upit -> bindParam(":CaseMaterial",$caseMaterial);




            $rezultat = $upit->execute();
            http_response_code(200);
            echo $rezultat;
        }
        else {echo"greska";
            http_response_code(404);}

    }

    if($imeTabele == "users"){
        $roleId = $_POST["roleId"];
        $fisrtName = $_POST["fisrtName"];
        $lastName = $_POST["lastName"];
        $Username = $_POST["Username"];
        $Email = $_POST["Email"];
        $Password= $_POST["Password"];
        $img = $_POST["img"];

        $id =null;
        $greska1=false;
        $greska2=false;
        $greska3=false;
        $greska4=false;
        $greska5=false;
        $greska6=false;
        $greska7=false;



        if($roleId){
            $greska1 = false;
        }
        else $greska1 = true;

        if($fisrtName == null){
            $greska2= true;
        }
        else $greska2 = false;

        if($lastName == null){
            $greska3 = true;
        }
        else $greska3 = false;

        if($Username == null){
            $greska4 = true;
        }
        else $greska4 = false;

        if($Email == null){
            $greska5 = true;
        }
        else $greska5 = false;

        if($Password == null){
            $greska6 = true;
        }
        else $greska6 = false;



        $passZaUnos = md5($Password);

        if($greska1 == false && $greska2 == false && $greska3 == false && $greska4 == false && $greska5 == false && $greska6 == false && $greska7 == false){
            $upit = $konekcija->prepare("UPDATE users SET roleId=:roleId,fisrtName=:fisrtName,lastName=:lastName,Username=:Username,Email=:Email,Password=:Password,img=:img where userId=$idKol");
            $upit -> bindParam(":roleId",$roleId);
            $upit -> bindParam(":fisrtName",$fisrtName);
            $upit -> bindParam(":lastName",$lastName);
            $upit -> bindParam(":Username",$Username);
            $upit -> bindParam(":Email",$Email);
            $upit -> bindParam(":Password",$passZaUnos);
            $upit -> bindParam(":img",$img);



            $rezultat = $upit->execute();
            http_response_code(200);
            echo $rezultat;
        }
        else {echo"greska";
            http_response_code(404);}
    }

    if($imeTabele == "contact"){
        echo "nesto";
        $ime = $_POST["ime"];
        $prezime = $_POST["prezime"];
        $email = $_POST["email"];
        $pol = $_POST["pol"];
        $type = $_POST["type"];
        $text = $_POST["text"];


        $regZaIme = "/^[A-ZŠĐŽĆČ][a-zšđžćč]{2,15}(\s[A-ZŠĐŽĆČ][a-zšđžćč]{2,15})?$/";
        $regPrezime = "/^[A-ZŠĐŽĆČ][a-zšđžćč]{1,20}(\s[A-ZŠĐŽĆČ][a-zšđžćč]{1,20})?$/";
        $regEmail = "/^[a-z](([a-z])?([0-9])?){1,13}@(gmail|hotmail)\.com$/";

        $greska = false;
        var_dump($text);

        $greska = provera($regZaIme, $ime);
        $greska = provera($regPrezime, $prezime);
        $greska = provera($regEmail, $email);

        if($greska){
            http_response_code(404);
            echo "greska";
        }
        else{
            $userInsert = $konekcija->prepare("INSERT INTO contact(`id`,`ime`,`prezime`,`Pol`,`Type`,`email`,`Text`) VALUES
    (:id,:ime,:prezime,:pol,:type,:email,:text)");

            $id = null;
            $userInsert->bindParam(":id", $id);
            $userInsert->bindParam(":ime", $ime);
            $userInsert->bindParam(":prezime", $prezime);
            $userInsert->bindParam(":pol", $pol);
            $userInsert->bindParam(":type", $type);
            $userInsert->bindParam(":email", $email);
            $userInsert->bindParam(":text", $text);


            $userInsert->execute();

            http_response_code(200);
        }


    }

    if($imeTabele == "price"){
        $productId = $_POST["productId"];
        $price = $_POST["price"];
        $oldPrice = $_POST["oldPrice"];
        $dateOf = $_POST["dateOf"];
        $dateTo = $_POST["dateTo"];

        $id =null;
        $greska1=false;
        $greska2=false;
        $greska3=false;
        $greska4=false;
        $greska5=false;

        if($productId){
            $greska1 = false;
        }
        else $greska1 = true;

        if($price == null){
            $greska2= true;
        }
        else $greska2 = false;

       if($oldPrice == 0){
           $oldPrice = null;
       }
       else if($oldPrice == ""){
           $oldPrice = null;
       }

        if($dateOf){
            $greska4 = false;
        }
        else $greska4 = true;

        if($dateTo){
            $greska5 = false;
        }
        else $greska5 = true;

        if($greska1 == false && $greska2 == false && $greska3 == false && $greska4 == false && $greska5 == false){
            $upit = $konekcija->prepare("UPDATE price SET productId=:productId,price=:price,oldPrice=:oldPrice,dateOf=:dateOf,dateTo=:dateTo where priceId=$idKol");
            $upit -> bindParam(":productId",$productId);
            $upit -> bindParam(":price",$price);
            $upit -> bindParam(":oldPrice",$oldPrice);
            $upit -> bindParam(":dateOf",$dateOf);
            $upit -> bindParam(":dateTo",$dateTo);



            $rezultat = $upit->execute();
            http_response_code(200);
            echo $rezultat;
        }
        else {echo"greska";
            http_response_code(404);}
    }

    if($imeTabele == "gender"){
        $gender = $_POST["gender"];


        $id =null;
        $greska1=false;


        if($gender == null){
            $greska1 = true;
        }
        else $greska1 = false;

        if($greska1 == false){
            $upit = $konekcija->prepare("UPDATE gender SET Type=:type where genderId=$idKol");
            $upit -> bindParam(":type",$gender);




            $rezultat = $upit->execute();
            http_response_code(200);
            echo $rezultat;
        }
        else {echo"greska";
            http_response_code(404);}
    }

    if($imeTabele == "role"){
        $role = $_POST["role"];


        $id =null;
        $greska1=false;


        if($role == null){
            $greska1 = true;
        }
        else $greska1 = false;

        if($greska1 == false){
            $upit = $konekcija->prepare("UPDATE role SET role=:role WHERE roleid=$idKol");
            $upit -> bindParam(":role",$role);




            $rezultat = $upit->execute();
            http_response_code(200);
            echo $rezultat;
        }
        else {echo"greska";
            http_response_code(404);}
    }

    if($imeTabele == "menu"){
        $name = $_POST["name"];
        $link = $_POST["link"];

        $id =null;
        $greska1=false;
        $greska2=false;

        if($name == null){
            $greska1 = true;
        }
        else $greska1 = false;

        if($link == null){
            $greska2 = true;
        }
        else $greska2 = false;

        if($greska1 == false && $greska2 == false){
            $upit = $konekcija->prepare("UPDATE menu SET name=:name,link=:link where id=$idKol");
            $upit -> bindParam(":name",$name);
            $upit -> bindParam(":link",$link);



            $rezultat = $upit->execute();
            http_response_code(200);
            echo $rezultat;

        }
        else {echo"greska";
            http_response_code(404);}
    }

}


function provera($reg, $proveri)
{

    if (!preg_match($reg, $proveri)) {
        return true;
    }
}
function cutImage($slika,$profile=false){
    $tmp=$slika['tmp_name'];
    $name=$slika['name'];
    $type=$slika['type'];
    list($sirina,$visina)=getimagesize($tmp);
    if($profile){
        $nova_sirina=120;
        $nova_visina=120;
    }
    else{
        $nova_sirina=180;
        $nova_visina=180;
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