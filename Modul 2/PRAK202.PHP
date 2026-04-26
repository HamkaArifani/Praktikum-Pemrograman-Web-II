<?php
$errName = $errNIM = $errGender = "";
$isValid = true;
$showInput = false;

if(isset($_POST['Submit'])){
    if(empty($_POST['Name'])){
        $errName = "* nama tidak boleh kosong";
        $isValid = false;
    }
    if(empty($_POST['NIM'])){
        $errNIM = "* nim tidak boleh kosong";
        $isValid = false;
    }
    if(empty($_POST['Gender'])){
        $errGender = "* jenis kelamin tidak boleh kosong";
        $isValid = false;
    }
    if($isValid){
        $showInput=true;
        $name = $_POST['Name'];
        $nim = $_POST['NIM'];
        $gender = $_POST['Gender'];
    }
}

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Soal 2 Modul 2</title>
    </head>

    <body>
        <form method="POST">
            Nama: <input type="text" name = "Name" value="<?php echo isset($_POST['Name'])? $_POST['Name'] : "" ?>">
            <span style="color:red;"><?php echo $errName?></span><br>
            NIM: <input type="text" name = "NIM" value="<?php echo isset($_POST['NIM'])? $_POST['NIM'] : "" ?>">
            <span style="color:red;"><?php echo $errNIM?></span><br>
            <label for="Gender">Jenis Kelamin:</label>
            <span style="color:red;"><?php echo $errGender?></span><br>
            <input type="radio" id="Man" name="Gender" value="Laki-Laki" <?php if(isset($_POST['Gender']) && $_POST['Gender']=="Laki-Laki") echo "checked";?>>
            <label for="Man">Laki-Laki</label><br>
            <input type="radio" id="Woman" name="Gender" value="Female" <?php if(isset($_POST['Gender']) && $_POST['Gender']=="Perempuan") echo "checked";?>>
            <label for="Woman">Perempuan</label><br>
            <input type="submit" name="Submit">
        </form>
    </body>
</html>
<?php
if($showInput){
    echo "<h2>Output:</h2>";
    echo $name . "<br>";
    echo $nim . "<br>";
    echo $gender . "<br>";
}
?>