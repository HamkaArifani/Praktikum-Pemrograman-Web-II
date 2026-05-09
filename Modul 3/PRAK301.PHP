<!DOCTYPE HTML>
<html>
    <head>
        <title>Soal 1 Modul 3</title>
        <style>
            .oddNumber{
                color: red;
            }
            .evenNumber{
                color: green;
            }
        </style>
    </head>
    <body>
        <form method="post">
            Jumlah Peserta:<input type ="text" name="participant" value="<?php echo isset($_POST['participant'])? $_POST['participant'] : "" ?>">
            <br>
            <input type="submit" name="btnSubmit" value="cetak">
        </form>
        <?php
        if (isset($_POST['btnSubmit'])){
            $total_num=$_POST['participant'];
            if(is_numeric($total_num)){
                $i=0;
                while($i<$total_num){
                    $num_style=($i+1)%2 == 0 ? "evenNumber" : "oddNumber";
                    echo "<h2 class=$num_style>Peserta ke-". $i+1 ."</h2>";
                    $i++;
                }
            }  
            else{
                 echo "<h2><b>Harap Masukkan Input Berupa Angka</b></h2>";
            }
        }
        ?>
    </body>
</html>

