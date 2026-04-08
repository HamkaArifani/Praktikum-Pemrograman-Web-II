<?php
$celcius = 37.841;
function celciusConverter($celcius){
    $fahrenheit = $celcius * 9/5 +32;
    $kelvin = $celcius + 273.15;
    $reamur = $celcius * 4/5;
    echo "Fahrenheit (F) = $fahrenheit <br>";
    echo "Reamur (R) = $reamur <br>";
    echo "Kelvin (K) = $kelvin <br>";
}
celciusConverter($celcius);
?>