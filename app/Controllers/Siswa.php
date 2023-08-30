<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSiswa;
use App\Models\ModelJurusan;
use App\Models\ModelKelas;

class Siswa extends BaseController
{
    public function __construct()
    {
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelJurusan = new ModelJurusan();
        $this->ModelKelas = new ModelKelas();
    }
    public function index()
    {
        $data = [
            'judul' => 'Master-Data',
            'subjudul' => 'Siswa',
            'menu' => 'Master-Data',
            'submenu' => 'Siswa',
            'page' => 'siswa/v_siswa',
            'siswa' => $this->ModelSiswa->AllData()
        ];
        return view('template_admin', $data);
    }
    public function Input()
    {
        $data = [
            'judul' => 'Master-Data',
            'subjudul' => 'Input Data Siswa',
            'menu' => 'Master-Data',
            'submenu' => 'Siswa',
            'page' => 'siswa/v_input',
            'jurusan' => $this->ModelJurusan->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
        ];
        return view('template_admin', $data);
    }
    public function InsertData()
    {
        if ($this->validate([
            'nisn' => [
                'label' => 'NISN',
                'rules' => 'required|is_unique[tbl_siswa.nisn]',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                    'is_unique' => '{field} Kode ini sudah dipakai'
                ]
            ],
            'nama_siswa' => [
                'label' => 'Nama Siswa',
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
            'id_jurusan' => [
                'label' => 'Jurusan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'id_kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'angkatan' => [
                'label' => 'Tahun Angkatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'foto' => [
                'label' => 'Foto Siswa',
                'rules' => 'max_size[foto,2048]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Maksimal 2084 KB',
                ]
            ],

        ])) {
            $foto_siswa = $this->request->getFile('foto');
            if ($foto_siswa->getError() == 4) {
                $nama_file = 'default.jpg';
            } else {
                // ambil nama file
                $nama_file = $foto_siswa->getRandomName();
                $foto_siswa->move('fotosiswa', $nama_file);
            }
            $data = [
                'nisn' => $this->request->getPost('nisn'),
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'jk' => $this->request->getPost('jk'),
                'id_kelas' => $this->request->getPost('id_kelas'),
                'id_jurusan' => $this->request->getPost('id_jurusan'),
                'angkatan' => $this->request->getPost('angkatan'),
                'password' => sha1('12345'),
                'status' => 1,
                'foto' => $nama_file,
            ];
            $this->ModelSiswa->InsertData($data);
            session()->setFlashdata('insert', 'Data berhasil ditambah');
            return redirect()->to('siswa');
        }
        // jika valid

        else {
            return redirect()->to('siswa/input')->withInput();
        }
    }
    public function EditData($id_siswa)
    {
        $data = [
            'judul' => 'Master-Data',
            'subjudul' => 'Edit Data Siswa',
            'menu' => 'Master-Data',
            'submenu' => 'Siswa',
            'page' => 'siswa/v_edit',
            'jurusan' => $this->ModelJurusan->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
            'siswa' => $this->ModelSiswa->DetailData($id_siswa)
        ];
        return view('template_admin', $data);
    }
    public function UpdateData($id_siswa)
    {
        if ($this->validate([
            'nisn' => [
                'label' => 'NISN',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'nama_siswa' => [
                'label' => 'Nama Siswa',
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
            'id_jurusan' => [
                'label' => 'Jurusan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'id_kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'angkatan' => [
                'label' => 'Tahun Angkatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'foto' => [
                'label' => 'Foto Siswa',
                'rules' => 'max_size[foto,2048]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Maksimal 2084 KB',
                ]
            ],

        ])) {
            $siswa = $this->ModelSiswa->DetailData($id_siswa);
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                // jika gambar tidak diganti
                $nama_file = $siswa['foto'];
            } else {
                // jika data diganti
                $nama_file = $foto->getRandomName();
                $foto->move('fotosiswa', $nama_file);
            }
            $data = [
                'id_siswa' => $id_siswa,
                'nisn' => $this->request->getPost('nisn'),
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'jk' => $this->request->getPost('jk'),
                'id_kelas' => $this->request->getPost('id_kelas'),
                'id_jurusan' => $this->request->getPost('id_jurusan'),
                'angkatan' => $this->request->getPost('angkatan'),
                'password' => sha1('12345'),
                'status' => 1,
                'foto' => $nama_file,
            ];
            $this->ModelSiswa->updatedata($data);
            session()->setFlashdata('update', 'Data berhasil ditambah');
            return redirect()->to('siswa');
        }
        // jika valid

        else {
            return redirect()->to('siswa/editdata/' . $id_siswa)->withInput();
        }
    }
    public function DeleteData($id_siswa)
    {
        $siswa = $this->ModelSiswa->DetailData($id_siswa);
        if ($siswa['foto'] <> '') {
            unlink('fotosiswa/' . $siswa['foto']);
        }
        $data = [
            'id_siswa' => $id_siswa,
        ];
        $this->ModelSiswa->DeleteData($data);
        session()->setFlashdata('delete', 'Data berhasil dihapus');
        return redirect()->to('siswa');
    }
}
