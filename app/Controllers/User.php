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
        } elseif ($nilai < 30 && $nilai > 9) {
            $predikat =  "menghawatirkan";
        } elseif ($nilai < 10) {
            $predikat = "sangat menghawatirkan";
        } else {
            $predikat = "buruk";
        }

        $data = [
            'status_teman' => $status,
            'nama_teman' => $teman,
            'nilai' => $nilai,
            'predikat' => $predikat
        ];

        return view('dashboard', $data);
    }
}
