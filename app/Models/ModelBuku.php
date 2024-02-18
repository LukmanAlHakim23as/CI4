<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBuku extends Model
{
    protected $table            = 't_buku';
    protected $primaryKey       = 'f_id';
    protected $allowedFields    = ['f_judul', 'f_penerbit', 'f_pengarang', 'f_deskripsi',];

    public function simpenData($data)
    {
        $this->db->table($this->table)->insert($data);
        return true;
    }

    public function editData($data, $where)
    {
        $this->db->table($this->table)->update($data, $where);
        return true;
    }

    public function hapusBuku($where)
    {
        $this->db->table($this->table)->delete($where);
        return true;
    }

    public function DetailBuku($id_buku){
        return $this->db->table($this->table)->where([
            'f_id' => $id_buku
        ])->get()->getFirstRow();
    }
}
