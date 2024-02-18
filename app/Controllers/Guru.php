<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Guru extends BaseController
{
    public function index()
    {
        $data = ['judul' => 'Guru', 'page' => 'v_guru',];
        return view('v_tamplate_guru', $data);
    }
}
