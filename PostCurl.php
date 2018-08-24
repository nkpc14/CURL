<?php

    $data   = array("name"=>"john", "age"=>31);
    $string = http_build_query($data);
    
    $ch = curl_init("http://localhost/tutorial/data.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFILEDS, $string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_exec($ch);
    curl_close($ch);

    


    /*
     *
     * FOR REGULAR EXPRESSION => REGEX