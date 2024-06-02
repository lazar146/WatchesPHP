// $(document).on("click", ".moreB", function () {
//   var id = this.getAttribute("data-id");
//
//   $.ajax({
//     url: "models/ispisiSingle.php",
//     method: "post",
//     data: {
//       "Prodid": id
//     },
//     success: function (rezultat) {
//       // document.querySelector(".moreinf").innerHTML = rezultat;
//     },
//     error: function (xhr) {
//       console.log(xhr);
//     }
//   })
//
//
//
//   var modal3 = document.getElementById("myModal3");
//
//   var span = document.getElementsByClassName("close")[2];
//
//
//   modal3.style.display = "block";
//
//   span.onclick = function () {
//     modal3.style.display = "none";
//   }
// });
$(document).on("change", "#pol", function () {
  var cekirani = document.querySelectorAll("input[name='gender']:checked");
  var ids = [];

  for (let i of cekirani) {
    ids.push(i);
  }


  $.ajax({
    url: "models/filter.php",
    method: "post",
    data: {
      "ids": ids
    },
    success: function (rezultat) {
      dinProizvodi(rezultat);
    },
    error: function (xhr) {
      console.log(xhr);
    }
  })

})

if (Izbaci("kanta") == null) {
  Ubaci("kanta", []);
}
if (Izbaci("brendSaStrane") == null) {
  Ubaci("brendSaStrane", []);
}
$(".dodaj").click(dodajUKorpu);
$(document).on("click", "#dodaj", dodaj);
$(document).on("click", "#oduzmi", oduzmi);
$(document).on("click", "#reset", PraznaKanta);
$(document).on("click", "#cekciraj", bazaKorpa);
$(document).on("click", "#log", function () {

  Ubaci("kanta", []);
});
window.onload = function () {
  console.log(window.location.pathname);


  setTimeout(() => {
    $.ajax({
      url: "models/korpa.php",
      method: "get",
      success: function (rezultat) {

        localStorage.setItem("svi", rezultat);
       //console.log(rezultat);
      },
      error: function (xhr) {
        console.log(xhr);
      }
    })
  }, 2000);
}



  //forma

  var Greska = 0;

  let klik = document.querySelector("#dugme");

  if(klik){
    klik.addEventListener("click", forma);
  }



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
      provIme.nextElementSibling.classList.remove("sakrij");
      provIme.nextElementSibling.innerHTML = "The name is wrong. Example: Michael";
      provIme.classList.add("greska");
      Greska5 = true;
    }
    else {
      provIme.nextElementSibling.classList.add("sakrij");
      provIme.nextElementSibling.innerHTML = "";
      provIme.classList.remove("greska");
      Greska5 = false;
    }

    if (!regZaIme.test(provPrezime.value)) {
      provPrezime.nextElementSibling.classList.remove("sakrij");
      provPrezime.nextElementSibling.innerHTML = "The last name is wrong. Example: Dee Santa";
      provPrezime.classList.add("greska");
      Greska6 = true;
    }
    else {
      provPrezime.nextElementSibling.classList.add("sakrij");
      provPrezime.nextElementSibling.innerHTML = "";
      provPrezime.classList.remove("greska");
      Greska6 = false;
    }


    if (!regEmail.test(provEmail.value)) {
      provEmail.nextElementSibling.classList.remove("sakrij");
      provEmail.nextElementSibling.innerHTML = "The email is wrong. Example: example@gmail.com";
      provEmail.classList.add("greska");
      Greska7 = true;;
    }
    else {
      provEmail.nextElementSibling.classList.add("sakrij");
      provEmail.nextElementSibling.innerHTML = "";
      provEmail.classList.remove("greska");
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
      provRad[0].parentElement.parentElement.nextElementSibling.classList.remove("sakrij");
      provRad[0].parentElement.parentElement.nextElementSibling.innerHTML = "You need to check one";
      provRad[0].parentElement.parentElement.classList.add("greska");
      Greska2 = true;
    }
    else {
      provRad[0].parentElement.parentElement.nextElementSibling.classList.add("sakrij");
      provRad[0].parentElement.parentElement.nextElementSibling.classList.innerHTML = "";
      provRad[0].parentElement.parentElement.classList.remove("greska");
      Greska2 = false;
    }

    if (ch == "") {
      provCh[0].parentElement.parentElement.nextElementSibling.classList.remove("sakrij");
      provCh[0].parentElement.parentElement.nextElementSibling.innerHTML = "You need to check one";
      provCh[0].parentElement.parentElement.classList.add("greska");
      Greska3 = true;
    }
    else {
      provCh[0].parentElement.parentElement.nextElementSibling.classList.add("sakrij");
      provCh[0].parentElement.parentElement.nextElementSibling.classList.innerHTML = "";
      provCh[0].parentElement.parentElement.classList.remove("greska");
      Greska3 = false;
    }
    if (provText.value.length < 25) {
      provText.nextElementSibling.classList.remove("sakrij");
      provText.nextElementSibling.innerHTML = "You need atleast 25 characters to enter";
      provText.classList.add("greska");
      Greska4 = true;
    }
    else {
      provText.nextElementSibling.classList.add("sakrij");
      provText.nextElementSibling.innerHTML = "";
      provText.classList.remove("greska");
      Greska4 = false;
    }
    console.log(Greska)
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

        "ime": provIme,
        "prezime": provPrezime,
        "email": provEmail,
        "pol": radio,
        "type": string,
        "text": provText
      };




      $.ajax({
        url: "models/function.php",
        method: "post",
        data: objekat,
        success: function (rezultat) {
          console.log(rezultat);
        },
        error: function (xhr) {
          console.log(xhr);
        }
      })








      document.querySelector("#dugme").nextElementSibling.classList.remove("sakrij");
      document.querySelector("#dugme").nextElementSibling.innerHTML = "All good!";
      document.querySelector("#dugme").classList.add("greska");
      document.querySelector("#prijava").reset()







    }
    else {

      document.querySelector("#dugme").nextElementSibling.classList.add("sakrij");
      document.querySelector("#dugme").nextElementSibling.innerHTML = "";
    }

  }


  var zaPisi = document.querySelector("#pisi");


  if(zaPisi){

    zaPisi.addEventListener("keyup", function () {

      var vrednostp = document.querySelector("#pisi");
      var brojkaraktera = vrednostp.value;
      var sadduzinaje = brojkaraktera.length;

      console.log(brojkaraktera);


      if (sadduzinaje <= 200) {

        var smanji = 200 - sadduzinaje;
        document.querySelector("#brojkar").innerHTML = "Left characters to go:" + " " + smanji;
      }
      else {
        vrednostp.value = brojkaraktera.substring(0, 200);

      }
    });
  }







  $(document).on("click", ".buttonReg", function () {


    var firstName = document.querySelector("#RegIme");
    var lastName = document.querySelector("#RegPrezime");
    var Username = document.querySelector("#RegUsername");
    var Email = document.querySelector("#RegEmail");
    var password = document.querySelector("#RegPassword");
    var confirmPassword = document.querySelector("#RegConfPassword");

    let regZaIme = /^[A-ZŠĐŽĆČ][a-zšđžćč]{2,15}(\s[A-ZŠĐŽĆČ][a-zšđžćč]{2,15})?$/;
    let regPrezime = /^[A-ZŠĐŽĆČ][a-zšđžćč]{1,20}(\s[A-ZŠĐŽĆČ][a-zšđžćč]{1,20})?$/;
    let regEmail = /^[a-z][a-z0-9]+(\.)*[a-z0-9]+((\.)*[a-z0-9]+){0,2}\@(gmail\.com|yahoo\.com|outlook\.com|hotmail\.com)$/;
    let passwordRegex = /^[A-Za-z0-9]{6,}$/;
    let usernameRegex = /^[A-Za-z0-9]{4,}$/;

    var greska1, greska2, greska3, greska4, greska5, greska6
    if (!regZaIme.test(firstName.value)) {
      firstName.nextElementSibling.classList.remove("sakrij");
      firstName.nextElementSibling.innerHTML = "The name is wrong. Example: Michael";
      firstName.classList.add("greska");
      greska1 = true;
    }
    else {
      firstName.nextElementSibling.classList.add("sakrij");
      firstName.nextElementSibling.innerHTML = "";
      firstName.classList.remove("greska");
      greska1 = false;
    }

    if (!regPrezime.test(lastName.value)) {
      lastName.nextElementSibling.classList.remove("sakrij");
      lastName.nextElementSibling.innerHTML = "The last name is wrong. Example: Dee Santa";
      lastName.classList.add("greska");
      greska2 = true;
    }
    else {
      lastName.nextElementSibling.classList.add("sakrij");
      lastName.nextElementSibling.innerHTML = "";
      lastName.classList.remove("greska");
      greska2 = false;
    }

    if (!regEmail.test(Email.value)) {
      Email.nextElementSibling.classList.remove("sakrij");
      Email.nextElementSibling.innerHTML = "The email is wrong. Example: example@gmail.com";
      Email.classList.add("greska");
      greska3 = true;;
    }
    else {
      Email.nextElementSibling.classList.add("sakrij");
      Email.nextElementSibling.innerHTML = "";
      Email.classList.remove("greska");
      greska3 = false;
    }


    if (!usernameRegex.test(Username.value)) {
      Username.nextElementSibling.classList.remove("sakrij");
      Username.nextElementSibling.innerHTML = "The username is wrong. Example: Micah";
      Username.classList.add("greska");
      greska4 = true;;
    }
    else {
      Username.nextElementSibling.classList.add("sakrij");
      Username.nextElementSibling.innerHTML = "";
      Username.classList.remove("greska");
      greska4 = false;
    }

    if (!passwordRegex.test(password.value)) {
      password.nextElementSibling.classList.remove("sakrij");
      password.nextElementSibling.innerHTML = "The password is wrong. Use letters and numbers..";
      password.classList.add("greska");
      greska5 = true;;
    }
    else {
      password.nextElementSibling.classList.add("sakrij");
      password.nextElementSibling.innerHTML = "";
      password.classList.remove("greska");
      greska5 = false;
    }
    if (password.value != confirmPassword.value) {
      confirmPassword.nextElementSibling.classList.remove("sakrij");
      confirmPassword.nextElementSibling.innerHTML = "The password is not the same. Example: example@gmail.com";
      confirmPassword.classList.add("greska");
      greska6 = true;
    }
    else {
      confirmPassword.nextElementSibling.classList.add("sakrij");
      confirmPassword.nextElementSibling.innerHTML = "";
      confirmPassword.classList.remove("greska");
      greska6 = false;
    }


    if (greska1 == false && greska2 == false && greska3 == false && greska4 == false && greska5 == false && greska6 == false) {

      var firstNameV = document.querySelector("#RegIme").value;
      var lastNameV = document.querySelector("#RegPrezime").value;
      var UsernameV = document.querySelector("#RegUsername").value;
      var EmailV = document.querySelector("#RegEmail").value;
      var passwordV = document.querySelector("#RegPassword").value;

      var objekat1 = {

        "Regime": firstNameV,
        "Regprezime": lastNameV,
        "Regemail": EmailV,
        "Regusername": UsernameV,
        "Regpassword": passwordV

      };




      $.ajax({
        url: "models/function.php",
        method: "post",
        data: objekat1,
        success: function (rezultat) {
          console.log(rezultat);
          location.href = "index.php?page=login";
        },
        error: function (xhr) {
          console.log(xhr);
        }
      })



      document.querySelector(".buttonReg").nextElementSibling.classList.remove("sakrij");
      document.querySelector(".buttonReg").nextElementSibling.innerHTML = "All good!";
      document.querySelector(".buttonReg").classList.add("greska");
      document.querySelector("#reg").reset()

    }
    else {

      document.querySelector(".buttonReg").nextElementSibling.classList.add("sakrij");
      document.querySelector(".buttonReg").nextElementSibling.innerHTML = "";
    }
  })


  $(document).on("click", "#saljiAnketu", function () {

    var rad = document.getElementsByName("prvi");


    var cekrian1 = 0;

    for (let i of rad) {
      if (i.checked) {
        cekrian1 = i.value;
      }
    }


    console.log(cekrian1);

    var rad1 = document.getElementsByName("drugi");


    var cekrian2 = 0;

    for (let i of rad1) {
      if (i.checked) {
        cekrian2 = i.value;
      }
    }


    console.log(cekrian2);

    if (cekrian1 == 0 || cekrian2 == 0) {
      this.nextElementSibling.classList.remove("sakrij");
    }
    else {
      this.nextElementSibling.classList.add("sakrij");
      $.ajax({
        url: "models/zaAnketu.php",
        method: "post",
        data: {
          "pitanje1": cekrian1,
          "pitanje2": cekrian2,
          "dugme": true
        },
        success: function (rezultat) {
          document.querySelector("#poll").innerHTML = rezultat;
          console.log(rezultat);
        },
        error: function (xhr) {
          console.log(xhr);
        }
      })
    }

  })
var pogresno=0;
  $(document).on("click", "#LogButton", function () {

    var Email = document.querySelector("#LogEmail").value;
    var password = document.querySelector("#LogPassword").value;


    console.log(Email);
    console.log(password);

    $.ajax({
      url: "models/loginStranica.php",
      method: "post",
      data: {
        "LogEmail": Email,
        "LogPassword": password,
        "LogDugme": true
      },
      success: function (rezultat) {
        console.log(rezultat);
        location.href = "index.php";
        
      },
      error: function (xhr) {
        console.log(xhr);
        document.querySelector("#nema").innerHTML = "Password or Email are wrong";
        pogresno++;
        console.log(pogresno);
      }
    })

  })

  $(document).on("change", ".filter", filt);
  $(document).on("click", ".srcuj", filt);


  function filt() {
    var sortiraj = document.querySelector("#sortiraj").value;
    var search = document.querySelector("#srcovanje").value;
    var brendoviNiz = document.querySelectorAll("input[name='brands']:checked");
    var brendovi = [];
    var priceNiz = document.querySelectorAll("input[name='price']:checked");
    var price = [];


    for (let i of brendoviNiz) {
      brendovi.push(i.value);
    }
    for (let i of priceNiz) {
      price.push(i.value);
    }
var aktivna = $(".pagination .active").text()
    var objekat = {
      "sortiraj": sortiraj,
      "search": search,
      "brendovi": brendovi,
      "page":aktivna,
      "price": price
    }

    console.log(objekat);






    $.ajax({
      url: "models/filter.php",
      method: "post",
      data: objekat,
      success: function (rezultat) {
        console.log(rezultat);
        var proizvBr = JSON.parse(rezultat);
        dinProducts(proizvBr);
        paginacijaBroj(proizvBr[proizvBr.length-1].brojProizvoda,aktivna);
      },
      error: function (xhr) {
        console.log(xhr);
      }
    })
  }

function paginacijaBroj(br,aktivna){

  console.log(aktivna)
  let ispis = "";
  for(let i=1;i<=Math.ceil(br/3);i++) {
    if (i == aktivna) {
      console.log("if")
      ispis += `<li class="page-item active"><a class="page-link" href="#">${i}</a></li>`;
    } else{
      console.log("else")
      ispis += `<li class="page-item"><a class="page-link" href="#">${i}</a></li>`;
    }
  }
  console.log(ispis);
  $(".pagination").html(ispis);
  $(document).on("click",".page-link",function (){

    $(".pagination li ").each(function(){
      $(this).removeClass("active");
    })
    $(this).parent().addClass("active");

    filt();
  }
  )

}
  function dinProducts(linkovi) {


    console.log(linkovi);

    var ispis = "";

    if (linkovi.length == 0) {
      ispis = `<div class="col-md-12">
        <div class="boxes text-center">
                <h2 class="alert alert-danger">NO ITEMS</h2>
               </div>
       </div>`;

    }







    for(let obj=0;obj<linkovi.length-1;obj++) {



      ispis += `
                        <div class="col-lg-4 col-sm-6">
                        <div class="boxes">
                            <div class="inner_content clearfix">
                            <div class="kriga">
                                <div class="mask1">
                                    <a href='index.php?page=single&prodId=${linkovi[obj].productId}'><img src="${linkovi[obj].img}" alt="${linkovi[obj].Name}" class="w-100 zoom-img" /></a>
                                </div>
                                <div class="product_container">
                                <h4>${linkovi[obj].Name}</h4>
                                <h6>${linkovi[obj].Type}</h6>
                                <p>${linkovi[obj].naslov}</p>
                                <div class="price mount item_price fll">
                                    <p id="nova">${linkovi[obj].price}$</p>
                                    <del id="del"
                                    >${linkovi[obj].oldPrice == null ? "" : linkovi[obj].oldPrice + "$"}</del
                                    >
                                </div>
                                <div id="cent">
                                    <input
                                    type="button"
                                    id="modaliraj"
                                    class="button btn dodaj buttonShop"
                                    value="Add to cart"
                                    data-id="${linkovi[obj].productId}"
                                    />
                                   
                                </div>
                                </div>
                            </div>
                            </div>



                        
                            </div>
                        </div>
                        </div>`;




    }

    // console.log(ispis);
    document.querySelector("#dinProizvodi").innerHTML = ispis;
    $(".dodaj").click(dodajUKorpu);
  }




  prikazi();


function bazaKorpa() {
  var produkt = localStorage.getItem("kanta");


  $.ajax({
    url: "models/kanta.php",
    method: "post",
    data: {
      "kanta": produkt,
      "potvrdaPorudzbine": true
    },
    success: function (rezultat) {
      modal3.style.display = "block";
      document.querySelector("#isp").innerHTML = rezultat;
      span.onclick = function () {
        modal3.style.display = "none";
        PraznaKanta();
      }
    },
    error: function (xhr) {

      modal3.style.display = "block";
      document.querySelector("#isp").innerHTML = "You need to log in first";
      span.onclick = function () {
        modal3.style.display = "none";
        window.location.href = "index.php?page=login";
      }

    }
  })

  var modal3 = document.getElementById("myModal3");

  var span = document.getElementsByClassName("close")[0];



}
function prikazi() {
  let produkti = Izbaci("kanta");

  console.log(produkti);
  if (produkti.length == 0) {
    PraznaKanta();

  }
  else {
    pisi();
  }
}
function PraznaKanta() {
  $("#prazna").html(`<p id="emptyP">Your cart is empty, go and shop!</p><br><a href="index.php?page=shop"><input type="button" class="emptyB" value="Shop"></a>`);
  $("#prikazuj").html("");

  if(document.querySelector("#total")){
    document.querySelector("#total").innerHTML = "";
  }

  if(document.querySelector("#reset")){
    document.querySelector("#reset").classList.add("sakrij");  }

  if(document.querySelector("#cekciraj")){
    document.querySelector("#cekciraj").classList.add("sakrij");
  }

  Ubaci("kanta", []);

}

function pisi() {
  console.log("usao u pisi");
  let svi = Izbaci("svi");
  let uKanti = Izbaci("kanta");


  console.log("AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA");

  console.log(svi);
  let ispis = `<table class="tabela">
  <thead>
      <tr id="trGore">
          <th id="tdBoja" class="slika">Picture</th>
          <th id="tdBoja">Product Name</th>
          <th id="tdBoja">Quantity</th>
          <th id="price">Price</th>
          <th id="tdBoja">Remove</th>
      </tr>
  </thead>
  <tbody>`;
  let total = 0;

  for (let p of svi) {
    for (let k of uKanti) {
      if (p.productId == k.id) {

        total += p.price * k.quantity;
        ispis +=
          `<tr class="rem1">
      <td class="invert-image tdDoleSlika">        
              <img src="${p.img}" style='height:130px' alt="${p.Name}" class="img-responsive tdDoleSlikaC">
      </td>
      <td class="invert tdDole">${p.Name}</td>
      
      <td class="invert tdDoleQ"><input type="button" class="korpaButtonDO" data-id="${p.productId}" id="oduzmi" value="-"> <p id="qan">  ${k.quantity} </p>   <input type="button" class="korpaButtonDO"  data-id="${p.productId}" id="dodaj" value="+"></td>
      <td class="invert tdDoleP">${p.price * k.quantity}$</td>
      <td class="invert tdDole">
          <div class="rem">
              <input type="button" class='btn-remove korpaButton' value="Remove" data-id='${p.productId}'>
          </div>
      </td>
  </tr>`;

      }
    }
  }


  var zaTotal = document.querySelector("#total");


  if(zaTotal){
    document.querySelector("#total").innerHTML = "<span id='totalp'>Total price is:</span>" + " " + total + "$";



  }



  ispis += `    </tbody>
  </table>`;

  $("#prikazuj").html(ispis);
  $(".btn-remove").click(removeFromCart);
  ;
}
function dodajUKorpu() {






  let brojProizvoda = 0;



  let kanta = Izbaci("kanta");
  console.log(kanta);


  for (let k of kanta) {

    if (k.id == this.getAttribute("data-id")) {
      brojProizvoda++;
    }
  }
  if (brojProizvoda > 0) {
    var modal2 = document.getElementById("myModal2");

    var span = document.getElementsByClassName("close")[1];


    modal2.style.display = "block";

    span.onclick = function () {
      modal2.style.display = "none";
    }

  }
  else {
    var modal = document.getElementById("myModal");

    var span = document.getElementsByClassName("close")[0];


    modal.style.display = "block";

    span.onclick = function () {
      modal.style.display = "none";
    }





    kanta.push({ "id": this.getAttribute("data-id"), "quantity": 1 });
    Ubaci("kanta", kanta);

  }
}
function dodaj() {
  var izKante = Izbaci("kanta");
  var quantity = this.parentElement.children[1].innerHTML;
  quantity = parseInt(quantity);
  quantity++;
  this.parentElement.children[1].innerHTML = quantity;
  let niz = [];

  izKante.forEach(i => {
    if (i.id == this.getAttribute("data-id")) {
      i.quantity = quantity;
      niz.push(i);
    }
    else {
      niz.push(i);
    }
    Ubaci("kanta", niz);

  })
  pisi();
}
function oduzmi() {
  var izKante = Izbaci("kanta");
  var quantity = this.parentElement.children[1].innerHTML;
  quantity = parseInt(quantity);
  let niz = [];
  if (quantity > 1) {
    quantity--;
    this.parentElement.children[1].innerHTML = quantity
    izKante.forEach(i => {
      if (i.id == this.getAttribute("data-id")) {
        i.quantity = quantity;
        niz.push(i);
      }
      else {
        niz.push(i);
      }
      Ubaci("kanta", niz);

    })
    pisi();

  }



}
function removeFromCart() {
  let idP = $(this).data("id");

  let uKanti = Izbaci("kanta");
  let izbaceni = uKanti.filter(el => el.id != idP);

  if (izbaceni.length == 0) {
    Ubaci("kanta", []);
  }
  else {
    Ubaci("kanta", izbaceni);
    var manje = Izbaci("brojProizvoda");
    manje = manje - 1;

    Ubaci("brojProizvoda", manje);
  }

  prikazi();
}


function Ubaci(name, value) {
  localStorage.setItem(name, JSON.stringify(value));
}
function Izbaci(name) {


  return JSON.parse(localStorage.getItem(name));
}
$("#news").on("click", function () {


  var provEmaill = document.querySelector("#prov");
  console.log(provEmaill);
  let greska = 0;
  var email = provEmaill.value;
  let regEmail = /^[a-z](([a-z])?([0-9])?){1,13}@(gmail|hotmail)\.com$/;
  if (!regEmail.test(provEmaill.value)) {
    provEmaill.nextElementSibling.nextElementSibling.classList.remove("sakrij");
    provEmaill.nextElementSibling.nextElementSibling.innerHTML = "The email is wrong. Example: example@gmail.com";
    provEmaill.classList.add("greska");
    greska++;
  }
  else {
    provEmaill.nextElementSibling.nextElementSibling.classList.remove("sakrij");
    provEmaill.nextElementSibling.nextElementSibling.innerHTML = "Sent!";
    provEmaill.classList.remove("greska");

    document.querySelector("#newsF").reset();
    document.querySelector("#d").classList.add("dobar");
  }
  console.log(greska);



  console.log(email);
  if (greska == 0) {
    console.log("ssss ");
    $.ajax({
      url: "models/newsletter.php",
      method: "post",
      data: {
        "emailN": email,
        "dugmeN": true
      },
      success: function (rezultat) {
        provEmaill.nextElementSibling.nextElementSibling.innerHTML = "Sent!";

        console.log(rezultat);
      },
      error: function (xhr) {
        console.log(xhr);
      }
    })
  }
})

$(".page-link").on("click", function () {
   $(".pagination li ").each(function(){
     $(this).removeClass("active");
   })
  $(this).parent().addClass("active");

   filt();
})

$("#infoP").click(function (){
  let polje = this.nextElementSibling;

  if(polje.style.display === "none"){
    polje.style.display = "block";
  }
  else{
    polje.style.display = "none";
  }
})

