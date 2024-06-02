
<?php





    if(isset($_SESSION["user"])){
?>




<div id="poll">
        <h1>Poll</h1>

        <div id="anketa">
        
        <?php 
        
        pitanja(1,"prvi");
        
        ?>
           <?php 
        
        pitanja(2,"drugi");
        
        ?>  
        </div>
    <input type="button" class="anketaButton" value="submit" id="saljiAnketu">
    <p class="sakrij">You need to check both questions</p>
</div>

<?php
    }

    else{
    ?>
        <div id="poll">
        <h1>You need to log in to fill up a poll</h1>

        </div>

        <?php
    }


?>