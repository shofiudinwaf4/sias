<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelMapel;

class Mapel extends BaseController
{

    public function __construct()
    {
        $this->ModelMapel = new ModelMapel();
    }
    public function index()
    {
        $data = [
            'judul' => 'Master-Data',
            'subjudul' => 'Mata Pelajaran',
            'menu' => 'Master-Data',
            'submenu' => 'mapel',
            'page' => 'v_mapel',
            'mapel' => $this->ModelMapel->AllData()
        ];
        return view('template_admin', $data);
    }
    public function InsertData()
    {
        $data = [
            'kode_mapel' => $this->request->getPost('kode'),
            'mapel' => $this->request->getPost('mapel'),
        ];
        $this->ModelMapel->InsertData($data);
        session()->setFlashdata('insert', 'Data berhasil ditambah');
        return redirect()->to('mapel');
    }
    public function UpdateData($id_mapel)
    {
        $data = [
            'id_mapel' => $id_mapel,
            'mapel' => $this->request->getPost('mapel'),
        ];
        $this->ModelMapel->UpdateData($data);
        session()->setFlashdata('update', 'Data berhasil diubah');
        return redirect()->to('mapel');
    }
    public function DeleteData($id_mapel)
    {
        $data = [
            'id_mapel' => $id_mapel
        ];
        $this->ModelMapel->DeleteData($data);
        session()->setFlashdata('delete', 'Data berhasil dihapus');
        return redirect()->to('mapel');
    }
}
