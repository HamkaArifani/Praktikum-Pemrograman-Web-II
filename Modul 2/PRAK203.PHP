<!DOCTYPE HTML>
<html>
    <head>
        <title>Soal 3 Modul 2</title>
    </head>

    <body>
        <form method="POST">
            Nilai: <input type="text" name = "Value" value="<?php echo isset($_POST['Value'])? $_POST['Value'] : "" ?>"><br>
            <label for="FromDegree">Dari:</label><br>
            <input type="radio" id="Celcius1" name="FromDegree" value="Celcius">
            <label for="Celcius1">Celcius</label><br>
            <input type="radio" id="Fahrenheit1" name="FromDegree" value="Fahrenheit">
            <label for="Fahrenheit1">Fahrenheit</label><br>
            <input type="radio" id="Rheamur1" name="FromDegree" value="Rheamur">
            <label for="Rheamur1">Rheamur</label><br>
            <input type="radio" id="Kelvin1" name="FromDegree" value="Kelvin">
            <label for="Kelvin1">Kelvin</label><br>

            <label for="ToDegree">Ke:</label><br>
            <input type="radio" id="Celcius2" name="ToDegree" value="Celcius">
            <label for="Celcius2">Celcius</label><br>
            <input type="radio" id="Fahrenheit2" name="ToDegree" value="Fahrenheit">
            <label for="Fahrenheit2">Fahrenheit</label><br>
            <input type="radio" id="Rheamur2" name="ToDegree" value="Rheamur">
            <label for="Rheamur2">Rheamur</label><br>
            <input type="radio" id="Kelvin1" name="ToDegree" value="Kelvin">
            <label for="Kelvin2">Kelvin</label><br>
            <input type="submit" name="Submition" value="Konversi">
        </form>
    </body>
</html>
<?php
if(isset($_POST['Submition'])){
    $Value = $_POST['Value'];
    $From = $_POST['FromDegree'];
    $To = $_POST['ToDegree'];

    if (!is_numeric($Value)){
        echo "Error, harap berikan input berupa angka!";
    }
    else {
        echo "<h2>Hasil Konversi: ". tempConverter($Value, $From, $To). "</h2>";
    }   
}
function toCelcius ($Value, $From){
    switch("$From"){
        case "Celcius":
            return $Value;
        case "Fahrenheit":
            return ($Value-32)* 5/9;
        case "Rheamur":
            return $Value * 5/4;
        case "Kelvin":
            return $Value - 273.15;  
    }
}
function toFinalDegree ($Value, $To){
    switch($To){
        case "Celcius":
            return $Value ." &deg;C";
        case "Fahrenheit":
            return $Value * 9/5 + 32 . " &deg;F";
        case "Rheamur":
            return $Value * 4/5 . " &deg;R";
        case "Kelvin":
            return $Value + 273.15 . " &deg;K";
    }
}
function tempConverter ($Value, $From, $To){
    $Temp=toCelcius($Value, $From);
    $FinalTemp= toFinalDegree($Temp, $To);
    return $FinalTemp;
}
?>

