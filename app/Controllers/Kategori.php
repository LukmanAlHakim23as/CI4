<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKategori;

class Kategori extends BaseController
{
    protected $ModelKategori;

    public function __construct()
    {
        $this->ModelKategori = new ModelKategori;
    }

    public function daftarKategori()
    {
        $kategori = $this->ModelKategori->findAll();
        $data = [
            'menu' => 'masterdata',
            'submenu' => 'kategori',
            'judul' => 'Daftar Kategori',
            'page' => 'v_kategori',
            'kategori' => $kategori
        ];
        return view('v_tamplate_admin', $data);
    }

    public function tambahKategori()
{
    if ($this->validate([
        'nama_kategori' => [
            'label' => 'nama_kategori',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Masih Kosong !',
            ]
        ],
    ])) {
        $nama_kategori = $this->request->getVar('nama_kategori');

        $data = [
            'f_kategori' => $nama_kategori,
        ];

        $tambahKategori = $this->ModelKategori->simpanData($data);

        if ($tambahKategori) {
            return redirect()->to(base_url('Kategori/daftarKategori'));
        } else {
            session()->setFlashdata('pesan', 'Gagal menambahkan kategori.');
            return redirect()->to(base_url('Kategori/tambahKategori'));
        }
    } else {
        // Jika validasi gagal
        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        return redirect()->to(base_url('Kategori/tambahKategori'));
    }
}

    public function editKategori()
    {
        $id = $this->request->getVar('id');
        $nama_kategori = $this->request->getVar('nama_kategori');

        $data = [
            'f_kategori' => $nama_kategori,
        ];

        $where = ['f_id' => $id];

        $editKategori = $this->ModelKategori->editData($data, $where);
        if ($editKategori) {
            // Jika data berhasil ditambahkan, arahkan pengguna ke halaman DaftarAnggota
            return redirect()->to(base_url('Kategori/daftarKategori'));
        } else {
            echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Kategori/daftarKategori') . "';</script>";
        }
    }

    public function hapusKategori($id)
    {
        $where = ['f_id' => $id];

        $hapusKategori = $this->ModelKategori->hapusData($where);

        if ($hapusKategori) {
            return redirect()->to(base_url('Kategori/daftarKategori'));
        } else {
            echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Kategori/daftarKategori') . "';</script>";
        }
    }
}
