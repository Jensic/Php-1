<?php
/* en funktion som returnerar dagens datum och skriver ut det på svenska
strftime formaterar lokal tid och datum beroende på vad setLocale har ställts in på*/
function todaysDate()  {
    setlocale(LC_TIME, 'sv_SE', 'sweden', 'swedish');
    return strftime('%A den %d %B %Y');// utf8_encode(), ger ö i söndag med lägger till konstiga tecken.

}
/* variabeln $totalpris från tacksidan tas in i functionen som kontrollerar om det är en jämn måndag och isåfall drar av 10kr på priset och meddelar att beställningen levereras nästa dag, den kollar sen om det är en udda onsdag och om det stämmer kostar ordern 20kr mer och levereras innom 2 dagar, sen kollas om det är en jämn vecka och torsdag, stämmer det så kommer beställningen om en vecka, slutligen kollas om det är en udda vecka och söndag, då får man beställningen inom 5 timmar, om inget av dessa stämmer skrivs $totalpriset ut orörd */
function deliveryMessage ($totalpris) {
    if(date("N")%2 == 0
        && date("N") == 1) {
    $totalpris -=10;
    echo "<p>Du får 10kr rabatt på beställningen. Slutpriset blir $totalpris kr.</p>";

    echo "<p>Din beställning levereras redan imorgon, " , date("Y-m-d", strtotime("+1 day")) . "</p>";
    }elseif(date("N")%2 == 1 
           && date("N") == 3) {
        $totalpris +=20;
        echo"<p>Idag kostar det 20kr extra. Slutpris blir $totalpris kr.</p>";
        
        echo "<p>Din beställning levereras om 2 dagar, " , date("Y-m-d", strtotime("+2day")) . "</p>";
    } elseif(date("W")%2 == 0 
            && date("N") == 4) {
        echo"<p>Slutpris blir $totalpris kr.</p>";
        
        echo "<p>Din beställning levereras om 1 vecka, " , date("Y-m-d", strtotime("+7day")) . "</p>";
    } elseif(date("W")%2 == 1 
            && date("N") == 7) {
        echo"<p>Slutpris blir $totalpris kr.</p>";
        
        echo "<p>Din beställning levereras om 5 timmar, kl: " , date("G:i", strtotime("+5hour")) . "</p>";
    } else {
       echo "Det blir totalt $totalpris kr."; 
    }
}
/* variabeln $price får pris från for loopen på tacksidan sedan matas den in i funktionen och den funktionen kollar om det är måndag och isåfall halverar priset, 'r det onsdag är priset 110%, annars om det är fredag och priset är över 20kr så dras 1kr av på summan. sedan kollas om det är ojämnt datum på en jämn vecka och om klockan är mellan 13:00 och 17:00 isåfall fås 5% rabbat. Sedan returneras $price variabeln ur funktionen. */
function checkPrice($price) {
    if(date("N") == 1) {
        $price *= 0.5;
    } elseif(date("N") == 5 && $price > 20) {
        $price--;
    } elseif(date("N") == 3) {
        $price *= 1.1;
    }
    if(date("N")%2 == 1
        && date("W")%2 == 0
        && date("G") > 13
        && date("G") < 17) {
        $price *= 0.95;
    }
    return $price;
}

// kollar om det är ojämt datum och jämn vecka och om klockan är mellan 13:00 och 17:00, då meddelas att beställningen kan fås redan nästa dag och med 5% rabatt.
function specialOffer () {
    if(date("N")%2 == 1
        && date("W")%2 == 0 
        && date("G") > 13 
        && date("G") < 17) { 
        echo "<p>Du kan få dina frukter redan imorgon! Och du får 5% rabatt!</p>";
    } 
}









