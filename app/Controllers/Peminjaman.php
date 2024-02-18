<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPeminjaman;

class Peminjaman extends BaseController
{

    protected $ModelPeminjaman;

    public function __construct()
    {
        $this->ModelPeminjaman = new ModelPeminjaman();
    }

    public function index()
    {
        $data = [
            'menu' => 'masterdata',
            'submenu' => '',
            'judul' => 'Data Peminjaman',
            'page' => 'v_peminjaman',
        ];

        return view('v_tamplate_admin', $data);
    }

    public function riwayat()
    {
        $data = [
            'menu' => 'masterdata',
            'submenu' => '',
            'judul' => 'Riwayat Peminjaman',
            'page' => 'v_riwayat_pinjam',
            'peminjaman' => $this->ModelPeminjaman->riwayatPinjam(session()->get('f_id'))
        ];

        return view('v_tamplate_anggota', $data);
    }

    public function prosesPinjam()
    {
        $id_buku = $this->request->getVar('id_buku');

        $data = [
            'f_idbuku' => $id_buku,
            'f_idanggota' => session()->get('f_id'),
            'f_tanggalpeminjaman' => date("Y-m-d"),
            'f_tanggalpengembalian' => null,
            'status' => 'pending',
        ];

        $tambahData = $this->ModelPeminjaman->simpenData($data);

        if ($tambahData) {
            // Jika data berhasil ditambahkan, arahkan pengguna ke halaman DaftarAnggota
            return redirect()->to(base_url('Buku/Buku'));
        } else {
            echo "<script>alert('Data gagal ditambahkan'); window.location = '" . base_url('Buku/Buku') . "';</script>";
        }
    }
}
