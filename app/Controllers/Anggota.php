<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAnggota;

class Anggota extends BaseController
{

    protected $ModelAnggota;

    public function __construct()
    {
        $this->ModelAnggota = new ModelAnggota();
    }

    public function index(): string
    {
        $data = [
            'menu' => 'masterdata',
            'submenu' => '',
            'judul' => 'Dasboard',
            'page' => 'v_anggota',
        ];
        return view('v_tamplate_anggota', $data);
    }

    public function DaftarAnggota()
    {
        $anggota = $this->ModelAnggota->findAll();
        $data = [
            'menu' => 'masterdata',
            'submenu' => 'anggota',
            'judul' => 'Daftar Anggota',
            'page' => 'v_daftaranggota',
            'anggota' => $anggota
        ];
        return view('v_tamplate_admin', $data);
    }

    public function tambahAnggota()
    {
        $nis = $this->request->getVar('nis');
        $nama = $this->request->getVar('nama');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $alamat = $this->request->getVar('alamat');
        $tanggallahir = $this->request->getVar('tgllahir');

        $data = [
            'f_nis' => $nis,
            'f_nama' => $nama,
            'f_username' => $username,
            'f_password' => $password,
            'f_alamat' => $alamat,
            'f_tanggallahir' => $tanggallahir,
        ];

        $tambahAnggota = $this->ModelAnggota->simpenData($data);

        if ($tambahAnggota) {
            // Jika data berhasil ditambahkan, arahkan pengguna ke halaman DaftarAnggota
            return redirect()->to(base_url('Anggota/DaftarAnggota'));
        } else {
            echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Anggota/DaftarAnggota') . "';</script>";
        }
    }

    public function editAnggota()
    {
        $id = $this->request->getVar('id');
        $nis = $this->request->getVar('nis');
        $nama = $this->request->getVar('nama');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $alamat = $this->request->getVar('alamat');
        $tanggallahir = $this->request->getVar('tgllahir');

        $data = [
            'f_nis' => $nis,
            'f_nama' => $nama,
            'f_username' => $username,
            'f_password' => $password,
            'f_alamat' => $alamat,
            'f_tanggallahir' => $tanggallahir,
        ];

        $where = ['f_id' => $id];

        $editAnggota = $this->ModelAnggota->editData($data, $where);

        if ($editAnggota) {
            // Jika data berhasil ditambahkan, arahkan pengguna ke halaman DaftarAnggota
            return redirect()->to(base_url('Anggota/DaftarAnggota'));
        } else {
            echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Anggota/DaftarAnggota') . "';</script>";
        }
    }
    public function hapusAnggota($id)
    {

        $where = ['f_id' => $id];

        $hapusAnggota = $this->ModelAnggota->hapusData($where);

        if ($hapusAnggota) {
            // Jika data berhasil ditambahkan, arahkan pengguna ke halaman DaftarAnggota
            return redirect()->to(base_url('Anggota/DaftarAnggota'));
        } else {
            echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Anggota/DaftarAnggota') . "';</script>";
        }
    }
}
