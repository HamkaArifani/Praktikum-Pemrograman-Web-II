<!DOCTYPE HTML>
<html>
    <head>
        <title>Soal 5 Modul 3</title>
    </head>
    <body>
        <form method="post">
            <input type="text" name="Value" value="<?php echo isset($_POST['Value'])? $_POST['Value'] : "" ?>">
            <input type="submit" name="submission">
        </form>
        <?php
        if(isset($_POST['submission'])){
            $value = $_POST['Value'];
            $str_length=strlen($value);
            
            echo "<h2>Input:</h2>";
            echo $value;
            echo "<br><h2>Output:</h2>";

            for($i=0; $i<$str_length; $i++){
                for($j=0; $j<$str_length;$j++){
                    if($j==0){
                        echo strtoupper($value[$i]);
                        continue;
                    }
                    echo strtolower($value[$i]);
                }
            }
        }
        ?>
    </body>
</html>