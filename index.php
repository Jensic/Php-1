<?php include "inl1_header.php"; ?> <!-- inkluderar header.php, functions.php och products.php till denna sida -->
<?php include "inl1_functions.php"; ?>
<?php include "inl1_products.php" ?>
<?php include "inl1_meny.php" ?>
       <main class="centrering">
            <div class="flexcontainer"><p><?php echo todaysDate(); ?></p></div><!-- .flexcontainer, anropar todaysdate() funktionen som skriver ut datum -->
            <div class="huvudinnehall">
               <div class="flexcontainer"><p><?php specialOffer(); ?></p></div><!-- .flexcontainer, anropar specialOffer funktionen.--> 
                <form class="fruitform" method="post" action="inl1_tack.php"> <!-- formulär som med action skickar informationen till inl1_tack.php -->
                    <table class="products">
                       <caption>Köp lite frukt!</caption>
                        <thead>
                            <tr>
                                <th>Frukt</th>
                                <th>Pris/st</th>
                                <th>Vikt/st</th>
                                <th>Antal</th>
                            </tr>        
                        </thead>
                        <tbody>
                        <?php 
                            for($i = 0; $i<count($products); $i++) { // loopar igenom $products arrayen och skriver ut innehållet i en tabell, count räknar hur stor arrayen är
                        ?>
                                <tr>
                                   <td><?php echo $products[$i][0]; ?></td>
                                   <td><?php echo $products[$i][1]; ?> kr</td>
                                   <td><?php echo $products[$i][2]; ?> kg</td>
                                   <td><input type="number" name="p-<?php echo $i; ?>"></td> 
                                </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table><!-- .products -->
                    <div class="flexcontainer2">
                        <input type="submit" value="beställ" name="submit">
                    </div><!-- .flexcontainer2 -->
                    <div class="products2">    
                        <div>
                            <label for="name">Namn:</label>
                            <input type="text" id="name" name="user_name">
                        </div>
                        <div>
                            <label for="name">Adress:</label>
                            <input type="text" id="address" name="user_address">
                        </div>
                        <div>
                            <label for="tel">Tfn:</label>
                            <input type="tel" id="tel" name="user_tel">
                        </div>
                        <div>
                            <label for="mail">E-post:</label>
                            <input type="email" id="mail" name="user_mail">
                        </div>
                    </div><!-- .products2 -->

                </form><!-- .fruitform -->
           </div><!-- .huvudinnehall -->
        </main><!-- .centrering -->
<?php include "inl1_footer.php"; ?> <!-- inkluderar inl1_footer.php i denna sida -->