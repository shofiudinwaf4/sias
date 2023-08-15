<?php

namespace App\Controllers;


use App\Models\ModelBerita;

class Berita extends BaseController
{
    public function __construct()
    {
        $this->ModelBerita = new ModelBerita();
    }

    public function index()
    {
        $data = [
            'judul' => 'Berita',
            'subjudul' => 'Berita',
            'menu' => 'Berita',
            'submenu' => 'Berita',
            'page' => 'berita/v_berita',
            'berita' => $this->ModelBerita->AllData()
        ];
        return view('template_admin', $data);
    }
    public function View($id_berita)
    {
        $data = [
            'judul' => 'Berita',
            'subjudul' => 'View Berita',
            'menu' => 'Berita',
            'submenu' => '',
            'page' => 'berita/v_view',
            'berita' => $this->ModelBerita->DetailData($id_berita)
        ];
        return view('template_admin', $data);
    }
    public function Input()
    {
        $data = [
            'judul' => 'Berita',
            'subjudul' => 'Tambah Berita',
            'menu' => 'berita',
            'submenu' => 'berita',
            'page' => 'berita/v_input'
        ];
        return view('template_admin', $data);
    }
    public function InsertData()
    {
        if ($this->validate([
            'judul_berita' => [
                'label' => 'Judul Berita',
                'rules' => 'required|is_unique[tbl_berita.judul_berita]',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                    'is_unique' => '{field} Berita ini sudah ada'
                ]
            ],
            'isi_berita' => [
                'label' => 'Isi Berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kososng',
                ]
            ],
            'gambar' => [
                'label' => 'Gambar Berita',
                'rules' => 'uploaded[gambar]|max_size[gambar,2048]',
                'errors' => [
                    'uploaded' => '{field} Tidak boleh kosong',
                    'max_size' => 'Ukuran {field} Maksimal 2084 KB',
                ]
            ],

        ])) {
            $gambar = $this->request->getFile('gambar');
            $nama_file = $gambar->getRandomName();
            $data = [
                'judul_berita' => $this->request->getPost('judul_berita'),
                'slug_berita' => url_title($this->request->getPost('judul_berita'), '-', true),
                'isi_berita' => $this->request->getPost('isi_berita'),
                'id_user' => session()->get('id_user'),
                'tgl_berita' => date('y-m-d'),
                'jam_berita' => date('H:i:s'),
                'gambar' => $nama_file,
            ];
            $gambar->move('gambar', $nama_file);
            $this->ModelBerita->InsertData($data);
            session()->setFlashdata('insert', 'Data berhasil ditambah');
            return redirect()->to('berita');

            // jika valid
        } else {
            return redirect()->to('berita/input')->withInput();
        }
    }
    public function EditData($id_berita)
    {
        $data = [
            'judul' => 'Berita',
            'subjudul' => 'Edit Berita',
            'menu' => 'Berita',
            'submenu' => 'Berita',
            'page' => 'berita/v_edit',
            'berita' => $this->ModelBerita->DetailData($id_berita),
        ];
        return view('template_admin', $data);
    }
    public function UpdateData($id_berita)
    {
        if ($this->validate([
            'judul_berita' => [
                'label' => 'Judul Berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'isi_berita' => [
                'label' => 'Isi Berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kososng',
                ]
            ],
            'gambar' => [
                'label' => 'Gambar Berita',
                'rules' => 'max_size[gambar,2048]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Maksimal 2084 KB',
                ]
            ],

        ])) {
            $berita = $this->ModelBerita->DetailData($id_berita);
            $gambar = $this->request->getFile('gambar');
            if ($gambar->getError() == 4) {
                $nama_file = $berita['gambar'];
            } else {
                # code...
                $nama_file = $gambar->getRandomName();
                $gambar->move('gambar', $nama_file);
            }
            if ($this->request->getPost('judul_lama') == $this->request->getPost('judul_berita')) {
                # code...
                $data = [
                    'id_berita' => $id_berita,
                    'isi_berita' => $this->request->getPost('isi_berita'),
                    'id_user' => session()->get('id_user'),
                    'gambar' => $nama_file,
                ];
            } else {
                # code...
                $data = [
                    'id_berita' => $id_berita,
                    'judul_berita' => $this->request->getPost('judul_berita'),
                    'slug_berita' => url_title($this->request->getPost('judul_berita'), '-', true),
                    'isi_berita' => $this->request->getPost('isi_berita'),
                    'id_user' => session()->get('id_user'),
                    'gambar' => $nama_file,
                ];
            }
            $this->ModelBerita->UpdateData($data);
            session()->setFlashdata('update', 'Data berhasil diubah');
            return redirect()->to('berita');

            // jika valid
        } else {
            return redirect()->to('berita/edit/' . $id_berita)->withInput();
        }
    }
    public function DeleteData($id_berita)
    {
        $berita = $this->ModelBerita->DetailData($id_berita);
        if ($berita['gambar'] <> '') {
            unlink('gambar/' . $berita['gambar']);
        }
        $data = [
            'id_berita' => $id_berita,
        ];
        $this->ModelBerita->DeleteData($data);
        session()->setFlashdata('delete', 'Data berhasil dihapus');
        return redirect()->to('berita');
    }
}
