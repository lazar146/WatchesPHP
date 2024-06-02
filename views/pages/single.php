<?php
if(isset($_GET["prodId"])){

    $produkt = $_GET["prodId"];

    $upit = "SELECT p.productId, p.Name,p.img,pr.price,pr.oldPrice,g.Type,b.naslov,s.DisplayType,s.CaseMaterial,s.CaseType,s.WaterResistance,s.ItemWeight
    FROM product p inner join price pr ON p.productId=pr.productId inner join gender g ON p.genderId=g.genderId inner join brands b ON p.brandId=b.brandId 
    inner join specification s ON p.productId=s.productId where p.productId = $produkt";



    $rez = $konekcija->query($upit);

    $rezultat = $rez->fetch();





?>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>


    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>You added product to cart</p>
        </div>
    </div>

    <div id="myModal2" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>You already have this product in the cart</p>
        </div>
    </div>

    <div id="myModal3" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="moreinf">
            </div>
        </div>
    </div>


    <div class="men">
   	<div class="container">
      <div class="col-md-12 single_top">
      	<div class="single_left">
      	  <div class="labout span_1_of_a1">
			<div class="flexslider">
					 <ul class="slides" id="skloniTacku">
						<li data-thumb="">
							<img src="<?=  $rezultat["img"]; ?>" />
						</li>
<!--						<li data-thumb="images/s2.jpg">-->
<!--							<img src="images/s2.jpg" />-->
<!--						</li>-->
<!--						<li data-thumb="images/s3.jpg">-->
<!--							<img src="images/s3.jpg" />-->
<!--						</li>-->
<!--						<li data-thumb="images/s4.jpg">-->
<!--							<img src="images/s4.jpg" />-->
<!--						</li>-->
					 </ul>
				  </div>
		          <div class="clearfix"></div>	
	    </div>
		<div class="cont1 span_2_of_a1">
				<h1><?=  $rezultat["Name"];
                    ?></h1>
			    <div class="price_single">
				  <span class="reducedfrom"><?=  $rezultat["oldPrice"]==null ? "" : $rezultat["oldPrice"]."$"; ?></span>
				  <span class="amount item_price actual"><?=  $rezultat["price"]; ?>$</span>
				</div>
            <div class="sap_tabs">
                <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">

                    <button id="infoP" style="width: auto;margin-bottom: 2%" class="buttonShop">Product Info</button>



                    <table style="display: none;margin-top: 5%;margin-bottom: 5%">
                        <tr>
                            <th>Display Type</th>
                            <th>Case Type</th>
                            <th>Water Resistance</th>
                            <th>Case Material</th>
                            <th>Item Weight</th>
                        </tr>
                        <tr>
                            <td><?=  $rezultat["DisplayType"]; ?></td>
                            <td><?=  $rezultat["CaseType"]; ?></td>
                            <td><?=  $rezultat["WaterResistance"]; ?></td>
                            <td><?=  $rezultat["CaseMaterial"]; ?></td>
                            <td><?=  $rezultat["ItemWeight"]; ?></td>
                        </tr>
                    </table>


                </div>
            </div>


            <input
                    type='button'
                    id='modaliraj'
                    class='button btn dodaj buttonShop'
                    value='Add to cart'
                    data-id=<?=  $rezultat["productId"];
                    ?>
            />			</div>
		    <div class="clearfix"> </div>
		</div>
		  </div>
		</div>
     <div class="clearfix"> </div>


   </div>
<?php
}
    ?>