<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAnggota;

class Profile extends BaseController
{
    protected $ModelAnggota;

    public function __construct()
    {
        $this->ModelAnggota = new ModelAnggota();
    }
    
    public function index()
    {
        $id_anggota = session()->get('f_id');
        // var_dump($id_anggota);
        // exit;
        $data = [
            'judul' => 'Profile Anggota',
            'page' => 'v_profile',
            'submenu' => 'profile',
            'anggota' => $this->ModelAnggota->ProfileAnggota($id_anggota),
        ];

        return view('v_tamplate_anggota', $data);
    }

    public function editProfile(){
        $id = $this->request->getVar('id');
        $nis = $this->request->getVar('nis');
        $nama = $this->request->getVar('nama');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $alamat = $this->request->getVar('alamat');
        $tanggallahir = $this->request->getVar('tgllahir');
        
        $validated = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
        ]);

        $msg = 'Please select a valid file';
        $filepath = session()->get('f_foto');
 
        if ($validated) {
            $avatar = $this->request->getFile('file');
            $filepath = $avatar->getRandomName();
            $avatar->move('foto', $filepath);

            session()->remove('f_foto');
            session()->set('f_foto', $filepath);

          $msg = 'File has been uploaded';
        }

        $data = [
            'f_nis' => $nis,
            'f_nama' => $nama,
            'f_username' => $username,
            'f_password' => $password,
            'f_alamat' => $alamat,
            'f_tanggallahir' => $tanggallahir,
            'f_foto' => $filepath,
        ];

        $where = ['f_id' => $id];

        $editAnggota = $this->ModelAnggota->editProfile($data, $where);

        if ($editAnggota) {
            // Jika data berhasil ditambahkan, arahkan pengguna ke halaman DaftarAnggota
            return redirect()->to(base_url('Profile'));
        } else {
            echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Profile') . "';</script>";
        }
    }
}
