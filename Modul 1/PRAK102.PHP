<?php
$height =5.4;
$length = 8.9;
$side = 7.9;

function prismaVolume($height, $length, $side){
    $basearea = 0.5*$length*$side;
    $prismavolume = $basearea * $height;
    return "$prismavolume";
}
echo "Volume dari prisma beralas segitiga adalah: ";
echo number_format(prismaVolume($height, $length, $side), 3, '.', '') . " cm3 <br>";
?>