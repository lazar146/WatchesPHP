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
        <form enctype="multipart/form-data">

<?php

if(isset($_GET["tabela"])){
    $tabela = $_GET["tabela"];


    $upit = "SELECT * FROM $tabela";
    $rez = $konekcija -> query($upit);
    $rezultat = $rez -> fetchAll();




    switch ($tabela){
        case "answers":
            $upit = "SELECT * FROM poll";
            $rez = $konekcija -> query($upit);
            $rezultat = $rez -> fetchAll();
            echo"<select id='pollAnswer'>";
            foreach ($rezultat as $item) {
                echo "
                            <option value='{$item["pollId"]}'>{$item["name"]}</option>";
            }
            echo"</select></br>";
            echo "<input type='text' id='answerName'></br>";
            echo "<input type='button' id='save{$tabela}' value='Save changes'>";break;
        case "brands":

            echo "<label for='brandsSlika'>Putanja</label>
                   <input type='file' id='brandsSlika'></br>";
            echo "<label for='brandsNaslov'>Naslov</label>
                   <input type='text' id='brandsNaslov'></br>";
            echo "<label for='brandsTekst'>Tekst</label>
                  <input type='text' id='brandsTekst'></br>";
            echo "<input type='button' id='save{$tabela}' value='Save changes'>";break;
        case "poll":
            echo "<label for='pollName'>Name</label>
                   <input type='text' id='pollName'></br>";
            echo "<label for='active'>Active</label><select id='active'>
                    <option value='0'>0</option>
                    <option value='1'>1</option>
                    </select><br>";

            echo "<input type='button' id='save{$tabela}' value='Save changes'>";break;
        case "newsletter":
            echo "<label for='newsEmail'>Email</label>
                   <input type='text' id='newsEmail'></br>";
            echo "<input type='button' id='save{$tabela}' value='Save changes'>";break;
        case "product":
            $upit = "SELECT * FROM brands";
            $rez = $konekcija -> query($upit);
            $rezultat = $rez -> fetchAll();
            echo"<label for='brandsId'>Brand</label><select id='brandsId'>";
            foreach ($rezultat as $item) {
                echo "
                            <option value='{$item["brandId"]}'>{$item["naslov"]}</option>";
            }
            echo"</select></br>";
            $upit1 = "SELECT * FROM gender";
            $rez1 = $konekcija -> query($upit1);
            $rezultat1 = $rez1 -> fetchAll();
            echo"<label for='genderId'>Gender</label><select id='genderId'>";
            foreach ($rezultat1 as $item) {
                echo "
                            <option value='{$item["genderId"]}'>{$item["Type"]}</option>";
            }
            echo"</select></br>";
            echo "<label for='productName'>Name</label>
                  <input type='text' id='productName'></br>";
            echo "<label for='productImg'>Img</label>
                  <input type='file' id='productImg'></br>";
            echo "<input type='button' id='save{$tabela}' value='Save changes'>";break;
        case "specification":
            $upit = "SELECT * FROM product";
            $rez = $konekcija -> query($upit);
            $rezultat = $rez -> fetchAll();
            echo"<label for='productId'>Product</label><select id='productId'>";
            foreach ($rezultat as $item) {
                echo "
                            <option value='{$item["productId"]}'>{$item["Name"]}</option>";
            }
            echo"</select></br>";
            echo "<label for='displayType'>DisplayType</label>
                   <input type='text' id='displayType'></br>";
            echo "<label for='caseType'>CaseType</label>
                   <input type='text' id='caseType'></br>";
            echo "<label for='waterResistance'>WaterResistance</label>
                   <input type='text' id='waterResistance'></br>";
            echo "<label for='caseMaterial'>CaseMaterial</label>
                   <input type='text' id='caseMaterial'></br>";
            echo "<label for='itemWeight'>ItemWeight</label>
                   <input type='text' id='itemWeight'></br>";
            echo "<input type='button' id='save{$tabela}' value='Save changes'>";break;
        case "users":
            $upit = "SELECT * FROM role";
            $rez = $konekcija -> query($upit);
            $rezultat = $rez -> fetchAll();
            echo"<label for='roleId'>Role</label><select id='roleId'>";
            foreach ($rezultat as $item) {
                echo "
                            <option value='{$item["roleid"]}'>{$item["role"]}</option>";
            }
            echo"</select></br>";
            echo "<label for='fisrtName'>fisrtName</label>
                   <input type='text' id='fisrtName'></br>";
            echo "<label for='lastName'>lastName</label>
                   <input type='text' id='lastName'></br>";
            echo "<label for='Username'>Username</label>
                   <input type='text' id='Username'></br>";
            echo "<label for='Email'>Email</label>
                   <input type='text' id='Email'></br>";
            echo "<label for='Password'>Password</label>
                   <input type='text' id='Password'></br>";
            echo "<label for='img'>img</label>
                   <input type='file' id='img'></br>";
            echo "<input type='button' id='save{$tabela}' value='Save changes'>";break;
        case "contact":
            echo"<form name='prijava' id='prijava'>
    <h2>Contact</h2>
    <div class='forma'>
        <label>First name:</label></br>
        <input type='text' id='ime' name='ime' placeholder='Name..'>
    </div>
    <div class='forma'>
        <label>Last name:</label></br>
        <input type='text' id='prezime' name='prezime' placeholder='Last name..'>
    </div>


    <div class='forma'>
        <label>Email:</label></br>
        <input type='email' id='mejl' name='mejl' placeholder='Email..'>
    </div>


    <div class='forma'>
        <div>
            <div id='rad1'>
                <input type='radio' name='Rb1' id='Stak' value='Male' />
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
    </br>
    <div class='forma'>
        <div>
            <div id='rad2'>
                <input type='checkbox' value='Problem' id='cck' name='chd' />
                <label for='cck'>
                    Problem
                </label>
            </div>



            <div id='rad2'>
                <input type='checkbox' value='Suggestion' id='cck' name='chd' />
                <label for='cck'>
                    Suggestion
                </label>
            </div>



            <div id='rad2'>
                <input type='checkbox' value='Feedback' id='cck' name='chd' />
                <label for='cck'>
                    Feedback
                </label>
            </div>

        </div>
    </div>

    </br>
    <div class='forma'>
        <label>Message:</label></br>
        <textarea id='pisi' name='pisi' placeholder='Your message..'></textarea>
        <p class='sakrij greskap'></p>
        <p id='brojkar' class='kraj1'></p>
    </div>
</form></div>";            echo "<input type='button' id='save{$tabela}' value='Save changes'>";break;
        case "price":
            $upit = "SELECT * FROM product";
            $rez = $konekcija -> query($upit);
            $rezultat = $rez -> fetchAll();
            echo"<label for='productId'>Product</label><select id='productId'>";
            foreach ($rezultat as $item) {
                echo "
                            <option value='{$item["productId"]}'>{$item["Name"]}</option>";
            }
            echo"</select></br>";
            echo "<label for='price'>price</label>
                   <input type='text' id='price'></br>";
            echo "<label for='oldPrice'>oldPrice</label>
                   <input type='text' id='oldPrice'></br>";
            echo "<label for='dateOf'>dateOf</label>
                   <input type='date' id='dateOf'></br>";
            echo "<label for='dateTo'>dateTo</label>
                   <input type='date' id='dateTo'></br>";
            echo "<input type='button' id='save{$tabela}' value='Save changes'>";break;
        case "gender":
            echo "<label for='gender'>Gender</label>
                   <input type='text' id='gender'></br>";
            echo "<input type='button' id='save{$tabela}' value='Save changes'>";break;
        case "role":
            echo "<label for='role'>Role</label>
                   <input type='text' id='role'></br>";
            echo "<input type='button' id='save{$tabela}' value='Save changes'>";break;
        case "menu":
            echo "<label for='name'>name</label>
                   <input type='text' id='name'></br>";
            echo "<label for='link'>link</label>
                   <input type='text' id='link'></br>";
            echo "<input type='button' id='save{$tabela}' value='Save changes'>";break;
    }
}
?>
        </form>
    </div>
</div>

<script src="js/main.js"></script>
