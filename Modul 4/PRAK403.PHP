<!DOCTYPE HTML>
<html>
    <head>
        <title>Soal 3 Modul 4</title>
        <style>
            table, td, tr {              
                border: 1px solid black;
                border-collapse: collapse;
                padding-bottom: 8px;
                padding-left: 4px;
                padding-right: 24px;
                text-align: left;
            }
            .row1 {
                background-color: #C9C7C7;
            }
            .tidak_revisi {
                background-color: #5CBD00;
            }
            .revisi {
                background-color: red;
            }
        </style>
    </head>
    <body>
        <?php
        $data_krs= [
            "1"=> [
                "nama" => "Ridho",
                "mata_kuliah" => [
                    "Pemrograman 1" => 2,
                    "Praktikum pemrograman 1" => 1,
                    "Pengantar Lingkungan Lahan Basah" => 2,
                    "Arsitektur Komputer" => 3
                ]
            ],
            "2" => [
                "nama" => "Ratna",
                "mata_kuliah" => [
                    "Basis Data 1" => 2,
                    "Praktikum Basis Data 1" => 1,
                    "Kalkulus" => 3
                ]
            ],
            "3" => [
                "nama" => "Tono",
                "mata_kuliah" => [
                    "Rekayasa Perangkat Lunak" => 3,
                    "Analisis dan Perancangan Sistem" => 3,
                    "Komputasi Awan" => 3,
                    "Kecerdasan Bisnis" => 3
                ]
            ]
        ];

        echo "<table>";
        echo "<tr>";
        echo "<td class='row1'>No</td>";
        echo "<td class='row1'>Nama</td>";
        echo "<td class='row1'>Mata Kuliah Diambil</td>";
        echo "<td class='row1'>SKS</td>";
        echo "<td class='row1'>Total SKS</td>";
        echo "<td class='row1'>Keterangan</td>";
        echo "</tr>";

        foreach($data_krs as $nomor => $mhs){
            $total_sks= array_sum($mhs['mata_kuliah']);
            $status_krs = status($total_sks);
            $keterangan = ($status_krs == "revisi") ? "Revisi KRS" : "Tidak Revisi";

            $i = 0;
            foreach($mhs['mata_kuliah'] as $nama_mk => $sks){
                echo "<tr>";
                if ($i == 0){
                    echo "<td>$nomor</td>";
                    echo "<td>{$mhs['nama']}</td>";
                    echo "<td>$nama_mk</td>";
                    echo "<td>$sks</td>";
                    echo "<td>$total_sks</td>";
                    echo "<td class='$status_krs'>$keterangan</td>";
               }
               else {
                echo "<td></td>";
                echo "<td></td>";
                echo "<td>$nama_mk</td>";
                echo "<td>$sks</td>";
                echo "<td></td>";
                echo "<td></td>";
               }
               $i++;
            }
        }
        echo "</table>";

        function status($total_sks){
            if ($total_sks < 7){
                return "revisi";
            }
            else {
                return "tidak_revisi";
            }
        }
        ?>
    </body>
</html>