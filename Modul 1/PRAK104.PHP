<!DOCTYPE html>
<html>
    <head>
        <title>Soal 4 Modul 1</title>
        <style>
            table {
                border: 1px solid black;
                border-collapse: seperate;
            }
            
            th, td {
                border: 1px solid black;
                text-align: left;
                font-family: 'Times New Roman';     
            }
        </style>
    </head>
    <body>
        <?php
        $samsungphone = array(
            "Samsung Galaxy S22",
            "Samsung Galaxy S22+",
            "Samsung Galaxy A03",
            "Samsung Galaxy Xcover 5"
        );
        ?>
        <table>
            <tr>
                <th>Daftar Smartphone Samsung</th>
            </tr>
      
        <?php
            foreach($samsungphone as $hp){
                echo "<tr>";
                echo "<td>$hp</td>";
                echo "</tr>";
            };
        ?>
        </table>
    </body>
</html>