<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBuku;

class Buku extends BaseController
{
    protected $ModelBuku;

    public function __construct()
    {
        $this->ModelBuku = new ModelBuku();
    }

    //view di tamplate anggota
    public function Buku()
    {
        $buku = $this->ModelBuku->findAll();
        $data = [
            'menu' => 'masterdata',
            'submenu' => 'daftarbuku',
            'judul' => 'Daftar Buku',
            'page' => 'v_daftarbuku',
            'buku' => $buku
        ];
        return view('v_tamplate_anggota', $data);
    }
    //view ditamplate admin
    public function daftarBuku()
    {
        $buku = $this->ModelBuku->findAll();
        $data = [
            'menu' => 'masterdata',
            'submenu' => 'buku',
            'judul' => 'Daftar Buku',
            'page' => 'v_buku',
            'buku' => $buku
        ];
        return view('v_tamplate_admin', $data);
    }


    public function tambahBuku()
    {
        $idkategori = $this->request->getVar('idkategori');
        $judul = $this->request->getVar('judul');
        $pengarang = $this->request->getVar('pengarang');
        $penerbit = $this->request->getVar('penerbit');
        $deskripsi = $this->request->getVar('deskripsi');

        $data = [
            'f_idkategori' => $idkategori,
            'f_judul' => $judul,
            'f_pengarang' => $pengarang,
            'f_penerbit' => $penerbit,
            'f_deskripsi' => $deskripsi,
        ];

        $tambahBuku = $this->ModelBuku->simpenData($data);

        if ($tambahBuku) {
            // Jika data berhasil ditambahkan, arahkan pengguna ke halaman DaftarAnggota
            return redirect()->to(base_url('Buku/daftarBuku'));
        } else {
            echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Buku/daftarBuku') . "';</script>";
        }
    }

    public function editBuku()
    {
        $id = $this->request->getVar('id');
        $idkategori = $this->request->getVar('idkategori');
        $judul = $this->request->getVar('judul');
        $pengarang = $this->request->getVar('pengarang');
        $penerbit = $this->request->getVar('penerbit');
        $deskripsi = $this->request->getVar('deskripsi');

        $data = [
            'f_idkategori' => $idkategori,
            'f_judul' => $judul,
            'f_pengarang' => $pengarang,
            'f_penerbit' => $penerbit,
            'f_deskripsi' => $deskripsi,
        ];

        $where = ['f_id' => $id];

        $editBuku = $this->ModelBuku->editData($data, $where);

        if ($editBuku) {
            // Jika data berhasil ditambahkan, arahkan pengguna ke halaman DaftarAnggota
            return redirect()->to(base_url('Buku/daftarBuku'));
        } else {
            echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Buku/daftarBuku') . "';</script>";
        }
    }

    public function hapusBuku($id)
    {
        $where = ['f_id' => $id];

        $hapusBuku = $this->ModelBuku->hapusBuku($where);

        if ($hapusBuku) {
            return redirect()->to(base_url('Buku/daftarBuku'));
        } else {
            echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Buku/daftarBuku') . "';</script>";
        }
    }

    public function DetailBuku($id_buku)
    {
        $data = [
            'judul' => 'Detail Buku',
            'page' => 'v_detailbuku',
            'menu' => 'masterdata',
            'submenu' => 'buku',
            'buku' => $this->ModelBuku->DetailBuku($id_buku),
        ];
        return view('v_tamplate_anggota', $data);
    }
}
