<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJadwalMataPelajaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jadwal' => [
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true
            ],

            'id_kelas' => [
                'type' => 'INT',
                'constraint' => '2',
            ],

            'id_mapel' => [
                'type' => 'INT',
                'constraint' => '2',
            ],

            'jam_mapel' => [
                'type' => 'TIME',
            ],

            'hari' => [
                'type' => 'ENUM',
                'constraint' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
                'null' => false,
            ],
        ]);

        $this->forge->addKey('id_jadwal', TRUE);
        $this->forge->addForeignKey('id_kelas', 'kelas', 'id_kelas', 'RESTRICT', 'CASCADE');
        $this->forge->addForeignKey('id_mapel', 'mata_pelajaran', 'id_mapel', 'RESTRICT', 'CASCADE');

        $this->forge->createTable('jadwal_mapel', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('jadwal_mapel');
    }
}
