<?php

function cleanDump($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function cleanUpInput($userinput){
    $input = trim($userinput);
    $cleaninput = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    return $cleaninput;
}

function cleanUpOutput($useroutput){
    $output = trim($useroutput);
    $cleanoutput = htmlspecialchars($output);
    return $cleanoutput;
}