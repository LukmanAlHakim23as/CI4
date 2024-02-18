<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    protected $table            = 't_admin';
    protected $allowedFields    = ['f_username', 'f_password'];

    public function cekData($where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);

        return $builder->countAllResults();
    }

    public function getDataId($where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);

        return $builder->get()->getResult();
    }

    public function simpenData($data) {
        $this->db->table($this->table)->insert($data);
        return true;
    }

    public function LoginAdmin($username, $password){
        return $this->db->table('t_admin')
            ->where([
                'f_username' => $username,
                'f_password' => $password,
            ])->get()->getRowArray();
    }

    public function LoginUser($username, $password)
    {
        return $this->db->table('t_anggota')
            ->where([
                'f_username' => $username,
                'f_password' => $password,
            ])->get()->getRowArray();
    }
}
