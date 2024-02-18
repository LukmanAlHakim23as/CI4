<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAnggota extends Model
{
    protected $table = 't_anggota';
    protected $primaryKey = 'f_id';
    protected $allowedFields = ['f_nis', 'f_nama', 'f_username', 'f_password', 'f_alamat', 'f_tanggallahir'];

    public function simpenData($data) {
        $this->db->table($this->table)->insert($data);
        return true;
    }

    public function editData($data,$where){
        $this->db->table($this->table)->update($data,$where);
        return true;
    }

    
    public function hapusData($where){
        $this->db->table($this->table)->delete($where);
        return true;
    }
    
    public function ProfileAnggota($id_anggota){
        return $this->db->table($this->table)->where([
            'f_id' => $id_anggota,
        ])->get()->getFirstRow();
        
    }

    public function editProfile($data,$where){
        $this->db->table($this->table)->update($data,$where);
        return true;
    }
}
