<?php
$imeBaze = "id20857701_bazawatchesphp";
$userName = "id20857701_watches";
$password = "phpWatches2023!";
$localhost = "localhost";


try
{
   $url=$_SERVER['REQUEST_URI'];
    $time=date("d. m. Y. h:i:s");
    $ip=$_SERVER['REMOTE_ADDR'];
    $samoUrl = "index.php?page";
    if(strpos($url,$samoUrl)){
        if(!strpos($url,"&msg")){
            $query=parse_url($url,PHP_URL_QUERY);
            parse_str($query,$params);
            $page=basename($params['page']);
            $page=ucfirst($page);
            $unesi="$page\t$time\t$ip\n";
            $file=fopen("data/log.txt","a");
            $upisiFajl=fwrite($file,$unesi);
            if($upisiFajl){
                fclose($file);
            }
        }

    }
    $konekcija = new PDO("mysql:host=$localhost;dbname=$imeBaze",$userName,$password);
    $konekcija -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$konekcija -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    
}

catch(PDOException $e){
echo "greska je" . $e->getMessage();


}

?>