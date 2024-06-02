
<?php
$file=file("../data/log.txt");
$currentDateTime = time();
$previousDateTime = $currentDateTime - (24 * 60 * 60);
$visits = 0;
$users=0;
$visit=array();
foreach ($file as  $i) {
    $kor=explode("\t",$i);
    $dt = DateTime::createFromFormat('d. m. Y. H:i:s',$kor[1]);
    if($dt instanceof DateTime){
        $timestamp=$dt->getTimestamp();
        if ($timestamp >= $previousDateTime &&$timestamp<=$currentDateTime){
            $page=$kor[0];
            if(isset($visit[$page])){
                $visit[$page]++;
            }
            else{
                $visit[$page]=1;
            }

        }
    }

}
$dokument2=file("../data/evidencija.txt");


$danasnjiDatum=date("d.m.Y.");



?>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    td{
        color: #F2B33F;
    }
    th {
        background-color: #4F52BA;
        color: #fff;
    }



    tr:hover {
        background-color: #4F52BA;
    }

    td:nth-child(3),
    td:nth-child(4) {
        text-align: center;
    }

    td:nth-child(3) {
        color: #e0e0e0;
        font-weight: bold;
    }
</style>



<div id="page-wrapper">
    <div class="col-lg-12">
        <div class="stats-left" style="width: 100%;">
            <h5>24h</h5>
            <h4>Visits</h4>
            <table>

                <thead>

                <th scope="row">Num
                <td style="color: white">Page</td>
                <td style="color: white">Visits</td>
                <td style="color: white">Percent</td>
                </th>

                </thead>
                 <?php
                $total_visits=array_sum($visit);
                $brojac=0;
                foreach($visit as $page=>$visits):
                    $brojac++;
                    $percentage=($visits/$total_visits)*100;
                    ?>
                    <tbody>
                    <tr>
                        <th scope="row"><?=$brojac?></th>
                        <td><?=$page?></td>
                        <td><?=$visits?></td>
                        <td><?=round($percentage,2)?>%</td>

                    </tr>
                    </tbody>
                <?php endforeach;?>


            </table>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="stats-left" style="width: 100%;">
            <h5><?=$danasnjiDatum?></h5>
            <h4>Logins</h4>
            <table>

                <thead>

                <th scope="row">Num
                <td style="color: white">Account</td>
                <td style="color: white">Time</td>

                </th>

                </thead>
                <?php

                $brojac=0;
                foreach($dokument2 as $i):

                    $brojac++;
                    list($email,$datum,$vreme) = explode(" ",$i);
                    if($datum == $danasnjiDatum){
                    ?>
                    <tbody>
                    <tr>
                        <th scope="row"><?=$brojac?></th>
                        <td><?=$email?></td>
                        <td><?=$vreme?></td>


                    </tr>
                    </tbody>
                <?php }endforeach;?>


            </table>
        </div>
    </div>
</div>
