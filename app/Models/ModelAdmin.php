<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    protected $table = 't_admin';
    protected $primaryKey = 'f_id';
    protected $allowedFields = ['f_nama', 'f_username', 'f_password', 'f_alamat', 'f_tanggallahir','f_status'];

    public function totalBuku()
    {
        return $this->db->table('t_buku')->countAll();
    }

    public function totalAnggota()
    {
        return $this->db->table('t_anggota')->countAll();
    }
}