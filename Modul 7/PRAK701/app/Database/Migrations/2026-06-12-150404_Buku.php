<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Buku extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 12,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'penulis' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'penerbit' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'tahun_terbit' => [
                'type' => 'YEAR',
                'constraint' => '4',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('Buku');
    }

    public function down()
    {
        $this->forge->dropTable('Buku');
    }
}
