<?php
$celcius = 37.841;
function fahrenheitConverter($celcius){
    $fahrenheit = $celcius * 9/5 +32;
    return $fahrenheit;
}
function kelvinConverter($celcius){
    $kelvin = $celcius + 273.15;
    return $kelvin;
}
function reamurConverter($celcius){
    $reamur = $celcius * 4/5;
    return $reamur;
}
echo "Fahrenheit (F) = ". number_format(fahrenheitConverter($celcius), 4, ',', '.' ) . "<br>";
echo "Reamur (R) = ". number_format(reamurConverter($celcius), 4, ',', '.' ) . "<br>";
echo "Kelvin (K) = ". number_format(kelvinConverter($celcius), 4, ',', '.' ) . "<br>";
?>