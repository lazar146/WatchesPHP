window.onload = function () {




    $(".del").click(function () {

        var id = this.getAttribute("data-id");

        var name = this.getAttribute("data-name");
        console.log("ss");


        $.ajax({
            url: "delete.php",
            type: "post",
            data: {
                "id": id,
                "name": name,
                "dugmad": true
            },
            success: function (rez) {
                console.log(rez);
                location.reload();
            }
        })
    })


}
console.log("asdfasda");
$("#saveanswers").click(function (){
var pollAnswer = document.querySelector("#pollAnswer").value;
var nameAnswer = document.querySelector("#answerName").value;


    console.log(pollAnswer);
    console.log(nameAnswer);

    var greska1,greska2;

    if(pollAnswer){
        greska1 = false;
    }
    else greska1 = true;

    if(nameAnswer == null){
        greska2 = true;
    }
    else greska2 = false;

    var objekat = {
        "tabelaIme": "answers",
        "pollAnswer":pollAnswer,
        "nameAnswer":nameAnswer,
        "dugmeAnswer":true
    }

    if(greska1 != true && greska2 != true){
        $.ajax({
            url:"unesiUbazu.php",
            method:"post",
            data: objekat,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?table=answers";

            }
        })

    }

})

$("#savebrands").click(function (){
    var brandsSlika = document.querySelector("#brandsSlika").files[0];
    var brandsNaslov = document.querySelector("#brandsNaslov").value;
    var brandsTekst = document.querySelector("#brandsTekst").value;

    var greska1,greska2,greska3;

    if(brandsSlika == null){
        greska1 = true;
    }
    else greska1 = false;

    if(brandsNaslov == null){
        greska2 = true;
    }
    else greska2 = false;

    if(brandsTekst == null){
        greska3 = true;
    }
    else greska3 = false;

    let podaciZaSlanje = new FormData();

    podaciZaSlanje.append("tabelaIme","brands");
    podaciZaSlanje.append("brandsSlika",brandsSlika);
    podaciZaSlanje.append( "brandsNaslov",brandsNaslov);
    podaciZaSlanje.append("brandsTekst",brandsTekst);
    // var objekat = {
    //     "tabelaIme": "brands",
    //     "brandsSlika":brandsSlika,
    //     "brandsNaslov":brandsNaslov,
    //     "brandsTekst":brandsTekst
    // }
    console.log(podaciZaSlanje);
    if(greska1 != true && greska2 != true && greska3 != true) {
        $.ajax({
            url: "unesiUbazu.php",
            method: "post",
            data: podaciZaSlanje,
            processData:false,
            contentType:false,
            success: function (res) {
                console.log(res);
                location.href = "indexA.php?table=brands&page=tables";

            }
        })
    }})


$("#savepoll").click(function (){
    var pollName = document.querySelector("#pollName").value;
    var pollActive = document.querySelector("#active").value;


    console.log(pollName);
    console.log(pollActive);

    var greska1,greska2;

    if(pollActive){
        greska1 = false;
    }
    else greska1 = true;

    if(pollName == null){
        greska2 = true;
    }
    else greska2 = false;

    var objekat = {
        "tabelaIme": "poll",
        "pollName":pollName,
        "active":pollActive

    }

    if(greska1 != true && greska2 != true){
        $.ajax({
            url:"unesiUbazu.php",
            method:"post",
            data: objekat,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?page=tables&table=poll";

            }
        })

    }

})

$("#savenewsletter").click(function (){
    var email = document.querySelector("#newsEmail").value;
    console.log(email);
    var greska1 = false;
    var objekat = {
        "tabelaIme": "newsletter",
        "email":email

    }
    let regEmail = /^[a-z](([a-z])?([0-9])?){1,13}@(gmail|hotmail)\.com$/;
    if (!regEmail.test(email)) {
       greska1 = true;
    }
    else {
        greska1 = false;

    }
    if(!greska1){
        $.ajax({
            url:"unesiUbazu.php",
            method:"post",
            data: objekat,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?page=tables&table=newsletter";

            }
        })
    }
    else console.log("greska");
})

$("#saveproduct").click(function (){
    var brandsId = document.querySelector("#brandsId").value;
    var genderId = document.querySelector("#genderId").value;
    var productName = document.querySelector("#productName").value;
    var productImg = document.querySelector("#productImg").files[0];

    var greska1,greska2,greska3,greska4;

    if(brandsId){
        greska1 = false;
    }
    else greska1 = true;

    if(genderId){
        greska2 = false;
    }
    else greska2 = true;

    if(productName == null){
        greska3 = true;
    }
    else greska3 = false;

    if(productImg == null){
        greska4 = true;
    }
    else greska4 = false;

    let podaciZaSlanje = new FormData();

    podaciZaSlanje.append("tabelaIme","products");
    podaciZaSlanje.append("brandsId",brandsId);
    podaciZaSlanje.append("genderId",genderId);
    podaciZaSlanje.append("productName",productName);
    podaciZaSlanje.append("productImg",productImg);

    // var objekat = {
    //     "tabelaIme": "products",
    //     "brandsId":brandsId,
    //     "genderId":genderId,
    //     "productName":productName,
    //     "productImg":productImg
    //
    // }

    if(greska1 != true && greska2 != true && greska3 != true && greska4 != true){
        $.ajax({
            url:"unesiUbazu.php",
            method:"post",
            data: podaciZaSlanje,
            processData:false,
            contentType:false,
            success:function(res){
                console.log(res);
                //location.href = "indexA.php?page=tables&table=product";

            }
        })

    }

})

$("#savespecification").click(function (){
    var productId = document.querySelector("#productId").value;
    var displayType = document.querySelector("#displayType").value;
    var caseType = document.querySelector("#caseType").value;
    var waterResistance = document.querySelector("#waterResistance").value;
    var caseMaterial = document.querySelector("#caseMaterial").value;
    var itemWeight = document.querySelector("#itemWeight").value;


    var greska1,greska2,greska3,greska4,greska5,greska6;

    if(productId){
        greska1 = false;
    }
    else greska1 = true;

    if(displayType == null){
        greska2= true;
    }
    else greska2 = false;

    if(caseType == null){
        greska3 = true;
    }
    else greska3 = false;

    if(waterResistance == null){
        greska4 = true;
    }
    else greska4 = false;

    if(caseMaterial == null){
        greska5 = true;
    }
    else greska5 = false;

    if(itemWeight == null){
        greska6 = true;
    }
    else greska6 = false;


    var objekat = {
        "tabelaIme": "specification",
        "productId":productId,
        "displayType":displayType,
        "caseType":caseType,
        "waterResistance":waterResistance,
        "caseMaterial":caseMaterial,
        "itemWeight":itemWeight

    }

    if(greska1 != true && greska2 != true && greska3 != true && greska4 != true && greska5 != true && greska6 != true){
        $.ajax({
            url:"unesiUbazu.php",
            method:"post",
            data: objekat,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?page=tables&table=specification";

            }
        })
}})

$("#saveusers").click(function (){
    var roleId = document.querySelector("#roleId").value;
    var fisrtName = document.querySelector("#fisrtName").value;
    var lastName = document.querySelector("#lastName").value;
    var Username = document.querySelector("#Username").value;
    var Email = document.querySelector("#Email").value;
    var Password = document.querySelector("#Password").value;
    var img = document.querySelector("#img").files[0];

    var greska1,greska2,greska3,greska4,greska5,greska6,greska7;

    if(roleId){
        greska1 = false;
    }
    else greska1 = true;

    if(fisrtName == null){
        greska2= true;
    }
    else greska2 = false;

    if(lastName == null){
        greska3 = true;
    }
    else greska3 = false;

    if(Username == null){
        greska4 = true;
    }
    else greska4 = false;

    if(Email == null){
        greska5 = true;
    }
    else greska5 = false;

    if(Password == null){
        greska6 = true;
    }
    else greska6 = false;



    let podaciZaSlanje = new FormData();

    podaciZaSlanje.append("tabelaIme","users");
    podaciZaSlanje.append("roleId",roleId);
    podaciZaSlanje.append( "fisrtName",fisrtName);
    podaciZaSlanje.append("lastName",lastName);
    podaciZaSlanje.append("Username",Username);
    podaciZaSlanje.append("Email",Email);
    podaciZaSlanje.append( "Password",Password);
    podaciZaSlanje.append("img",img);

    // var objekat = {
    //     "tabelaIme": "users",
    //     "roleId":roleId,
    //     "fisrtName":fisrtName,
    //     "lastName":lastName,
    //     "Username":Username,
    //     "Email":Email,
    //     "Password":Password,
    //     "img":img
    // }

    if(greska1 != true && greska2 != true && greska3 != true && greska4 != true && greska5 != true && greska6 != true&& greska7 != true){
        $.ajax({
            url:"unesiUbazu.php",
            method:"post",
            data: podaciZaSlanje,
            processData:false,
            contentType:false,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?page=tables&table=users";

            }
        })
    }
else console.log("ass")})

$("#savecontact").click(forma)
function forma() {

    console.log("sssssssssss")


    var provIme, provPrezime, provEmail, provDdl, provRad, provCh, provText;

    provIme = document.querySelector("#ime");
    provPrezime = document.querySelector("#prezime");
    provEmail = document.querySelector("#mejl");
    provRad = document.getElementsByName("Rb1");
    provCh = document.getElementsByName("chd");
    provText = document.querySelector("#pisi");

    let regZaIme = /^[A-ZŠĐŽĆČ][a-zšđžćč]{2,15}(\s[A-ZŠĐŽĆČ][a-zšđžćč]{2,15})?$/;
    let regPrezime = /^[A-ZŠĐŽĆČ][a-zšđžćč]{1,20}(\s[A-ZŠĐŽĆČ][a-zšđžćč]{1,20})?$/;
    let regEmail = /^[a-z](([a-z])?([0-9])?){1,13}@(gmail|hotmail)\.com$/;

    if (!regZaIme.test(provIme.value)) {

        Greska5 = true;
    }
    else {

        Greska5 = false;
    }

    if (!regZaIme.test(provPrezime.value)) {

        Greska6 = true;
    }
    else {

        Greska6 = false;
    }


    if (!regEmail.test(provEmail.value)) {

        Greska7 = true;;
    }
    else {

        Greska7 = false;
    }



    let usluga = "";
    for (let i = 0; i < provRad.length; i++) {
        if (provRad[i].checked) {
            usluga = provRad[i].value;
            break;
        }
    }


    let ch = "";
    for (let i = 0; i < provCh.length; i++) {
        if (provCh[i].checked) {
            ch += provCh[i].value + " ";
        }
    }
    var Greska1, Greska2, Greska3, Greska4, Greska5, Greska6, Greska7


    if (usluga == "") {
        p
        Greska2 = true;
    }
    else {

        Greska2 = false;
    }

    if (ch == "") {

        Greska3 = true;
    }
    else {

        Greska3 = false;
    }
    if (provText.value.length < 25) {

        Greska4 = true;
    }
    else {

        Greska4 = false;
    }
    if (Greska2 == false && Greska3 == false && Greska4 == false && Greska5 == false && Greska6 == false && Greska7 == false) {


        provIme = document.querySelector("#ime").value;
        provPrezime = document.querySelector("#prezime").value;
        provEmail = document.querySelector("#mejl").value;

        provRad = document.getElementsByName("Rb1");
        provCh = document.getElementsByName("chd");
        provText = document.querySelector("#pisi").value;

        var chbIds = [];
        var radio = 0;
        for (let i of provCh) {

            if (i.checked) {
                chbIds.push(i.value)
            }

        };
        var string = chbIds.join(",");
        for (let i of provRad) {

            if (i.checked) {
                radio = i.value;
            }

        };
        var objekat = {
            "tabelaIme":"contact",
            "ime": provIme,
            "prezime": provPrezime,
            "email": provEmail,
            "pol": radio,
            "type": string,
            "text": provText
        };




        $.ajax({
            url: "unesiUbazu.php",
            method: "post",
            data: objekat,
            success: function (rezultat) {
                console.log(rezultat);
                location.href = "indexA.php?page=tables&table=contact";

            },
            error: function (xhr) {
                console.log(xhr);
            }
        })



}}

$("#saveprice").click(function (){

    var productId = document.querySelector("#productId").value;
    var price = document.querySelector("#price").value;
    var oldPrice = document.querySelector("#oldPrice").value;
    var dateOf = document.querySelector("#dateOf").value;
    var dateTo = document.querySelector("#dateTo").value;

    var greska1,greska2,greska3,greska4,greska5;

    if(productId){
        greska1 = false;
    }
    else greska1 = true;

    if(price == null){
        greska2= true;
    }
    else greska2 = false;

    if(oldPrice == null){
        greska3 = true;
    }
    else greska3 = false;

    if(dateOf){
        greska4 = false;
    }
    else greska4 = true;

    if(dateTo){
        greska5 = false;
    }
    else greska5 = true;


    var objekat = {
        "tabelaIme": "price",
        "productId":productId,
        "price":price,
        "oldPrice":oldPrice,
        "dateOf":dateOf,
        "dateTo":dateTo


    }
    console.log(objekat)
    if(greska1 != true && greska2 != true && greska3 != true && greska4 != true && greska5 != true){
        $.ajax({
            url:"unesiUbazu.php",
            method:"post",
            data: objekat,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?page=tables&table=price";

            }
        })
}
else console.log("greska")})

$("#savegender").click(function (){
    var gender = document.querySelector("#gender").value;
    var greska;

    if(gender == null){
        greska = true
    }
    else greska=false

    var objekat = {
        "tabelaIme": "gender",
        "gender":gender}

    if(!greska){
        $.ajax({
            url:"unesiUbazu.php",
            method:"post",
            data: objekat,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?page=tables&table=gender";

            }
        })
    }
})

$("#saverole").click(function (){
    var role = document.querySelector("#role").value;
    var greska;

    if(role == null){
        greska = true
    }
    else greska=false

    var objekat = {
        "tabelaIme": "role",
        "role":role}

    if(!greska){
        $.ajax({
            url:"unesiUbazu.php",
            method:"post",
            data: objekat,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?page=tables&table=role";

            }
        })
    }
})

$("#savemenu").click(function (){
    var name = document.querySelector("#name").value;
    var link = document.querySelector("#link").value;
    var greska1,greska2;

    if(name == null){
        greska1 = true
    }
    else greska1=false

    if(link == null){
        greska2 = true
    }
    else greska2=false

    var objekat = {
        "tabelaIme": "menu",
        "name":name,
        "link":link
    }

    if(greska1 == false && greska2 == false){
        $.ajax({
            url:"unesiUbazu.php",
            method:"post",
            data: objekat,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?page=tables&table=menu";
            }
        })
    }
})








$("#updateanswers").click(function (){
    var pollAnswer = document.querySelector("#pollAnswer").value;
    var nameAnswer = document.querySelector("#answerName").value;
    var id = document.querySelector("#uzmiId").value;


    console.log(pollAnswer);
    console.log(nameAnswer);

    var greska1,greska2;

    if(pollAnswer){
        greska1 = false;
    }
    else greska1 = true;

    if(nameAnswer == null){
        greska2 = true;
    }
    else greska2 = false;

    var objekat = {
        "id":id,
        "tabelaIme": "answers",
        "pollAnswer":pollAnswer,
        "nameAnswer":nameAnswer,
        "dugmeAnswer":true
    }

    if(greska1 != true && greska2 != true){
        $.ajax({
            url:"unesiUbazu2.php",
            method:"post",
            data: objekat,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?page=tables&table=answers";

            }
        })

    }

})

$("#updatebrands").click(function (){
    var brandsSlika = document.querySelector("#brandsSlika").value;
    var brandsNaslov = document.querySelector("#brandsNaslov").value;
    var brandsTekst = document.querySelector("#brandsTekst").value;
    var id = document.querySelector("#uzmiId").value;
    var greska1,greska2,greska3;

    if(brandsSlika == null){
        greska1 = true;
    }
    else greska1 = false;

    if(brandsNaslov == null){
        greska2 = true;
    }
    else greska2 = false;

    if(brandsTekst == null){
        greska3 = true;
    }
    else greska3 = false;


    var objekat = {
        "id":id,
        "tabelaIme": "brands",
        "brandsSlika":brandsSlika,
        "brandsNaslov":brandsNaslov,
        "brandsTekst":brandsTekst
    }

    if(greska1 != true && greska2 != true && greska3 != true) {
        $.ajax({
            url: "unesiUbazu2.php",
            method: "post",
            data: objekat,
            success: function (res) {
                console.log(res);
                location.href = "indexA.php?page=tables&table=brands";

            }
        })
    }})

$("#updatepoll").click(function (){
    var pollName = document.querySelector("#pollName").value;
    var pollActive = document.querySelector("#active").value;
    var id = document.querySelector("#uzmiId").value;


    console.log(pollName);
    console.log(pollActive);

    var greska1,greska2;

    if(pollActive){
        greska1 = false;
    }
    else greska1 = true;

    if(pollName == null){
        greska2 = true;
    }
    else greska2 = false;

    var objekat = {
        "id":id,
        "tabelaIme": "poll",
        "pollName":pollName,
        "active":pollActive

    }

    if(greska1 != true && greska2 != true){
        $.ajax({
            url:"unesiUbazu2.php",
            method:"post",
            data: objekat,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?page=tables&table=poll";

            }
        })

    }

})

$("#updatenewsletter").click(function (){
    console.log("upo8");
    var email = document.querySelector("#newsEmail").value;
    var id = document.querySelector("#uzmiId").value;

    console.log(email);
    var greska1 = false;
    var objekat = {
        "id":id,
        "tabelaIme": "newsletter",
        "email":email

    }
    let regEmail = /^[a-z](([a-z])?([0-9])?){1,13}@(gmail|hotmail)\.com$/;
    if (!regEmail.test(email)) {
        greska1 = true;
    }
    else {
        greska1 = false;

    }
    if(!greska1){
        $.ajax({
            url:"unesiUbazu2.php",
            method:"post",
            data: objekat,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?table=newsletter&page=tables";

            }
        })
    }
    else console.log("greska");
})

$("#updateproduct").click(function (){
    var brandsId = document.querySelector("#brandsId").value;
    var genderId = document.querySelector("#genderId").value;
    var productName = document.querySelector("#productName").value;
    var productImg = document.querySelector("#productImg").value;
    var id = document.querySelector("#uzmiId").value;

    var greska1,greska2,greska3,greska4;

    if(brandsId){
        greska1 = false;
    }
    else greska1 = true;

    if(genderId){
        greska2 = false;
    }
    else greska2 = true;

    if(productName == null){
        greska3 = true;
    }
    else greska3 = false;

    if(productImg == null){
        greska4 = true;
    }
    else greska4 = false;

    var objekat = {
        "id":id,
        "tabelaIme": "products",
        "brandsId":brandsId,
        "genderId":genderId,
        "productName":productName,
        "productImg":productImg

    }

    if(greska1 != true && greska2 != true && greska3 != true && greska4 != true){
        $.ajax({
            url:"unesiUbazu2.php",
            method:"post",
            data: objekat,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?page=tables&table=product";

            }
        })

    }

})

$("#updatespecification").click(function (){
    var productId = document.querySelector("#productId").value;
    var displayType = document.querySelector("#displayType").value;
    var caseType = document.querySelector("#caseType").value;
    var waterResistance = document.querySelector("#waterResistance").value;
    var caseMaterial = document.querySelector("#caseMaterial").value;
    var itemWeight = document.querySelector("#itemWeight").value;
    var id = document.querySelector("#uzmiId").value;
    var greska1,greska2,greska3,greska4,greska5,greska6;

    if(productId){
        greska1 = false;
    }
    else greska1 = true;

    if(displayType == null){
        greska2= true;
    }
    else greska2 = false;

    if(caseType == null){
        greska3 = true;
    }
    else greska3 = false;

    if(waterResistance == null){
        greska4 = true;
    }
    else greska4 = false;

    if(caseMaterial == null){
        greska5 = true;
    }
    else greska5 = false;

    if(itemWeight == null){
        greska6 = true;
    }
    else greska6 = false;


    var objekat = {
        "id":id,
        "tabelaIme": "specification",
        "productId":productId,
        "displayType":displayType,
        "caseType":caseType,
        "waterResistance":waterResistance,
        "caseMaterial":caseMaterial,
        "itemWeight":itemWeight

    }

    if(greska1 != true && greska2 != true && greska3 != true && greska4 != true && greska5 != true && greska6 != true){
        $.ajax({
            url:"unesiUbazu2.php",
            method:"post",
            data: objekat,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?page=tables&table=specification";

            }
        })
    }})

$("#updateusers").click(function (){
    var roleId = document.querySelector("#roleId").value;
    var fisrtName = document.querySelector("#fisrtName").value;
    var lastName = document.querySelector("#lastName").value;
    var Username = document.querySelector("#Username").value;
    var Email = document.querySelector("#Email").value;
    var Password = document.querySelector("#Password").value;
    var img = document.querySelector("#img").value;
    var id = document.querySelector("#uzmiId").value;

    var greska1,greska2,greska3,greska4,greska5,greska6,greska7;

    if(roleId){
        greska1 = false;
    }
    else greska1 = true;

    if(fisrtName == null){
        greska2= true;
    }
    else greska2 = false;

    if(lastName == null){
        greska3 = true;
    }
    else greska3 = false;

    if(Username == null){
        greska4 = true;
    }
    else greska4 = false;

    if(Email == null){
        greska5 = true;
    }
    else greska5 = false;

    if(Password == null){
        greska6 = true;
    }
    else greska6 = false;



    var objekat = {
        "id":id,
        "tabelaIme": "users",
        "roleId":roleId,
        "fisrtName":fisrtName,
        "lastName":lastName,
        "Username":Username,
        "Email":Email,
        "Password":Password,
        "img":img
    }

    if(greska1 != true && greska2 != true && greska3 != true && greska4 != true && greska5 != true && greska6 != true&& greska7 != true){
        $.ajax({
            url:"unesiUbazu2.php",
            method:"post",
            data: objekat,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?page=tables&table=users";

            }
        })
    }
    else console.log("ass")})

$("#updateprice").click(function (){

    var productId = document.querySelector("#productId").value;
    var price = document.querySelector("#price").value;
    var oldPrice = document.querySelector("#oldPrice").value;
    var dateOf = document.querySelector("#dateOf").value;
    var dateTo = document.querySelector("#dateTo").value;
    var id = document.querySelector("#uzmiId").value;

    var greska1,greska2,greska3,greska4,greska5;

    if(productId){
        greska1 = false;
    }
    else greska1 = true;

    if(price == null){
        greska2= true;
    }
    else greska2 = false;

    if(oldPrice == null){
        greska3 = true;
    }
    else greska3 = false;

    if(dateOf){
        greska4 = false;
    }
    else greska4 = true;

    if(dateTo){
        greska5 = false;
    }
    else greska5 = true;


    var objekat = {
        "id":id,
        "tabelaIme": "price",
        "productId":productId,
        "price":price,
        "oldPrice":oldPrice,
        "dateOf":dateOf,
        "dateTo":dateTo


    }
    console.log(objekat)
    if(greska1 != true && greska2 != true && greska3 != true && greska4 != true && greska5 != true){
        $.ajax({
            url:"unesiUbazu2.php",
            method:"post",
            data: objekat,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?page=tables&table=price";

            }
        })
    }
    else console.log("greska")})

$("#updategender").click(function (){
    var gender = document.querySelector("#gender").value;
    var greska;
    var id = document.querySelector("#uzmiId").value;

    if(gender == null){
        greska = true
    }
    else greska=false

    var objekat = {
        "id":id,
        "tabelaIme": "gender",
        "gender":gender}

    if(!greska){
        $.ajax({
            url:"unesiUbazu2.php",
            method:"post",
            data: objekat,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?page=tables&table=gender";

            }
        })
    }
})

$("#updaterole").click(function (){
    var role = document.querySelector("#role").value;
    var greska;
    var id = document.querySelector("#uzmiId").value;
    if(role == null){
        greska = true
    }
    else greska=false

    var objekat = {
        "id":id,
        "tabelaIme": "role",
        "role":role}

    if(!greska){
        $.ajax({
            url:"unesiUbazu2.php",
            method:"post",
            data: objekat,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?page=tables&table=role";

            }
        })
    }
})

$("#updatemenu").click(function (){
    var name = document.querySelector("#name").value;
    var link = document.querySelector("#link").value;
    var greska1,greska2;
    var id = document.querySelector("#uzmiId").value;

    if(name == null){
        greska1 = true
    }
    else greska1=false

    if(link == null){
        greska2 = true
    }
    else greska2=false

    var objekat = {
        "id":id,
        "tabelaIme": "menu",
        "name":name,
        "link":link
    }

    if(greska1 == false && greska2 == false){
        $.ajax({
            url:"unesiUbazu2.php",
            method:"post",
            data: objekat,
            success:function(res){
                console.log(res);
                location.href = "indexA.php?page=tables&table=menu";
            }
        })
    }
})