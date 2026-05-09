<!DOCTYPE HTML>
<html>
    <head>
        <title>Soal 3 Modul 3</title>
    </head>
    <body>
        <form method="post">
            Batas Bawah : <input type="text" name="start"><br>
            Batas Atas : <input type="text" name="end"><br>
            <input type="submit" name="submission" value="Cetak">
        </form>
            <?php
            if (isset($_POST['submission'])){
                $start = $_POST['start'];
                $end = $_POST['end'];

                $i = $start;
                do{
                    $number = ($i+7) % 5 == 0 ? '<img src="image/Starnumber3.png" width="20" height="20">' : "$i ";
                    echo $number;
                    $i++;
                }while($i<=$end);
            }
            ?>
    </body>
</html>