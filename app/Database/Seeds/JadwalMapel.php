<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JadwalMapel extends Seeder
{
    public function run()
    {
        $jadwal_mapel = [
            [
                'id_kelas' => '1',
                'id_mapel' => '4',
                'jam_mapel' => '07:45:00',
                'hari' => 'Senin',
            ],
            [
                'id_kelas' => '1',
                'id_mapel' => '5',
                'jam_mapel' => '09:45:00',
                'hari' => 'Senin',
            ],
            [
                'id_kelas' => '1',
                'id_mapel' => '6',
                'jam_mapel' => '11:15:00',
                'hari' => 'Senin',
            ],
        ];

        foreach ($jadwal_mapel as $data) {
            $this->db->table('jadwal_mapel')->insert($data);
        }
    }
}
