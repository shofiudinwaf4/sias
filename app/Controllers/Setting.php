<?php

namespace App\Controllers;

use App\Models\ModelBerita;
use App\Models\ModelSekolah;
use App\Models\ModelJurusan;
use App\Models\ModelGuru;
use App\Models\ModelDownload;


class Setting extends BaseController
{
    public function __construct()
    {
        $this->ModelGuru = new ModelGuru();
        $this->ModelJurusan = new ModelJurusan();
        $this->ModelBerita = new ModelBerita();
        $this->ModelDownload = new ModelDownload();
        $this->ModelSekolah = new ModelSekolah();
    }
    public function Logo()
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Logo',
            'menu' => 'setting',
            'submenu' => 'logo',
            'page' => 'setting/v_logo',
            'logo' => $this->ModelSekolah->DetailData()
        ];
        return view('template_admin', $data);
    }
    public function UpdateLogoHeader()
    {
        if ($this->validate([

            'logo_header' => [
                'label' => 'File',
                'rules' => 'max_size[logo_header,2048]|ext_in[logo_header,png]',
                'errors' => [

                    'max_size' => 'Ukuran {field} Maksimal 2084 KB',
                    'ext_in' => 'Jenis {field} harus png',
                ]
            ],

        ])) {
            $sekolah = $this->ModelSekolah->DetailData();
            // $foto_kepsek = $this->request->getFile('logo_dinas');
            // $logo_sekolah = $this->request->getFile('logo_sekolah');
            $logo_header = $this->request->getFile('logo_header');

            if ($logo_header->getError() == 4) {
                $nama_file = $logo_header['logo_header'];
            } else {
                # code...
                $nama_file = $logo_header->getRandomName();
                $logo_header->move('gambar', $nama_file);
            }
            $data = [
                'id_sekolah' => 1,
                // 'logo_sekolah' => $nama_file,
                'logo_header' => $nama_file,
                // 'logo_dinas' => $nama_file,
            ];

            $this->ModelSekolah->UpdateData($data);
            session()->setFlashdata('update', 'Data berhasil diubah');
            return redirect()->to('setting/logo');
            // jika valid
        } else {
            return redirect()->to('setting/logo')->withInput();
        }
    }
    public function UpdateLogoSekolah()
    {
        if ($this->validate([

            'logo_sekolah' => [
                'label' => 'File',
                'rules' => 'max_size[logo_sekolah,2048]|ext_in[logo_sekolah,png]',
                'errors' => [

                    'max_size' => 'Ukuran {field} Maksimal 2084 KB',
                    'ext_in' => 'Jenis {field} harus png',
                ]
            ],

        ])) {
            $sekolah = $this->ModelSekolah->DetailData();
            // $logo_dinas = $this->request->getFile('logo_dinas');
            // $logo_sekolah = $this->request->getFile('logo_sekolah');
            $logo_sekolah = $this->request->getFile('logo_sekolah');

            if ($logo_sekolah->getError() == 4) {
                $nama_file = $logo_sekolah['logo_sekolah'];
            } else {
                # code...
                $nama_file = $logo_sekolah->getRandomName();
                $logo_sekolah->move('gambar', $nama_file);
            }
            $data = [
                'id_sekolah' => 1,
                // 'logo_sekolah' => $nama_file,
                'logo_sekolah' => $nama_file,
                // 'logo_dinas' => $nama_file,
            ];

            $this->ModelSekolah->UpdateData($data);
            session()->setFlashdata('update', 'Data berhasil diubah');
            return redirect()->to('setting/logo');
            // jika valid
        } else {
            return redirect()->to('setting/logo')->withInput();
        }
    }
    public function UpdateLogoDinas()
    {
        if ($this->validate([

            'logo_dinas' => [
                'label' => 'File',
                'rules' => 'max_size[logo_dinas,2048]|ext_in[logo_dinas,png]',
                'errors' => [

                    'max_size' => 'Ukuran {field} Maksimal 2084 KB',
                    'ext_in' => 'Jenis {field} harus png',
                ]
            ],

        ])) {
            $sekolah = $this->ModelSekolah->DetailData();
            // $logo_dinas = $this->request->getFile('logo_dinas');
            // $logo_dinas = $this->request->getFile('logo_dinas');
            $logo_dinas = $this->request->getFile('logo_dinas');

            if ($logo_dinas->getError() == 4) {
                $nama_file = $logo_dinas['logo_dinas'];
            } else {
                # code...
                $nama_file = $logo_dinas->getRandomName();
                $logo_dinas->move('gambar', $nama_file);
            }
            $data = [
                'id_sekolah' => 1,
                // 'logo_dinas' => $nama_file,
                'logo_dinas' => $nama_file,
                // 'logo_dinas' => $nama_file,
            ];

            $this->ModelSekolah->UpdateData($data);
            session()->setFlashdata('update', 'Data berhasil diubah');
            return redirect()->to('setting/logo');
            // jika valid
        } else {
            return redirect()->to('setting/logo')->withInput();
        }
    }
    public function Sekolah()
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Sekolah',
            'menu' => 'setting',
            'submenu' => 'sekolah',
            'page' => 'setting/v_sekolah',
            'sekolah' => $this->ModelSekolah->DetailData()
        ];
        return view('template_admin', $data);
    }
    public function updatesekolah()
    {
        if ($this->validate([
            'nama_sekolah' => [
                'label' => 'Nama Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'alamat_sekolah' => [
                'label' => 'Alamat Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kososng',
                ]
            ],
            'no_telp' => [
                'label' => 'Telpon Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kososng',
                ]
            ],
            'email' => [
                'label' => 'E-Mail Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kososng',
                ]
            ],
            'visimisi_sekolah' => [
                'label' => 'Visi dan Misi Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kososng',
                ]
            ],
            'sejarah_sekolah' => [
                'label' => 'Sejarah Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kososng',
                ]
            ],
        ])) {
            # code...
            $data = [
                'id_sekolah' => 1,
                'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                'alamat_sekolah' => $this->request->getPost('alamat_sekolah'),
                'no_telp' => $this->request->getPost('no_telp'),
                'email' => $this->request->getPost('email'),
                'visimisi_sekolah' => $this->request->getPost('visimisi_sekolah'),
                'sejarah_sekolah' => $this->request->getPost('sejarah_sekolah'),
            ];

            $this->ModelSekolah->UpdateData($data);
            session()->setFlashdata('pesan', 'Data Sekolah berhasil diubah');
            return redirect()->to('setting/sekolah');

            // jika valid
        } else {
            return redirect()->to('setting/sekolah')->withInput();
        }
    }
    public function sambutan()
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Sambutan',
            'menu' => 'setting',
            'submenu' => 'sambutan',
            'page' => 'setting/v_sambutan',
            'sambutan' => $this->ModelSekolah->DetailData()
        ];
        return view('template_admin', $data);
    }
    public function UpdateSambutan()
    {
        if ($this->validate([
            'kepsek' => [
                'label' => 'Nama Kepala Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'sambutan' => [
                'label' => 'Sambutan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kososng',
                ]
            ],
            'foto_kepsek' => [
                'label' => 'Foto Kepala Sekolah',
                'rules' => 'max_size[foto_kepsek,2048]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Maksimal 2084 KB'
                ],
            ]

        ])) {
            $sambutan = $this->ModelSekolah->DetailData();
            $foto_kepsek = $this->request->getFile('foto_kepsek');

            if ($foto_kepsek->getError() == 4) {
                $nama_file = $foto_kepsek['foto_kepsek'];
            } else {
                # code...
                $nama_file = $foto_kepsek->getRandomName();
                $foto_kepsek->move('fotoguru', $nama_file);
            }
            $data = [
                'id_sekolah' => 1,
                'kepsek' => $this->request->getPost('kepsek'),
                'sambutan' => $this->request->getPost('sambutan'),
                'foto_kepsek' => $nama_file,
                // 'foto_kepsek' => $nama_file,
            ];

            $this->ModelSekolah->UpdateData($data);
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to('setting/sambutan');
            // jika valid
        } else {
            return redirect()->to('setting/sambutan')->withInput();
        }
    }
}
