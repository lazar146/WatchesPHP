<?php
session_start();
?>
<?php

include "models/function.php";
?>


<?php

include "views/fixed/head.php";


if(isset($_GET['page'])){
    switch($_GET['page']){
        case 'main':
            include "views/pages/main.php";
            break;
        case 'shop':
            include "views/pages/shop.php";
            break;
        case 'about':
            include "views/pages/about.php";
            break;
        case 'brands':
            include "views/pages/brands.php";
            break;
        case 'contact':
            include "views/pages/contact.php";
            break;
        case 'checkout':
            include "views/pages/checkout.php";
            break;
        case 'login':
            include "views/pages/login.php";
            break;
        case 'profil':
            include "views/pages/profil.php";
            break;

        case 'anketa':
            include "views/pages/anketa.php";
            break;
        case 'register':
            include "views/pages/register.php";
            break;
        case 'single':
            include "views/pages/single.php";
            break;
        case 'profile':
            include "views/pages/profile.php";
            break;










    }

}
else{
    include "views/pages/main.php";
}




include "views/fixed/footer.php";
?>

