<?php

$curl = curl_init() //$curl is going to be data type curl resource

$search_string = "pc video game 2016";
$url = "https://www.amazon.com/s/filed-keywords=$search_string";

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //this is for gaining access to HTTPS access
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //stores the webpage in a variable


$result = curl_exec($curl);

/*
 * Searching for images match 
 * regular expression for space [^\s]*?
 * providing the webpage $result
 * storing in the $matches
*/
preg_match_all("!https://images-na.ssl-images-amazon.com/images/I/[^\s]*?._AC_US160_.jpg!", $result , $matches);

//array_vaule is just for sequential indexing 
$images = array_values(array_unique($matches[0])); //to get the unique images no duplicates

for ($i = 0 ; $i <count($images); $i++){
    echo "<div style='float:left;margin:10 0 0 0;'>";
    echo "<img src='$images[$i]'><br>";
    echo "</div>";
}

print_r($matches);

curl_close();