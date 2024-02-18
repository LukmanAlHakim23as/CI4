<?php

namespace App\Controllers;

use App\Models\ModelAdmin;

class Admin extends BaseController
{
    protected $ModelAdmin, $session;

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->session = \Config\Services::session();
    }
    public function index(): string
    {
        $data = [
            'menu' => 'masterdata',
            'submenu' => '',
            'judul' => 'Admin',
            'page' => 'v_admin',
            'totalAnggota' => $this->ModelAdmin->totalAnggota(),
            'totalBuku' => $this->ModelAdmin->totalBuku()
        ];
        return view('v_tamplate_admin', $data);
    }
}
