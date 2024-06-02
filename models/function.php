<?php

include "connection.php";




function dinMeni()
{

    include "connection.php";


    $upit = "SELECT * FROM menu";

    $rez = $konekcija->query($upit);

    $rezultat = $rez->fetchAll();


    foreach ($rezultat as $obj) {
        echo "<li><a href={$obj["link"]}>{$obj["name"]}</a></li>";
        
    }
    


 
}

function dinProizvodi()
{
    include "connection.php";


    $upit = "SELECT p.productId, p.Name,p.img,pr.price,pr.oldPrice,g.Type,b.naslov,s.DisplayType,s.CaseType,s.WaterResistance,s.ItemWeight
    FROM product p inner join price pr ON p.productId=pr.productId inner join gender g ON p.genderId=g.genderId inner join brands b ON p.brandId=b.brandId 
    inner join specification s ON p.productId=s.productId where 1=1 limit 3";

    $rez = $konekcija->query($upit);

    $rezultat = $rez->fetchAll();

    if (count($rezultat) == 0) {
        echo "<div class='col-md-12'>
        <div class='boxes text-center'>
                <h2 class='alert alert-danger'>NO ITEMS</h2>
               </div>
       </div>";
    };
    foreach ($rezultat as $i) {

        echo "<div class='col-lg-4'>
    <div class='boxes'>
        <div class='inner_content clearfix'>
        <div class='kriga'>
            <div class='mask1'>
                <a href='index.php?page=single&prodId={$i["productId"]}'><img src={$i["img"]} alt={$i["Name"]} class='w-100 zoom-img' /></a>
            </div>
            <div class='product_container'>
            <h4>{$i["Name"]}</h4>
            <h6>{$i["Type"]}</h6>
            <p>{$i["naslov"]}</p>
            <div class='price mount item_price fll'>
                <p id='nova'>{$i["price"]}$</p>
                <del id='del'
                >{$i["oldPrice"]}</del
                >
            </div>
            <div id='cent'>
                <input
                type='button'
                id='modaliraj'
                class='button btn dodaj buttonShop'
                value='Add to cart'
                data-id={$i["productId"]}
                />
               
            </div>
            </div>
        </div>
        </div>



    
        </div>
    </div>";
    };
}



function dinBrands()
{
    include "connection.php";

    $upit = "SELECT brandId,naslov FROM brands";

    $rez = $konekcija->query($upit);

    $rezultat = $rez->fetchAll();



    foreach ($rezultat as $obj) {
        echo "<li><input type='checkbox' value={$obj["brandId"]}  class='filter'  name='brands'> {$obj["naslov"]}</li>";
    }
}
function dinPrice()
{
    include "connection.php";

    $upit = "SELECT * FROM pricefilter";

    $rez = $konekcija->query($upit);

    $rezultat = $rez->fetchAll();



    foreach ($rezultat as $obj) {
        echo "<li><input type='checkbox' value={$obj["priceFilId"]} class='filter' name='price'> {$obj["priceRange"]}</li>";
    }
}

function ispisModal()
{
    include "connection.php";


    $upit = "SELECT * FROM specification";

    $rez = $konekcija->query($upit);

    $rezultat = $rez->fetchAll();

    if (isset($_POST["Prodid"])) {


        $buttonId = $_POST["Prodid"];

        foreach ($rezultat as $i) {

            $prodId = $i["productId"];

            if ($prodId == $buttonId) {
                echo
                "                          
                          <p id='mInfo'><strong id='str'>Display Type:</strong> {$i["DisplayType"]}</p>
                          <p id='mInfo'><strong id='str'>Case Type:</strong> {$i["CaseType"]}</p>
                          <p id='mInfo'><strong id='str'>Case Material:</strong> {$i["CaseMaterial"]}</p>
                          <p id='mInfo'><strong id='str'>Water Resistance:</strong> {$i["WaterResistance"]}</p>
                          <p id='mInfo'><strong id='str'>Item weight:</strong> {$i["ItemWeight"]}</p>
                          ";
            }
        }
    }
}
ispisModal();
function testimonialIspis()
{
    include "connection.php";


    $upit = "SELECT * FROM testimonials";

    $rez = $konekcija->query($upit);

    $rezultat = $rez->fetchAll();


    foreach ($rezultat as $i) {

        echo "<div class='testimonial'>
        <p class='testimonial-text'>{$i["text"]}</p>
        <h4>{$i["watch"]}</h4>
        <h3 class='testimonial-author'>{$i["author"]}</h3>
      </div>";
    };
};

function provera($reg, $proveri)
{

    if (!preg_match($reg, $proveri)) {
        return true;
    }
}

function insertForma($ime, $prezime, $email, $pol, $type, $text)
{
    include "connection.php";

    $userInsert = $konekcija->prepare("INSERT INTO contact VALUES
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
    return $userInsert;
}
function proveraForme()
{
    if (isset($_POST["ime"])) {

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


        $greska = provera($regZaIme, $ime);
        $greska = provera($regPrezime, $prezime);
        $greska = provera($regEmail, $email);


        if ($greska) {
            $response = ["message" => "A mistake occured"];
            $status = 422;
        } else {
            $prov =  insertForma($ime, $prezime, $email, $pol, $type, $text);
            if ($prov) {
                $response = ["message" => "Success"];
                $status = 200;
            } else {
                $response = ["message" => "Error"];
                $status = 500;
            }

            echo json_encode($response);
            http_response_code($status);
        }
    }
}
proveraForme();


function insertUser($RegIme, $RegPrezime, $RegEmail, $RegUsername, $RegPassword)
{
    include "connection.php";
    $img=null;
    $userInsert = $konekcija->prepare("INSERT INTO users VALUES
    (:id,2,:ime,:prezime,:username,:email,:password,:img)");

    $id = null;
    $userInsert->bindParam(":id", $id);
    $userInsert->bindParam(":ime", $RegIme);
    $userInsert->bindParam(":prezime", $RegPrezime);
    $userInsert->bindParam(":username", $RegUsername);
    $userInsert->bindParam(":email", $RegEmail);
    $userInsert->bindParam(":password", $RegPassword);
    $userInsert->bindParam(":img", $img);

    $userInsert->execute();
    return $userInsert;
}
function registracija()
{
    if (isset($_POST["Regime"])) {

        $regexZaIme = "/^[A-ZŠĐŽĆČ][a-zšđžćč]{2,15}(\s[A-ZŠĐŽĆČ][a-zšđžćč]{2,15})?$/";
        $regexPrezime = "/^[A-ZŠĐŽĆČ][a-zšđžćč]{1,20}(\s[A-ZŠĐŽĆČ][a-zšđžćč]{1,20})?$/";
        $regexEmail = "/^[a-z][a-z0-9]+(\.)*[a-z0-9]+((\.)*[a-z0-9]+){0,2}\@(gmail\.com|yahoo\.com|outlook\.com|hotmail\.com)$/";
        $passwordRegex = "/^[A-Za-z0-9]{6,}$/";
        $usernameRegex = "/^[A-Za-z0-9]{4,}$/";


        $RegIme = $_POST["Regime"];
        $RegPrezime = $_POST["Regprezime"];
        $RegEmail = $_POST["Regemail"];
        $RegUsername = $_POST["Regusername"];
        $RegPassword = $_POST["Regpassword"];
        $KriptPass = md5($RegPassword);


        $greska = false;
        $greska = provera($regexZaIme, $RegIme);
        $greska = provera($regexPrezime, $RegPrezime);
        $greska = provera($regexEmail, $RegEmail);
        $greska = provera($passwordRegex, $RegPassword);
        $greska = provera($usernameRegex, $RegUsername);

        if ($greska) {
            $response = ["message" => "A mistake occured"];
            $status = 422;
        } else {
            $prov =  insertUser($RegIme, $RegPrezime, $RegEmail, $RegUsername, $KriptPass);
            if ($prov) {
                $response = ["message" => "Success"];
                $status = 200;
            } else {
                $response = ["message" => "Error"];
                $status = 500;
            }

            echo json_encode($response);
            http_response_code($status);
        }
    }
}
registracija();


function ispisSlika(){

    include "connection.php";

    $upit = "SELECT * FROM dynamicpictures";
    
    $rez = $konekcija->query($upit);

    $rezultat = $rez->fetchAll();


    foreach($rezultat as $i){
        echo
        "
        <li>
						<a href='#image-{$i["id"]}'>
							<img src={$i["img"]} class='img-responsive' alt='image01' />
							<span>{$i["span"]}</span>
						</a>
						<div class='lb-overlay' id='image-{$i["id"]}'>
							<a href='#page' class='lb-close'>x Close</a>
							<img src={$i["img"]} class='img-responsive' alt='image01' />
							<div>
								<h3>{$i["h3"]}</h3>
								<p>{$i["p"]}</p>
							</div>
						</div>
					</li>
        ";
    }
}
function ispisBrenda() {

    


    include "connection.php";

    $upit = "SELECT * FROM brands";

    $rez = $konekcija->query($upit);

    $rezultat = $rez->fetchAll();

    foreach ($rezultat as $i) {


        echo 
            "
            <div class='brand_box'>
            <div class='left-side col-xs-12 col-sm-3'>
                <img src='{$i["slika"]}' alt='{$i["naslov"]}'/>
            </div>
            <div class='middle-side col-xs-12 col-sm-5'>
                <h4><a href='#'>{$i["naslov"]}</a></h4>
                <p>{$i["tekst"]}</p>
            </div>
            <div class='right-side col-xs-12 col-sm-4'>
               <p><a href='index.php?page=shop'>Go to shop</a></p>
              <a href='index.php?page=shop' id='brend' class='btn btn1 btn-primary btn-normal btn-inline' data-id='{$i["brandId"]}' target='_self'>View Products</a>     
           </div>
            <div class='clearfix'> </div>
    </div>
    ";
    }

   
}
function indexSatovi(){
    
    include "connection.php";

    $upit = "SELECT * FROM indexsatovi";

    $rez = $konekcija->query($upit);

    $rezultat = $rez->fetchAll();



    foreach($rezultat as $i){
        echo "<li class='col-sm-4'>
        <a href='index.php?page=shop' class='item-link' title=''>
            <div class='bannerBox'>
                <img src={$i["slika"]} class='item-img' title=' alt=' width='100%' height='100%'>
                <div class='item-html'>
                    <h3>{$i["h3"]}<span>Watches</span></h3>
                    <p>{$i["p"]}</p>
                    <button>Shop now!</button>
                </div>
            </div>
        </a>
    </li>";
    }
}
function social(){
    include "connection.php";

    $upit = "SELECT * FROM social";

    $rez = $konekcija->query($upit);

    $rezultat = $rez->fetchAll(PDO::FETCH_ASSOC);


    foreach($rezultat as $i){

    echo "
    <li><a href='{$i["link"]}'><i class='{$i["class"]}'> </i> </a></li>
    ";

    }
   

}

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




