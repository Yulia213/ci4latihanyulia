<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {

        $model = new UserModel();
        $data = [
            'users' => $model->findAll(),
            'users1' => $model->where('id', 1)->first(),
        ];

        return view('user', $data);
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['users'] = $model->find($id);

        return view('edit', $data);
    }

    public function update($id)
    {
        $model = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            )
        ];

        if (!$data) {
            return redirect()->to(base_url('user'))
                ->with('error', 'Data tidak dapat tersimpan');
        }
        $model->update($id, $data);

        return redirect()->to(base_url('user'));
    }

    public function delete($id)
    {
        $model = new UserModel();

        $data['users'] = $model->find($id);

        if (!$data) {
            return redirect()->to(base_url('user'))
                ->with('error', 'Data user tidak ditemukan');
        }

        $model->delete($id);

        return redirect()->to(base_url('user'))
            ->with('success', 'Data berhasil dihapus');
    }

    public function create()
    {
        return view('/tambah');
    }

    public function tambah()
    {
        $model = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            )
        ];

        if (!$data) {
            return redirect()->to(base_url('user'))
                ->with('error', 'Data tidak dapat di tambahkan');
        }
        $model->insert($data);

        return redirect()->to(base_url('user'))
            ->with('success', 'Data berhasil di tambahkan');
    }

    public function kondisi()
    {
        $teman = 'eko';
        if ($teman == 'edo') {
            $status = "teman saya";
        } else {
            $status = "bukan teman saya";
        }

        $nilai = 9;
        if ($nilai > 100) {
            $predikat = "error";
        } elseif ($nilai > 89) {
            $predikat = "sangat baik";
        } elseif ($nilai > 70 && $nilai <= 89) {
            $predikat =  "baik";
        } elseif ($nilai < 70 && $nilai > 29) {
            $predikat =  "lumayan";
        } elseif ($nilai < 30 && $nilai >= 9) {
            $predikat =  "menghawatirkan";
        } elseif ($nilai < 10) {
            $predikat = "sangat menghawatirkan";
        } else {
            $predikat = "buruk";
        }

        $level = '9';
        switch ($level) {
            case 10:
                $jabatan = "user";
                break;
            case 2:
                $jabatan = "supervisor";
                break;
            case 3:
                $jabatan = "manager";
                break;
            case 4:
                $jabatan = "superadmin";
                break;
            default:
                $jabatan = "tidak dikenali";
        }

        $nama = "jojo";
        $nomor = "3";

        switch ($nama) {
            case "aen" && $nomor == 3:
                $keterangan = "nama kamu aen dan nomor 3";
                break;
            case "aen":
                $keterangan = "nama kamu aen";
                break;
            case "jojo":
                $keterangan = "nama kamu jojo";
                break;
            default:
                $keterangan = "nama kamu tidak ditemukan";
        }

        $data = [
            'status_teman' => $status,
            'nama_teman' => $teman,
            'nilai' => $nilai,
            'predikat' => $predikat,
            'level' => $level,
            'jabatan' => $jabatan,
            'nama' => $nama,
            'keterangan' => $keterangan
        ];

        return view('kondisi', $data);
    }

    public function looping()
    {
        $hasil = [];
        for ($i = 1; $i <= 100; $i++) {
            $hasil[] = $i;
        }

        $data = [
            'hasil' => $hasil
        ];

        return view('looping', $data);
    }
}
