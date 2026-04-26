<!DOCTYPE HTML>
<html>
    <head>
        <title>Soal 1 Modul 2</title>
    </head>

    <body>
        <form method="POST">
            Nama: 1 <input type="text" name = "Name1"><br>
            Nama: 2 <input type="text" name = "Name2"><br>
            Nama: 3 <input type="text" name = "Name3"><br>
            <input type="submit" value="Urutkan" name="Submit">
        </form>
    </body>
</html>
<?php
if(isset($_POST['Submit'])){
    $nameList = [
        $_POST['Name1'],
        $_POST['Name2'],
        $_POST['Name3']
    ];
    sort($nameList);
    foreach($nameList as $name){
        echo $name. "<br>";
    }
}
?>
