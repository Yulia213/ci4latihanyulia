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

        return view('user/user', $data);
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['users'] = $model->find($id);

        return view('user/edit', $data);
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

        return redirect()->to(base_url('user/user'));
    }

    public function delete($id)
    {
        $model = new UserModel();

        $data['users'] = $model->find($id);
        dd($data);

        if (!$data) {
            return redirect()->to(base_url('user/user'))
                ->with('error', 'Data user tidak ditemukan');
        }

        $model->delete($id);

        return redirect()->to(base_url('user/user'))
            ->with('success', 'Data berhasil dihapus');
    }

    public function create()
    {
        return view('user/tambah');
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
            return redirect()->to(base_url('user/user'))
                ->with('error', 'Data tidak dapat di tambahkan');
        }
        $model->insert($data);

        return redirect()->to(base_url('user/user'))
            ->with('success', 'Data berhasil di tambahkan');
    }

    public function kondisi()
    {
        //if else
        $teman = 'eko';
        if ($teman == 'edo') {
            $status = "teman saya";
        } else {
            $status = "bukan teman saya";
        }

        //if elseif else
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

        //switch case
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

        return view('user/kondisi', $data);
    }

    public function looping()
    {
        //for loop
        $hasil = [];
        for ($i = 1; $i <= 10; $i++) {
            $hasil[] = $i;
        }

        //while
        $i = 1;
        while ($i <= 5) {
            $angka[] = $i;
            $i++;
        }

        //do while
        $i = 1;
        do {
            $number[] = $i;
            $i++;
        } while ($i <= 5);

        $data = [
            'hasil' => $hasil,
            'angka' => $angka,
            'number' => $number
        ];

        return view('user/looping', $data);
    }
}
