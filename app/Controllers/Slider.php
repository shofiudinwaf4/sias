<?php

namespace App\Controllers;


use App\Models\ModelSlider;

class Slider extends BaseController
{
    public function __construct()
    {
        $this->ModelSlider = new ModelSlider();
    }

    public function index()
    {
        $data = [
            'judul' => 'Slider',
            'subjudul' => 'Slider',
            'menu' => 'Slider',
            'submenu' => 'Slider',
            'page' => 'slider/v_slider',
            'slider' => $this->ModelSlider->AllData(),
        ];
        return view('template_admin', $data);
    }
    public function Input()
    {
        $data = [
            'judul' => 'Slider',
            'subjudul' => 'Tambah Slider',
            'menu' => 'slider',
            'submenu' => 'slider',
            'page' => 'slider/v_input'
        ];
        return view('template_admin', $data);
    }
    public function InsertData()
    {
        if ($this->validate([
            'judul_slider' => [
                'label' => 'Judul Slider',
                'rules' => 'required|is_unique[tbl_slider.judul_slider]',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                    'is_unique' => '{field} Slider ini sudah ada'
                ]
            ],
            'deskripsi_slider' => [
                'label' => 'Isi Slider',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kososng',
                ]
            ],
            'gambar_slider' => [
                'label' => 'Gambar Slider',
                'rules' => 'uploaded[gambar_slider]|max_size[gambar_slider,2048]',
                'errors' => [
                    'uploaded' => '{field} Tidak boleh kososng',
                    'max_size' => 'Ukuran {field} Maksimal 2084 KB',
                ]
            ],

        ])) {
            $gambar_slider = $this->request->getFile('gambar_slider');
            $nama_file = $gambar_slider->getRandomName();
            $data = [
                'judul_slider' => $this->request->getPost('judul_slider'),
                'deskripsi_slider' => $this->request->getPost('deskripsi_slider'),
                'gambar_slider' => $nama_file,
            ];
            $gambar_slider->move('gambar', $nama_file);
            $this->ModelSlider->InsertData($data);
            session()->setFlashdata('insert', 'Data berhasil ditambah');
            return redirect()->to('slider');

            // jika valid
        } else {
            return redirect()->to('slider/input')->withInput();
        }
    }
    public function EditData($id_slider)
    {
        $data = [
            'judul' => 'Slider',
            'subjudul' => 'Edit Slider',
            'menu' => 'Slider',
            'submenu' => 'Slider',
            'page' => 'slider/v_edit',
            'slider' => $this->ModelSlider->DetailData($id_slider),
        ];
        return view('template_admin', $data);
    }
    public function UpdateData($id_slider)
    {
        if ($this->validate([
            'judul_slider' => [
                'label' => 'Judul Slider',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'deskripsi_slider' => [
                'label' => 'Deskripsi Slider',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kososng',
                ]
            ],
            'gambar_slider' => [
                'label' => 'Gambar Slider',
                'rules' => 'max_size[gambar_slider,2048]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Maksimal 2084 KB',
                ]
            ],

        ])) {
            $slider = $this->ModelSlider->DetailData($id_slider);
            $gambar_slider = $this->request->getFile('gambar_slider');
            if ($gambar_slider->getError() == 4) {
                $nama_file = $slider['gambar_slider'];
            } else {
                # code...
                $nama_file = $gambar_slider->getRandomName();
                $gambar_slider->move('gambar', $nama_file);
            }
            if ($this->request->getPost('judul_lama') == $this->request->getPost('judul_slider')) {
                # code...
                $data = [
                    'id_slider' => $id_slider,
                    'deskripsi_slider' => $this->request->getPost('deskripsi_slider'),
                    'gambar_slider' => $nama_file,
                ];
            } else {
                # code...
                $data = [
                    'id_slider' => $id_slider,
                    'judul_slider' => $this->request->getPost('judul_slider'),
                    'deskripsi_slider' => $this->request->getPost('deskripsi_slider'),
                    'gambar_slider' => $nama_file,
                ];
            }
            $this->ModelSlider->UpdateData($data);
            session()->setFlashdata('update', 'Data berhasil diubah');
            return redirect()->to('slider');

            // jika valid
        } else {
            return redirect()->to('slider/editdata/' . $id_slider)->withInput();
        }
    }
    public function DeleteData($id_slider)
    {
        $slider = $this->ModelSlider->DetailData($id_slider);
        if ($slider['gambar_slider'] <> '') {
            unlink('gambar/' . $slider['gambar_slider']);
        }
        $data = [
            'id_slider' => $id_slider,
        ];
        $this->ModelSlider->DeleteData($data);
        session()->setFlashdata('delete', 'Data berhasil dihapus');
        return redirect()->to('slider');
    }
}
