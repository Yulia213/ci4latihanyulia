<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table            = 'nilai';
    protected $primaryKey       = 'id_nilai';

    protected $allowedFields    = [
        'nilai',
        'nisn',
        'id_mapel',
    ];

    public function getNilai()
    {
        return $this->select('(nilai.nilai) AS nilai_siswa, siswa.nisn, siswa.nama, CONCAT(kelas.tingkat, " ", kelas.jurusan, " ", kelas.rombel) AS kelas, (mata_pelajaran.nama_mapel) AS nama_mapel, (guru.nama) AS nama_guru')
            ->join('siswa', 'nilai.nisn = siswa.nisn', 'inner')
            ->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'Inner')
            ->join('mata_pelajaran', 'nilai.id_mapel = mata_pelajaran.id_mapel', 'inner')
            ->join('guru', 'mata_pelajaran.nip = guru.nip', 'inner')
            ->get()
            ->getResultArray();
    }
}
