<!DOCTYPE HTML>
<html>
    <head>
        <title>Soal 4 Modul 2</title>
    </head>

    <body>
        <form method="POST">
            Nilai: <input type="text" name = "Value" value="<?php echo isset($_POST['Value'])? $_POST['Value'] : "" ?> "><br>
            <input type="submit" name="Submition" value="Konversi">
        </form>
    </body>
</html>
<?php
if (isset($_POST['Submition'])){
    $Value = $_POST['Value'];

    if (is_numeric($Value)){
         echo converter($Value);
    }
    else {
        echo "<h2><b>Harap Masukkan Input Kembali</b></h2>";
    }
}
function converter ($Value) {
    switch(true){
         case ($Value == 0):
            $Result = "Nol";
            return "<h2><b>Hasil: ". $Result. "</b></h2>";
        case ($Value >=1 && $Value <= 9):
            $Result = "Satuan";
            return "<h2><b>Hasil: ". $Result. "</b></h2>";
        case ($Value >= 11 && $Value<= 19):
            $Result = "Belasan";
            return "<h2><b>Hasil: ". $Result. "</b></h2>";
        case ($Value % 10 == 0 && $Value < 100 or $Value >= 20 && $Value <= 99):
            $Result = "Puluhan";
            return "<h2><b>Hasil: ". $Result. "</b></h2>";
         case ($Value >=100 && $Value <= 999):
            $Result = "Ratusan";
            return "<h2><b>Hasil: ". $Result. "</b></h2>"; 
        default:
            $Result = "Anda Menginput Melebihi Limit Bilangan";
            return "<h2><b>". $Result. "</b></h2>";
    }
}
?>
