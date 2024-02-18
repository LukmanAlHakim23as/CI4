<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{
    protected $ModelAuth, $session;

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
        $this->session = \Config\Services::session();
    }

    public function index(): string
    {
        $data = ['judul' => 'Login', 'page' => 'v_login'];
        return view('v_tamplate_login', $data);
    }

    public function LoginAnggota()
    {
        $data = ['judul' => 'Login Admin', 'page' => 'v_login_anggota'];
        return view('v_tamplate_login', $data);
    }

    public function LoginAdmin()
    {
        //echo password_hash("Admin123", PASSWORD_DEFAULT)."\n";

        $data = ['judul' => 'Login Admin', 'page' => 'v_login_admin'];
        return view('v_tamplate_login', $data);
    }

    public function CekLoginAdmin()
    {
        if ($this->validate([
            'username' => [
                'label' => 'username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong !',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong !',
                ]
            ]
        ])) {
            //jika entry valid
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->loginAdmin($username, $password);
            if ($cek_login) {
                //jika login berhasil
                session()->set('f_id', intval($cek_login['f_id']));
                session()->set('f_nama', $cek_login['f_nama']);
                session()->set('f_username', $cek_login['f_username']);
                session()->set('f_level', $cek_login['f_level']);
                return redirect()->to(base_url('Admin'));
            } else {
                // jika gagal login krna password atau email salah
                session()->setFlashdata('pesan', 'Username atau Password Salah !');
                return redirect()->to(base_url('Auth/LoginAdmin'));
            }
        } else {
            //jika entry tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/LoginAdmin'));
        }

    }


    public function CekLoginAnggota()
    {
        if ($this->validate([
            'username' => [
                'label' => 'username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong !',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong !',
                ]
            ]
        ])) {
            //jika entry valid
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->loginUser($username, $password);
            if ($cek_login) {
                //jika login berhasil
                session()->set('f_id', intval($cek_login['f_id']));
                session()->set('f_nama', $cek_login['f_nama']);
                session()->set('f_username', $cek_login['f_username']);
                session()->set('f_foto', $cek_login['f_foto']);
                // session()->set('f_level', $cek_login['f_level']);
                return redirect()->to(base_url('Anggota'));
            } else {
                // jika gagal login krna password atau email salah
                session()->setFlashdata('pesan', 'Username atau Password Salah !');
                return redirect()->to(base_url('Auth/LoginAnggota'));
            }
        } else {
            //jika entry tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/LoginAnggota'));
        }
    }
    public function LogOutAnggota()
    {
        session()->remove('f_id');
        session()->remove('f_nama');
        session()->remove('f_username');
        session()->remove('f_foto');
        session()->setFlashdata('pesan', 'Logout Sukses !');
        return redirect()->to(base_url('Auth/LoginAnggota'));
    }

    public function LogOutAdmin()
    {
        session()->remove('f_id');
        session()->remove('f_nama');
        session()->remove('f_username');
        session()->remove('f_level');
        session()->setFlashdata('pesan', 'Logout Sukses !');
        return redirect()->to(base_url('Auth/LoginAdmin'));
    }
}
