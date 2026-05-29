<?php
namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model{
    public function getHomeContent(){
        return [
            'Web Title'=> 'Profilzy',
            'Name'=> 'Hamka Arifani',
            'NIM'=> '2410817110006'
        ];
    }

    public function getProfilContent(){
        return [
            'Name'=> 'Hamka Arifani',
            'NIM'=> '2410817110006',
            'Major'=> 'Teknologi Informasi',
            'Hobby'=> 'Menonton Film',
            'Skill'=> ['Kotlin', 'Java', 'PHP', 'CSS', 'HTML', 'SQL', 'C++', 'C', 'Python']
        ];
    }
}
?>