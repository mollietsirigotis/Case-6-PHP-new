<?php

declare(strict_types=1);

// en funktion som gör print_r ännu enklare att läsa...

/*
* print_r2 prtins human readable format even better then print_r
*
* @param mixed $variable
* @return void
*/
function print_r2(mixed $variable): void {
    echo "<pre>";
    print_r($variable);
    echo "</pre>";
}

// uppgift: skapa en funktion som skriver ut copyright för en sida
// kanske ska olika sidor ha olika upphovspersoner
// - alltså en variabel för vem som har copyright
// ofta vill man ha årtal med... använd php metoden date("Y") för att få ut aktuellt årtal

function get_copyright(string $author): string {
    $str = "&copy; $author";

    return $str;
    
}

/**
 * print_copyright skriv ut vem som har copyright
 * 
 * @param mixed $author
 * @return void
 */


function print_copyright(string $author): void {
    $year = date("Y");
    $str = "&copy; 2015 - $year $author";
    echo $str;
}




















?>