<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('logged_in')) { //cek session, kalau udah login langsung masuk ke dashboard kalau belum login dulu
            return redirect()->to('/dashboard');
        }
        return view('login');
    }

    public function loginProcess() //cek proses login
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new UserModel();
        $users = $model->where('username', $username)->first();

        if ($users && password_verify($password, $users['password'])) {
            session()->set([
                'logged_in' => true,
                'username' => $users['username'],
            ]);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
