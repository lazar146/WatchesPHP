<?php
session_start();
if(isset($_SESSION['user'])&& $_SESSION['user']['roleId'] == 1) {
include "side.php";
include "head.php";
include "../models/connection.php";

	if(isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'dashboard':
                include "dashboard.php";
                break;
            case 'tables':
                include "tables.php";
                break;
            case 'updateStranica':
                include "updateStranica.php";
                break;
            case 'inputStranica':
                include "inputStranica.php";
                break;

        }
    }


include "footer.php";
}
else{
?>
<h1>Only for admins</h1>
<?php } ?>
</html>