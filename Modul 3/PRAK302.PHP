<!DOCTYPE HTML>
<html>
    <head>
        <title>Soal 2 Modul 3</title>
        <style>
            form {
                margin-bottom:15px;
            }
            .space{
                display: inline-block;
                width: 20px;
            }
        </style>
    </head>
    <body>
        <form method= "post">
            Tinggi:<input type="text" name="height"><br>
            Alamat Gambar :<input type="url" name="imageUrl"><br>
            <input type="submit" name="submission" value="Cetak">
        </form>
        <?php
        if (isset($_POST['submission'])){
            $url = $_POST['imageUrl'];
            $height = $_POST['height'];

            $i=0;
            while($i<$height){
                $j=0;
                while ($j<$i){
                    echo "<span class='space'></span>";
                    $j++;
                }

                $k=0;
                while ($k<($height-$i)){
                    echo "<img src='$url' height='20' width='20'>";
                    $k++;
                }
                
                echo "<br>";
                $i++;
            }
        }
        ?>
    </body>
</html>