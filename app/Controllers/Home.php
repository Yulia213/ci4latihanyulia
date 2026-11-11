<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {

        return view('login');
    }
}
