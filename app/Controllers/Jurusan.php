<?php

namespace App\Controllers;


use App\Models\ModelJurusan;

class Jurusan extends BaseController
{
    public function __construct()
    {
        $this->ModelJurusan = new ModelJurusan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master-Data',
            'subjudul' => 'Jurusan',
            'menu' => 'Master-Data',
            'submenu' => 'Jurusan',
            'page' => 'jurusan/v_jurusan',
            'jurusan' => $this->ModelJurusan->AllData()
        ];
        return view('template_admin', $data);
    }
    public function Input()
    {
        $data = [
            'judul' => 'Jurusan',
            'subjudul' => 'Tambah Jurusan',
            'menu' => 'Master-Data',
            'submenu' => 'Tambah Jurusan',
            'page' => 'jurusan/v_input',
            'jurusan' => $this->ModelJurusan->AllData()
        ];
        return view('template_admin', $data);
    }
    public function InsertData()
    {
        if ($this->validate([
            'kode_jurusan' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kososng',
                ]
            ],
            'jurusan' => [
                'label' => 'Level User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kososng',
                ]
            ],

        ])) {

            $data = [
                'kode_jurusan' => $this->request->getPost('kode_jurusan'),
                'jurusan' => $this->request->getPost('jurusan'),
                'visimisi' => $this->request->getPost('visi_misi'),
            ];
            $this->ModelJurusan->InsertData($data);
            session()->setFlashdata('insert', 'Data berhasil ditambah');
            return redirect()->to('jurusan');

            // jika valid
        } else {
            return redirect()->to('jurusan/input')->withInput();
        }
    }
    public function EditData($id_jurusan)
    {
        $data = [
            'judul' => 'Jurusan',
            'subjudul' => 'Edit Jurusan',
            'menu' => 'Master-Data',
            'submenu' => 'Jurusan',
            'page' => 'jurusan/v_edit',
            'jurusan' => $this->ModelJurusan->DetailData($id_jurusan),
        ];
        return view('template_admin', $data);
    }
    public function UpdateData($id_jurusan)
    {
        if ($this->validate([
            'kode_jurusan' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kososng',
                ]
            ],
            'jurusan' => [
                'label' => 'Level User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kososng',
                ]
            ],

        ])) {

            $data = [
                'id_jurusan' => $id_jurusan,
                'kode_jurusan' => $this->request->getPost('kode_jurusan'),
                'jurusan' => $this->request->getPost('jurusan'),
                'visimisi' => $this->request->getPost('visi_misi'),
            ];
            $this->ModelJurusan->UpdateData($data);
            session()->setFlashdata('update', 'Data berhasil diupdate');
            return redirect()->to('jurusan');

            // jika valid
        } else {
            return redirect()->to('login')->withInput();
        }
    }
    public function DeleteData($id_jurusan)
    {
        $data = [
            'id_jurusan' => $id_jurusan,
        ];
        $this->ModelJurusan->DeleteData($data);
        session()->setFlashdata('delete', 'Data berhasil dihapus');
        return redirect()->to('jurusan');
    }
}
