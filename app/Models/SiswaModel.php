<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table            = 'siswa';
    protected $primaryKey       = 'nisn';

    protected $allowedFields    = [
        'nisn',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'id_kelas'
    ];

    public function getSiswa()
    {
        return $this->select('siswa.*, kelas.id_kelas')
            ->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'Inner')
            ->findAll();
    }
}
