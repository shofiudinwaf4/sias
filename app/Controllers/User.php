<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }
    public function index()
    {
        $data = [
            'judul' => 'Master-Data',
            'subjudul' => 'User',
            'menu' => 'Master-Data',
            'submenu' => 'User',
            'page' => 'user/v_user',
            'user' => $this->ModelUser->AllData()
        ];
        return view('template_admin', $data);
    }
    public function Input()
    {
        $data = [
            'judul' => 'Master-Data',
            'subjudul' => 'Input Data User',
            'menu' => 'Master-Data',
            'submenu' => 'User',
            'page' => 'user/v_input',
        ];
        return view('template_admin', $data);
    }
    public function InsertData()
    {
        if (!$this->validate([
            'kode_guru' => [
                'label' => 'Kode Guru',
                'rules' => 'required|is_unique[tbl_guru.kode_guru]',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                    'is_unique' => '{field} Kode ini sudah dipakai'
                ]
            ],
            'nik' => [
                'label' => 'NIK',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'nama_guru' => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'tempat_lahir' => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],

            'tgl_lahir' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'jk' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'telp_guru' => [
                'label' => 'Telpon Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'pendidikan' => [
                'label' => 'Pendidikan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'prodi' => [
                'label' => 'Program Studi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'foto_guru' => [
                'label' => 'Foto Guru',
                'rules' => 'uploaded[foto_guru]|max_size[foto_guru,2048]',
                'errors' => [
                    'uploaded' => '{field} Tidak boleh kosong',
                    'max_size' => 'Ukuran {field} Maksimal 2084 KB',
                ]
            ],

        ])) {
            return redirect()->to('guru/input')->withInput();
        } else {
            $foto = $this->request->getFile('foto_guru');
            $nama_file = $foto->getRandomName();
            $data = [
                'kode_guru' => $this->request->getPost('kode_guru'),
                'nik' => $this->request->getPost('nik'),
                'nama_guru' => $this->request->getPost('nama_guru'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'jk' => $this->request->getPost('jk'),
                'telp_guru' => $this->request->getPost('telp_guru'),
                'pendidikan' => $this->request->getPost('pendidikan'),
                'prodi' => $this->request->getPost('prodi'),
                'password' => sha1('12345'),
                'foto_guru' => $nama_file,
            ];
            $foto->move('fotoguru', $nama_file);
            $this->ModelGuru->InsertData($data);
            session()->setFlashdata('insert', 'Data berhasil ditambah');
            return redirect()->to('guru');
        }
        // jika valid

        // else {
        //     return redirect()->to('guru/input')->withInput();
        // }
    }
    public function EditData($id_guru)
    {
        $data = [
            'judul' => 'Master-Data',
            'subjudul' => 'Edit Data Guru',
            'menu' => 'Master-Data',
            'submenu' => 'Guru',
            'page' => 'guru/v_edit',
            'guru' => $this->ModelGuru->DetailData($id_guru)
        ];
        return view('template_admin', $data);
    }
    public function UpdateData($id_guru)
    {
        if ($this->validate([
            'nik' => [
                'label' => 'NIK',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'nama_guru' => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'tempat_lahir' => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'tgl_lahir' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'jk' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'telp_guru' => [
                'label' => 'Telpon Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'pendidikan' => [
                'label' => 'Pendidikan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'prodi' => [
                'label' => 'Program Studi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'foto_guru' => [
                'label' => 'Foto Guru',
                'rules' => 'max_size[foto_guru,2048]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Maksimal 2084 KB',
                ]
            ],

        ])) {
            $guru = $this->ModelGuru->DetailData($id_guru);
            $foto = $this->request->getFile('foto_guru');
            if ($foto->getError() == 4) {
                // jika gambar tidak diganti
                $nama_file = $guru['foto_guru'];
            } else {
                // jika data diganti
                $nama_file = $foto->getRandomName();
                $foto->move('fotoguru', $nama_file);
            }

            $data = [
                'id_guru' => $id_guru,
                'kode_guru' => $this->request->getPost('kode_guru'),
                'nik' => $this->request->getPost('nik'),
                'nama_guru' => $this->request->getPost('nama_guru'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'jk' => $this->request->getPost('jk'),
                'telp_guru' => $this->request->getPost('telp_guru'),
                'pendidikan' => $this->request->getPost('pendidikan'),
                'prodi' => $this->request->getPost('prodi'),
                'password' => sha1('12345'),
                'foto_guru' => $nama_file,
            ];
            $this->ModelGuru->updatedata($data);
            session()->setFlashdata('update', 'Data berhasil diubah');
            return redirect()->to('guru');

            // jika valid
        } else {
            return redirect()->to('guru/editdata/' . $id_guru)->withInput();
        }
    }
    public function DeleteData($id_guru)
    {
        $guru = $this->ModelGuru->DetailData($id_guru);
        if ($guru['foto_guru'] <> '') {
            unlink('fotoguru/' . $guru['foto_guru']);
        }
        $data = [
            'id_guru' => $id_guru,
        ];
        $this->ModelGuru->DeleteData($data);
        session()->setFlashdata('delete', 'Data berhasil dihapus');
        return redirect()->to('guru');
    }
}
