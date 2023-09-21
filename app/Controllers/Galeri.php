<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGaleri;


class Galeri extends BaseController
{
    public function __construct()
    {
        $this->ModelGaleri = new ModelGaleri();
    }

    public function index()
    {
        $data = [
            'judul' => 'Galeri',
            'subjudul' => 'Galeri',
            'menu' => 'Galeri',
            'submenu' => 'Galeri',
            'page' => 'galeri/v_galeri',
            'galeri' => $this->ModelGaleri->AllData()
        ];
        return view('template_admin', $data);
    }
    public function File($id_download)
    {
        $download = $this->ModelDownload->DetailData($id_download);
        return $this->response->download('file/' . $download['file_download'], null);
    }
    public function Input()
    {
        $data = [
            'judul' => 'Master-Data',
            'subjudul' => 'Input Data Download',
            'menu' => 'Master-Data',
            'submenu' => 'Download',
            'page' => 'download/v_input',

        ];
        return view('template_admin', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'nama_file' => [
                'label' => 'Nama File',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'file_download' => [
                'label' => 'File',
                'rules' => 'uploaded[file_download]|max_size[file_download,2048]|ext_in[file_download,pdf,doc,docx,xls,xlsx,ppt,pptx]',
                'errors' => [
                    'uploaded' => '{field} Tidak boleh kososng',
                    'max_size' => 'Ukuran {field} Maksimal 2084 KB',
                    'ext_in' => 'Jenis {field} harus pdf, word, excel, power point',
                ]
            ],

        ])) {
            $file_download = $this->request->getFile('file_download');
            $nama_file = $file_download->getName();
            $data = [
                'nama_file' => $this->request->getPost('nama_file'),
                'file_download' => $nama_file,
            ];
            $file_download->move('file', $nama_file);
            $this->ModelDownload->InsertData($data);
            session()->setFlashdata('insert', 'Data berhasil ditambah');
            return redirect()->to('download');

            // jika valid
        } else {
            return redirect()->to('download/input')->withInput();
        }
    }
    public function EditData($id_download)
    {
        $data = [
            'judul' => 'Master-Data',
            'subjudul' => 'Edit Data Download',
            'menu' => 'Master-Data',
            'submenu' => 'Download',
            'page' => 'download/v_edit',
            'download' => $this->ModelDownload->DetailData($id_download),

        ];
        return view('template_admin', $data);
    }

    public function UpdateData($id_download)
    {
        if ($this->validate([
            'nama_file' => [
                'label' => 'Nama File',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'file_download' => [
                'label' => 'File',
                'rules' => 'max_size[file_download,2048]|ext_in[file_download,pdf,doc,docx,xls,xlsx,ppt,pptx]',
                'errors' => [

                    'max_size' => 'Ukuran {field} Maksimal 2084 KB',
                    'ext_in' => 'Jenis {field} harus pdf, word, excel, power point',
                ]
            ],

        ])) {
            $download = $this->ModelDownload->DetailData($id_download);
            $file_download = $this->request->getFile('file_download');
            if ($file_download->getError() == 4) {
                $nama_file_edit = $download['file_download'];
            } else {
                # code...
                $nama_file_edit = $file_download->getName();
                $file_download->move('file', $nama_file_edit);
            }
            $data = [
                'id_download' => $id_download,
                'nama_file' => $this->request->getPost('nama_file'),
                'file_download' => $nama_file_edit,
            ];

            $this->ModelDownload->UpdateData($data);
            session()->setFlashdata('update', 'Data berhasil diubah');
            return redirect()->to('download');
            // jika valid
        } else {
            return redirect()->to('download/editdata/' . $id_download)->withInput();
        }
    }
    public function DeleteData($id_download)
    {
        $download = $this->ModelDownload->DetailData($id_download);
        if ($download['file_download'] <> '') {
            unlink('file/' . $download['file_download']);
        }
        $data = [
            'id_download' => $id_download,
        ];
        $this->ModelDownload->DeleteData($data);
        session()->setFlashdata('delete', 'Data berhasil dihapus');
        return redirect()->to('download');
    }
}
