<?php

namespace App\Controllers;

use App\Models\ModelSekolah;
use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {

        $this->ModelSekolah = new ModelSekolah();
        $this->ModelAuth = new ModelAuth();
    }


    public function index()
    {
        $data = [
            'judul' => 'Home',
            'subjudul' => '',
            'sekolah' => $this->ModelSekolah->DetailData()
        ];
        return view('v_login', $data);
    }
    public function CekLogin()
    {
        // jika login tdk valid
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kososng',
                ]
            ],
            'level' => [
                'label' => 'Level User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kososng',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kososng',
                ]
            ]

        ])) {
            $username = $this->request->getPost('username');
            $level = $this->request->getGetPost('level');
            $password = sha1($this->request->getPost('password'));
            if ($level == 1) {
                $cek = $this->ModelAuth->LoginUser($username, $password);
                if ($cek) {
                    # code...
                    session()->set('level', $cek['nama_user']);
                    session()->set('id_user', $level);
                    session()->set('foto', $cek['foto']);
                    session()->set('nama_user', $cek['nama_user']);
                    return redirect()->to('dashboard');
                } else {
                    session()->setFlashdata('pesan', 'Username atau Password salah');
                    return redirect()->to('login');
                }
            } elseif ($level == 2) {
                $cek = $this->ModelAuth->LoginUser($username, $password);
                if ($cek) {
                    # code...
                    session()->set('level', $cek['nama_user']);
                    session()->set('id_user', $level);
                    session()->set('foto', $cek['foto']);
                    session()->set('nama_user', $cek['nama_user']);
                    return redirect()->to('dashboardStaf');
                } else {
                    session()->setFlashdata('pesan', 'Username atau Password salah');
                    return redirect()->to('login');
                }
            } else {
                return redirect()->to('login');
            }
            // jika valid
        } else {
            return redirect()->to('login')->withInput();
        }
    }

    public function Logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
