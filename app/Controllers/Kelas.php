<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKelas;

class Kelas extends BaseController
{

    public function __construct()
    {
        $this->ModelKelas = new ModelKelas();
    }
    public function index()
    {
        $data = [
            'judul' => 'Master-Data',
            'subjudul' => 'Kelas',
            'menu' => 'Master-Data',
            'submenu' => 'Kelas',
            'page' => 'v_kelas',
            'kelas' => $this->ModelKelas->AllData()
        ];
        return view('template_admin', $data);
    }
    public function InsertData()
    {
        $data = [
            'kelas' => $this->request->getPost('kelas'),
        ];
        $this->ModelKelas->InsertData($data);
        session()->setFlashdata('insert', 'Data berhasil ditambah');
        return redirect()->to('kelas');
    }
    public function UpdateData($id_kelas)
    {
        $data = [
            'id_kelas' => $id_kelas,
            'kelas' => $this->request->getPost('kelas'),
        ];
        $this->ModelKelas->UpdateData($data);
        session()->setFlashdata('update', 'Data berhasil diubah');
        return redirect()->to('kelas');
    }
    public function DeleteData($id_kelas)
    {
        $data = [
            'id_kelas' => $id_kelas
        ];
        $this->ModelKelas->DeleteData($data);
        session()->setFlashdata('delete', 'Data berhasil dihapus');
        return redirect()->to('kelas');
    }
}
