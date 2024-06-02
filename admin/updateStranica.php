<?php





?>
<style>
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    select,
    input[type="text"],
    input[type="file"] {
        margin-bottom: 10px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 200px;
    }

    input[type="button"] {
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="button"]:hover {
        background-color: #45a049;
    }
</style>
<div id="page-wrapper">
    <div class="main-page">
        <?php

        if(isset($_GET["tabela"])){
            $tabela = $_GET["tabela"];
            $red = $_GET["red"];

            $upit = "SELECT * FROM $tabela";
            $rez = $konekcija -> query($upit);
            $rezultat = $rez -> fetchAll();




            switch ($tabela){
                case "answers":
                    $upit1 = "SELECT * FROM answers WHERE answerId = $red";
                    $rez1 = $konekcija -> query($upit1);
                    $rezultat1 = $rez1 -> fetch();
                    $pollId=$rezultat1["pollId"];
                    $upit = "SELECT * FROM poll";
                    $rez = $konekcija -> query($upit);
                    $rezultat = $rez -> fetchAll();
                    echo"<select id='pollAnswer'>";
                    foreach ($rezultat as $item) {
                        if($item["pollId"] == $pollId){
                            echo "<option value='$pollId' selected='selected' >{$item["name"]}</option>";
                        }
                        else echo "<option value='{$item["pollId"]}'>{$item["name"]}</option>";

                    }
                    echo"</select></br>";
                    echo "<input id='uzmiId' type='hidden' value='{$red}'>";
                    echo "<input type='text' value='{$rezultat1["answer"]}' id='answerName'></br>";
                    echo "<input type='button' id='update{$tabela}' value='Save changes'>";break;

                case "brands":
                    $upit = "SELECT * FROM brands where brandId = $red";
                    $rez = $konekcija -> query($upit);
                    $rezultat = $rez -> fetch();
                    echo "<input type='hidden' id='uzmiId' value='{$red}'>";

                    echo "<label for='brandsSlika'>Putanja</label>
                   <input type='text' value='{$rezultat["slika"]}' id='brandsSlika'></br>";
                    echo "<label for='brandsNaslov'>Naslov</label>
                   <input type='text' value='{$rezultat["naslov"]}' id='brandsNaslov'></br>";
                    echo "<label for='brandsTekst'>Tekst</label>
                  <input type='text' value='{$rezultat["tekst"]}' id='brandsTekst'></br>";
                    echo "<input type='button' id='update{$tabela}' value='Save changes'>";break;

                case "poll":
                    $upit = "SELECT * FROM poll where pollId = $red";
                    $rez = $konekcija -> query($upit);
                    $rezultat = $rez -> fetch();
                    echo "<label for='pollName'>Name</label>
                   <input type='text' value='{$rezultat["name"]}' id='pollName'></br>";
                    $aktiv = $rezultat["active"];
                    echo "<label for='active'>Active</label>";
                    if($aktiv == 0){
                    echo "<select id='active'>
                        <option selected='selected' value='0'>0</option>
                        <option value='1'>1</option>
                    </select><br>";}
                    else{
                        echo "<select id='active'>
                        <option  value='0'>0</option>
                        <option selected='selected' value='1'>1</option>
                    </select><br>";
                    }
                    echo "<input type='hidden' id='uzmiId' value='{$red}'>";

                    echo "<input type='button' id='update{$tabela}' value='Save changes'>";break;

                case "newsletter":
                    $upit = "SELECT * FROM newsletter where newsId = $red";
                    $rez = $konekcija -> query($upit);
                    $rezultat = $rez -> fetch();
                    echo "<input type='hidden' id='uzmiId' value='{$red}'>";

                    echo "<label for='newsEmail'>Email</label>
                   <input type='text' value='{$rezultat["email"]}' id='newsEmail'></br>";
                    echo "<input type='button' id='update{$tabela}' value='Save changes'>";break;

                case "product":
                    $upit2 = "SELECT * FROM product WHERE productId = $red";
                    $rez2 = $konekcija -> query($upit2);
                    $rezultat2 = $rez2 -> fetch();
                    $brandId=$rezultat2["brandId"];
                    $genderId=$rezultat2["genderId"];

                    $upit = "SELECT * FROM brands";
                    $rez = $konekcija -> query($upit);
                    $rezultat = $rez -> fetchAll();
                    echo"<label for='brandsId'>Brand</label><select id='brandsId'>";
                    foreach ($rezultat as $item) {
                        if($item["brandId"]==$brandId){
                            echo "
                            <option selected='selected' value='{$brandId}'>{$item["naslov"]}</option>";
                        }
                        else echo "
                            <option value='{$item["brandId"]}'>{$item["naslov"]}</option>";

                    }
                    echo"</select></br>";
                    $upit1 = "SELECT * FROM gender";
                    $rez1 = $konekcija -> query($upit1);
                    $rezultat1 = $rez1 -> fetchAll();
                    echo"<label for='genderId'>Gender</label><select id='genderId'>";
                    foreach ($rezultat1 as $item) {
                        if($item["genderId"]==$genderId){
                            echo "<option selected='selected' value='{$genderId}'>{$item["Type"]}</option>";
                    }
                        else{
                                echo "<option value='{$item["genderId"]}'>{$item["Type"]}</option>";}
                        }


                    echo"</select></br>";
                    echo "<label for='productName'>Name</label>
                  <input type='text' value='{$rezultat2["Name"]}' id='productName'></br>";
                    echo "<label for='productImg'>Img</label>
                  <input type='text' value='{$rezultat2["img"]}' id='productImg'></br>";
                    echo "<input type='hidden' id='uzmiId' value='{$red}'>";

                    echo "<input type='button' id='update{$tabela}' value='Save changes'>";break;

                case "specification":
                    $upit2 = "SELECT * FROM specification WHERE specId = $red";
                    $rez2 = $konekcija -> query($upit2);
                    $rezultat2 = $rez2 -> fetch();

                    $produktId=$rezultat2["productId"];


                    $upit = "SELECT * FROM product";
                    $rez = $konekcija -> query($upit);
                    $rezultat = $rez -> fetchAll();
                    echo"<label for='productId'>Product</label><select id='productId'>";
                    foreach ($rezultat as $item) {

                        if($item["productId"] == $produktId){
                            echo "<option selected='selected' value='{$produktId}'>{$item["Name"]}</option>";
                        }
                        else echo "<option value='{$item["productId"]}'>{$item["Name"]}</option>";

                    }
                    echo"</select></br>";
                    echo "<input type='hidden' id='uzmiId' value='{$red}'>";

                    echo "<label for='displayType'>DisplayType</label>
                   <input type='text' value='{$rezultat2["DisplayType"]}' id='displayType'></br>";
                    echo "<label for='caseType'>CaseType</label>
                   <input type='text' value='{$rezultat2["CaseType"]}' id='caseType'></br>";
                    echo "<label for='waterResistance'>WaterResistance</label>
                   <input type='text' value='{$rezultat2["WaterResistance"]}' id='waterResistance'></br>";
                    echo "<label for='caseMaterial'>CaseMaterial</label>
                   <input type='text' value='{$rezultat2["CaseMaterial"]}' id='caseMaterial'></br>";
                    echo "<label for='itemWeight'>ItemWeight</label>
                   <input type='text' value='{$rezultat2["ItemWeight"]}' id='itemWeight'></br>";
                    echo "<input type='button' id='update{$tabela}' value='Save changes'>";break;

                case "users":

                    $upit2 = "SELECT * FROM users WHERE userId = $red";
                    $rez2 = $konekcija -> query($upit2);
                    $rezultat2 = $rez2 -> fetch();

                    $roleIdUser=$rezultat2["roleId"];


                    $upit = "SELECT * FROM role";
                    $rez = $konekcija -> query($upit);
                    $rezultat = $rez -> fetchAll();
                    echo"<label for='roleId'>Role</label><select id='roleId'>";
                    foreach ($rezultat as $item) {
                        if($item["roleid"]==$roleIdUser){
                            echo "<option value='{$roleIdUser}'selected='selected'>{$item["role"]}</option>";
                        }
                        else{
                            echo "<option value='{$item["roleid"]}'>{$item["role"]}</option>";
                        }

                    }
                    echo"</select></br>";
                    echo "<input type='hidden' id='uzmiId' value='{$red}'>";

                    echo "<label for='fisrtName'>fisrtName</label>
                   <input type='text' value='{$rezultat2["fisrtName"]}' id='fisrtName'></br>";
                    echo "<label for='lastName'>lastName</label>
                   <input type='text' value='{$rezultat2["lastName"]}' id='lastName'></br>";
                    echo "<label for='Username'>Username</label>
                   <input type='text' value='{$rezultat2["Username"]}' id='Username'></br>";
                    echo "<label for='Email'>Email</label>
                   <input type='text' value='{$rezultat2["Email"]}' id='Email'></br>";
                    echo "<label for='Password'>Password</label>
                   <input type='text' value='{$rezultat2["Password"]}' disabled='disabled' id='Password'></br>";
                    echo "<label for='img'>img</label>
                   <input type='text' value='{$rezultat2["img"]}' id='img'></br>";
                    echo "<input type='button' id='update{$tabela}' value='Save changes'>";break;

                case "contact":

                    $upit2 = "SELECT * FROM contact WHERE id = $red";
                    $rez2 = $konekcija -> query($upit2);
                    $rezultat2 = $rez2 -> fetch(PDO::FETCH_ASSOC);
                    $ceck = explode(",",$rezultat2["Type"]);
                    echo "<input type='hidden' id='uzmiId' value='{$red}'>";

                    echo"<form name='prijava' id='prijava'>
    <h2>Contact</h2>
    <div class='forma'>
        <label>First name:</label></br>
        <input type='text' value='{$rezultat2["ime"]}' id='ime' name='ime' placeholder='Name..'>
    </div>
    <div class='forma'>
        <label>Last name:</label></br>
        <input type='text' value='{$rezultat2["prezime"]}' id='prezime' name='prezime' placeholder='Last name..'>
    </div>


    <div class='forma'>
        <label>Email:</label></br>
        <input type='email' id='mejl' value='{$rezultat2["email"]}' name='mejl' placeholder='Email..'>
    </div>

";
$pol=$rezultat2["Pol"];

if($pol=="Male"){
    echo"<div class='forma'>
        <div>
            <div id='rad1'>
                <input type='radio' name='Rb1' id='Stak' value='Male' checked/>
                <label for='Stak'>
                    Male
                </label>
            </div>
            <div id='rad1'>

                <input type='radio' name='Rb1' id='Ogl' value='Female' />
                <label for='Ogl'>
                    Woman
                </label>
            </div>

        </div>
    </div>
    </br>";
}
else{
    echo"<div class='forma'>
        <div>
            <div id='rad1'>
                <input type='radio' name='Rb1' id='Stak' value='Male' />
                <label for='Stak'>
                    Male
                </label>
            </div>
            <div id='rad1'>

                <input type='radio' name='Rb1' id='Ogl' value='Female' checked/>
                <label for='Ogl'>
                    Woman
                </label>
            </div>

        </div>
    </div>
    </br>";
}


if(in_array("Problem",$ceck)){
    echo"
        <div class='forma'>
        <div>
            <div id='rad2'>
                <input type='checkbox' value='Problem' id='cck' name='chd' checked/>
                <label for='cck'>
                    Problem
                </label>
            </div>";
}
else{
    echo"
        <div class='forma'>
        <div>
            <div id='rad2'>
                <input type='checkbox' value='Problem' id='cck' name='chd' />
                <label for='cck'>
                    Problem
                </label>
            </div>";
}

if(in_array("Suggestion",$ceck)){

    echo " <div id='rad2'>
                <input type='checkbox' value='Suggestion' id='cck' name='chd' checked/>
                <label for='cck'>
                    Suggestion
                </label>
            </div>";



}
else{
    echo " <div id='rad2'>
                <input type='checkbox' value='Suggestion' id='cck' name='chd' />
                <label for='cck'>
                    Suggestion
                </label>
            </div>";
}

if(in_array("Feedback",$ceck)){
    echo"
            <div id='rad2'>
                <input type='checkbox' value='Feedback' id='cck' name='chd' checked/>
                <label for='cck'>
                    Feedback
                </label>
            </div>

        </div>
    </div>";
}
else{
    echo"
            <div id='rad2'>
                <input type='checkbox' value='Feedback' id='cck' name='chd' />
                <label for='cck'>
                    Feedback
                </label>
            </div>

        </div>
    </div>";
}


     echo"
        
    </br>
    <div class='forma'>
        <label>Message:</label></br>
        <textarea id='pisi'  name='pisi' placeholder='Your message..'>{$rezultat2["Text"]}</textarea>
        <p class='sakrij greskap'></p>
        <p id='brojkar' class='kraj1'></p>
    </div>
</form></div>";            echo "<input type='button' id='update{$tabela}' value='Save changes'>";break;

                case "price":
                    $upit2 = "SELECT * FROM price WHERE priceId = $red";
                    $rez2 = $konekcija -> query($upit2);
                    $rezultat2 = $rez2 -> fetch(PDO::FETCH_ASSOC);

                    $prodId=$rezultat2["productId"];


                    $upit = "SELECT * FROM product";
                    $rez = $konekcija -> query($upit);
                    $rezultat = $rez -> fetchAll();
                    echo"<label for='productId'>Product</label><select id='productId'>";
                    foreach ($rezultat as $item) {
                        if($item["productId"]==$prodId){
                            echo "<option value='{$prodId}'selected='selected'>{$item["Name"]}</option>";
                        }
                        else echo "<option value='{$item["productId"]}'>{$item["Name"]}</option>";

                    }
                    echo"</select></br>";
                    echo "<input type='hidden' id='uzmiId' value='{$red}'>";
                    $datumOd = explode(" ",$rezultat2["dateOf"]);
                    $datumDo = explode(" ",$rezultat2["dateTo"]);
                    echo "<label for='price'>price</label>
                   <input type='text' value='{$rezultat2["price"]}' id='price'></br>";
                    echo "<label for='oldPrice'>oldPrice</label>
                   <input type='text' value='{$rezultat2["oldPrice"]}' id='oldPrice'></br>";
                    echo "<label for='dateOf'>dateOf</label>
                   <input type='date' value='{$datumOd[0]}' id='dateOf'></br>";
                    echo "<label for='dateTo'>dateTo</label>
                   <input type='date' value='{$datumDo[0]}' id='dateTo'></br>";
                    echo "<input type='button' id='update{$tabela}' value='Save changes'>";break;

                case "gender":
                    $upit2 = "SELECT * FROM gender WHERE genderId = $red";
                    $rez2 = $konekcija -> query($upit2);
                    $rezultat2 = $rez2 -> fetch(PDO::FETCH_ASSOC);
                    echo "<input type='hidden' id='uzmiId' value='{$red}'>";

                    echo "<label for='gender'>Gender</label>
                   <input type='text' value='{$rezultat2["Type"]}' id='gender'></br>";
                    echo "<input type='button' id='update{$tabela}' value='Save changes'>";break;

                case "role":
                    $upit2 = "SELECT * FROM role WHERE roleid = $red";
                    $rez2 = $konekcija -> query($upit2);
                    $rezultat2 = $rez2 -> fetch(PDO::FETCH_ASSOC);
                    echo "<input type='hidden' id='uzmiId' value='{$red}'>";

                    echo "<label for='role'>Role</label>
                   <input type='text' value='{$rezultat2["role"]}' id='role'></br>";
                    echo "<input type='button' id='update{$tabela}' value='Save changes'>";break;

                case "menu":
                    $upit2 = "SELECT * FROM menu WHERE id = $red";
                    $rez2 = $konekcija -> query($upit2);
                    $rezultat2 = $rez2 -> fetch(PDO::FETCH_ASSOC);
                    echo "<input type='hidden' id='uzmiId' value='{$red}'>";

                    echo "<label for='name'>name</label>
                   <input type='text' value='{$rezultat2["name"]}' id='name'></br>";
                    echo "<label for='link'>link</label>
                   <input type='text' value='{$rezultat2["link"]}' id='link'></br>";
                    echo "<input type='button' id='update{$tabela}' value='Save changes'>";break;

            }
        }
        ?>
    </div>
</div>

<script src="js/main.js"></script>
