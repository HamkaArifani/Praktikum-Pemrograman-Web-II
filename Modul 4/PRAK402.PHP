<!DOCTYPE HTML>
<html>
    <head>
        <title>Soal 2 Modul 4</title>
        <style>
            table, td, tr {              
                border: 1px solid black;
                border-collapse: collapse;
                padding-bottom: 8px;
                padding-left: 8px;
                padding-right: 24px;
                text-align: left;
            }
            .row1 {
                background-color: #C9C7C7;
            }
        </style>
    </head>
    <body>
        <?php
        $data_mahasiswa=[
            "Andi" => [
                "nim" => "2101001",
                "uts" => 87,
                "uas" => 65
            ],
            "Budi" => [
                "nim" => "2101002",
                "uts" => 76,
                "uas" => 79
            ],
            "Tono" => [
                "nim" => "2101003",
                "uts" => 50,
                "uas" => 41  
            ],
            "Jessica" => [
                "nim" => "2101004",
                "uts" => 60,
                "uas" => 75
            ]
        ];

        echo "<table>";
        echo "<tr>";
        echo "<td class='row1'>Nama</td>";
        echo "<td class='row1'>NIM</td>";
        echo "<td class='row1'>Nilai UTS</td>";
        echo "<td class='row1'>Nilai UAS</td>";
        echo "<td class='row1'>Nilai Akhir</td>";
        echo "<td class='row1'>Huruf</td>";
        echo "</tr>";

        foreach($data_mahasiswa as $nama => $nilai){
            $nim = $nilai['nim'];
            $nilai_uts = $nilai['uts'];
            $nilai_uas = $nilai['uas'];

            $nilai_akhir = ($nilai_uts * 0.4)+ ($nilai_uas * 0.6);
            $huruf = nilaiHuruf($nilai_akhir);

            echo "<tr>";
            echo "<td>$nama</td>";
            echo "<td>$nim</td>";
            echo "<td>$nilai_uts</td>";
            echo "<td>$nilai_uas</td>";
            echo "<td>$nilai_akhir</td>";
            echo "<td>$huruf</td>";
            echo "</tr>";
        }

        echo "</table>";

        function nilaiHuruf($nilai_akhir){
            if ($nilai_akhir >= 80){
                return "A";
            }
            elseif($nilai_akhir >=70 && $nilai_akhir <=79){
                return "B";
            }
            elseif($nilai_akhir >=60 && $nilai_akhir <=69){
                return "C";
            }
            elseif($nilai_akhir >=50 && $nilai_akhir <=59){
                return "D";
            }
            else {
                return "E";
            }
        }

        ?>
    </body>
</html>