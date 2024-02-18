<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    protected $table = 't_kategori';
    protected $primaryKey = 'f_id';
    protected $allowedFields = ['f_kategori'];

    public function simpanData($data){
        $this->db->table($this->table)->insert($data);
        return true;
    }

    public function editData($data, $where){
        $this->db->table($this->table)->update($data,$where);
        return true;
    }

    public function hapusData($where){
        $this->db->table($this->table)->delete($where);
        return true;
    }
}
