<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTa;

class Ta extends BaseController
{

    public function __construct()
    {
        $this->ModelTa = new ModelTa();
    }
    public function index()
    {
        $data = [
            'judul' => 'Master-Data',
            'subjudul' => 'Tahun Ajaran',
            'menu' => 'Master-Data',
            'submenu' => 'Tahun Ajaran',
            'page' => 'v_ta',
            'ta' => $this->ModelTa->AllData()
        ];
        return view('template_admin', $data);
    }
    public function InsertData()
    {
        $data = [
            'ta' => $this->request->getPost('ta'),
            'semester' => $this->request->getPost('semester'),
        ];
        $this->ModelTa->InsertData($data);
        session()->setFlashdata('insert', 'Data berhasil ditambah');
        return redirect()->to('ta');
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
