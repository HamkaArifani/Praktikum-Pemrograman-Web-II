<?php
namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model{
    public function getHomeContent(){
        return [
            'Web_Title'=> 'Profilzy',
            'Name'=> 'Hamka Arifani',
            'NIM'=> '2410817110006',
            'Major'=> 'Teknologi Informasi',
        ];
    }

    public function getProfilContent(){
        return [
            'Web_Title'=> 'Profilzy',
            'Name'=> 'Hamka Arifani',
            'NIM'=> '2410817110006',
            'Major'=> 'Teknologi Informasi',
            'Hobby'=> 'Menonton Film, Memasak, Membaca Buku',
            'Skill'=> 'Berenang, Editing, Coding, SFX Design',
            'Programming_Language'=> 'Kotlin, Java, PHP, CSS, HTML, SQL, C++, C, Python',
            'Competition_Experience'=> 'GAMESEED 2025, GIMJAM ITB 2026, PKM 2026',
            'Achievement'=>'Top 10 GAMESEED 2025 Student Category, Lolos Seleksi PKM 2026 Tingkat Universitas Lambung Mangkurat',
            'Organization'=>'Wasaka Games Divisi Public Relation',
            'Project_Experience'=>'A Match Made in Dungeon (GAMESEED), Personal Space (GIMJAM ITB), Arisanak (Kewirausahaan), Commitin (Pemrograman Web II)',
            'Image'=> 'Profile_Photo.png'
        ];
    }
}
?>