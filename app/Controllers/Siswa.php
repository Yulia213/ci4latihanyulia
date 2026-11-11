<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SiswaModel;
use App\Models\KelasModel;

class Siswa extends BaseController
{
    public function index()
    {
        $modelKelas = new KelasModel();

        $model = new SiswaModel();

        $data = [
            'siswa' => $model->getSiswa(),
            'kelas' => $modelKelas->getKelas()
        ];

        return view('user/siswa', $data);
    }

    public function createSiswa()
    {

        $model = new KelasModel();
        $data = ['kelas' => $model->getKelas()];

        return view('/user/tambahSiswa', $data);
    }

    public function prosesTambahSiswa()
    {
        $model = new KelasModel();
        $model = new SiswaModel();

        $data = [
            'nisn' => $this->request->getPost('nisn'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'id_kelas' => $this->request->getPost('kelas'),
        ];

        $model->insert($data);


        return redirect()->to(base_url('/siswa'))
            ->with('success', 'Data berhasil di tambahkan');
    }

    public function hapusSiswa($nisn)
    {
        $model = new SiswaModel();
        $data = $model->find($nisn);

        if (!$data) {
            return redirect()->to(base_url('/siswa'))
                ->with('error', 'Data siswa tidak ditemukan');
        }

        $model->delete($nisn);

        return redirect()->to(base_url('/siswa'))
            ->with('success', 'Data siswa berhasil di hapus');
    }

    public function updateSiswa()
    {
        $nisn = $this->request->getPost('nisn');
        $model = new KelasModel();
        $model = new SiswaModel();

        $data = [
            'nisn' => $this->request->getPost('nisn'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'id_kelas' => $this->request->getPost('kelas'),
        ];


        if (!$data) {
            return redirect()->to(base_url('siswa'))
                ->with('error', 'Data tidak dapat tersimpan');
        }
        $model->update($nisn, $data);

        return redirect()->to(base_url('/siswa'));
    }
}
