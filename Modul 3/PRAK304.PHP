<?php
$total_stars=0;
$show_button=false;

if(isset($_POST['submission'])){
    $stars=$_POST['stars'];
    if(is_numeric($stars)){
        $total_stars=$stars;
        $show_button=true;
    }
    else{
        echo "Silahkan Masukkan Input Berupa Angka!";
    }
}
if(isset($_POST['action'])){
    $current = $_POST['current_stars'];
    $show_button = true;
    
    if(is_numeric($current)){
        $total_stars=$current;

        if($_POST['action']=='Tambah'){
            $total_stars++;
        } elseif($_POST['action']=='Kurang'){
            $total_stars--;
        }
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Soal 4 Modul 3</title>
    </head>
    <body>
        <?php if(!$show_button): ?>
        <form method="post">
            Jumlah Bintang<input type="text" name="stars" value="<?php echo $total_stars?>"><br>
            <input type="submit" name="submission">
        </form>
        <?php else: ?>
        <?php
        echo "Jumlah Bintang " . $total_stars . "<br>";
        if($total_stars>0){
            for($i=0;$i<$total_stars;$i++){
                echo "<img src ='image/Starnumber3.png' width='40' height= '40'>";
            }
        } 
        ?>
        <form method= "post">
            <input type="hidden" name="current_stars" value = "<?php echo $total_stars ?>">
            <input type="submit" name= "action" value="Tambah"><input type="submit" name= "action" value="Kurang">
        </form>
        <?php endif; ?>
    </body>
</html>