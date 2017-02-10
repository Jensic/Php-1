<?php
        include "inl1_header.php"; // inkluderar inl1_header.php och de andra på sidan
        include "inl1_products.php";
        include "inl1_functions.php";
        include "inl1_meny.php";

        //echo "<pre>"; var_dump($_POST); echo "</pre>"; // kan användas för att skriva ut vad $_POST innehåller.
        ?>
        <div class="flexcontainer"><p><?php echo todaysDate(); ?></p></div>
        <?php // skriver ut dagens datum från todaysDate funktionen som finns i inl1_functions.php
        
        if($_POST["user_tel"] == "") { // kollar om user_tel är tomt och meddelar det och avbryter möjligheten att fortsätta.
        echo "<p>Kära kund du måste fylla i ett telefonnummer!</p>";
        exit; 
        }

        $totalpris = 0; // deklarerar variablerna $totalpris och $totalweight, och dom får värdet 0
        $totalweight = 0;
        
        /* en for loop som går igenom $products arrayen och lagrar antal producter som finns i $_POST(antalet som fyllts i beställningen) on antal är 0 går man bara vidare till tacksidan */

        for($i = 0; $i<count($products); $i++) {
            $antal = $_POST["p-".$i];
            
            if($antal <=0) {
                continue;
            }
            
            $pris = checkPrice($products[$i][1] ); // variabeln $pris får sitt värde från functionen checkPrice, checkprice får in värden från $products arrayen "prisfack" varje gång den loopas.
            $namn = $products[$i][0];// $namn variabeln får namnen från $products arrayen varje gång den loopas
            $weight = $products[$i][2];// $weight variabeln får vikten från $products arrayen för varje loop.
            
            $totalpris_produkt = $antal * $pris; // variabeln $totalpris_produkt får sitt värde från att variablarna $antal och $pris multipliceras varje loop.
            $totalweight_produkt = $antal * $weight;// variabeln $totalweight_produkts värde skapas från att $antal och $weight multipliceras varje loop. 
            
            ?>
            <div class="flexcontainer3">
            <?php
            /* innehållet i variablarna $namn, $pris ,$antal, $totalpris_produkt och $total_weight skrivs ut på skärmen. Man får ett meddeland om hur mycket man köpt, vad det väger, pris osv */
            echo $namn . " kostar " . $pris . " kr. Du beställde " . $antal . " st av den frukten. Det blir " . $totalpris_produkt .  " kr och väger " . $totalweight_produkt . " kg <br>";
            ?>
            </div>
            <?php
            
            $totalpris += $totalpris_produkt; // variabeln $totalpris och $totalpris_produkt adderas
            $totalweight += $totalweight_produkt;// variabeln $totalweight och $totalweight_produkt adderas
        }
?>
<div class="flexcontainer">
<?php
deliveryMessage($totalpris); // functionen deliveryMessage skrivs ut på skärmen, echo finns i inl1_functions.php
?>
</div>
<div class="flexcontainer">
<?php
echo "Det väger totalt " . $totalweight . " kg."; // den totala vikten från variabeln $totalweight skrivs ut
?>
</div>
<?php            
            
include "inl1_footer.php"; // inl1_footer.php inkluderas i sidan.
?>
