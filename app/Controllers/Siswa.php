<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SiswaModel;

class Siswa extends BaseController
{
    public function index()
    {

        $model = new SiswaModel();
        $data = [
            'siswa' => $model->findAll(),
        ];

        return view('user/siswa', $data);
    }
}
