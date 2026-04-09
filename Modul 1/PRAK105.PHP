<!DOCTYPE html>
<html>
    <head>
        <title>Soal 5 Modul 1</title>
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
            th {
                background-color:red;
                font-size:30px;
                padding-top:15px;
                padding-bottom:15px;
            }
        </style>
    </head>
    <body>
        <?php
        $samsungphone = array(
            "S22"=>"Samsung Galaxy S22",
            "S22+"=>"Samsung Galaxy S22+",
            "A03"=>"Samsung Galaxy A03",
            "Xcover5"=>"Samsung Galaxy Xcover 5"
        );
        ?>
        <table>
            <tr>
                <th>Daftar Smartphone Samsung</th>
            </tr>
      
        <?php
            foreach($samsungphone as $tipe => $hp){
                echo "<tr>";
                echo "<td>$hp</td>";
                echo "</tr>";
            };
        ?>
        </table>
    </body>
</html>