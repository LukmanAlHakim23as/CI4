<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeminjaman extends Model
{
    protected $table            = 't_peminjaman';
    protected $primaryKey       = 'f_id';
    protected $allowedFields    = ['f_idanggota', 'f_idbuku', 'f_tanggalpeminjaman', 'f_tanggalpengembalian', 'status'];

    public function simpenData($data)
    {
        $this->db->table($this->table)->insert($data);
        return true;
    }

    public function riwayatPinjam($id){
        return $this->db->table($this->table)->where([
            'f_idanggota' => $id
        ])->get()->getResult();
        
    }
}
