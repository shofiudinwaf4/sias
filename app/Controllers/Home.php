<?php

namespace App\Controllers;

use App\Models\ModelBerita;
use App\Models\ModelSekolah;
use App\Models\ModelJurusan;
use App\Models\ModelGuru;
use App\Models\ModelDownload;
use App\Models\ModelSlider;


class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelGuru = new ModelGuru();
        $this->ModelJurusan = new ModelJurusan();
        $this->ModelBerita = new ModelBerita();
        $this->ModelDownload = new ModelDownload();
        $this->ModelSekolah = new ModelSekolah();
        $this->ModelSlider = new ModelSlider();
    }

    public function index()
    {
        $data = [
            'judul' => 'Home',
            'subjudul' => '',
            'page' => 'v_home',
            'slider' => $this->ModelSlider->AllData(),
            'web' => $this->ModelSekolah->DetailData(),
            'berita' => $this->ModelBerita->AllDataPengumuman(),
            'kegiatan' => $this->ModelBerita->AllDataKegiatan(),
            'prestasi' => $this->ModelBerita->AllDataPrestasi(),
            'kategoriBerita' => $this->ModelBerita->Kategori(),
            'pager' => $this->ModelBerita->pager,
            'beritabaru' => $this->ModelBerita->AllDataLimit(),
        ];
        return view('template_front_end', $data);
    }
    public function DetailJurusan($id_jurusan)
    {
        $data = [
            'judul' => 'Jurusan',
            'subjudul' => '',
            'jurusan' => $this->ModelJurusan->DetailData($id_jurusan),
            'kategoriBerita' => $this->ModelBerita->Kategori(),
            'page' => 'front-end/v_detail_jurusan'
        ];
        return view('template_front_end', $data);
    }
    public function Berita()
    {
        $data = [
            'judul' => 'Berita',
            'subjudul' => '',
            'page' => 'front-end/v_berita',
            'kategoriBerita' => $this->ModelBerita->Kategori(),
            'berita' => $this->ModelBerita->paginate(2, 'berita'),
            'pager' => $this->ModelBerita->pager,
            'beritabaru' => $this->ModelBerita->AllDataLimit()
        ];
        return view('template_front_end', $data);
    }

    public function ViewBerita($slug_berita)
    {
        $data = [
            'judul' => 'Berita',
            'subjudul' => 'View Berita',
            'page' => 'front-end/v_view_berita',
            'kategoriBerita' => $this->ModelBerita->Kategori(),
            'berita' => $this->ModelBerita->ViewBerita($slug_berita),
            'beritabaru' => $this->ModelBerita->AllDataLimit()
        ];
        return view('template_front_end', $data);
    }
    public function ViewKategori($kategori)
    {
        $kategori1 = $this->ModelBerita->DataByKategori($kategori);
        $data = [
            'judul' => 'Berita',
            'subjudul' => 'View Berita',
            'page' => 'front-end/v_kategoriberita',
            'kategoriBerita' => $this->ModelBerita->Kategori(),
            'kategori' => $kategori1->paginate(2, 'kategori'),
            'pager' => $this->ModelBerita->pager,
            'beritabaru' => $this->ModelBerita->AllDataLimit()
        ];
        return view('template_front_end', $data);
    }
    public function Guru()
    {
        $data = [
            'judul' => 'Daftar Guru',
            'subjudul' => '',
            'page' => 'front-end/v_guru',
            'kategoriBerita' => $this->ModelBerita->Kategori(),
            'guru' => $this->ModelGuru->paginate(12, 'guru'),
            'pager' => $this->ModelGuru->pager,

        ];
        return view('template_front_end', $data);
    }
    public function Download()
    {
        $data = [
            'judul' => 'Download',
            'subjudul' => '',
            'page' => 'front-end/v_download',
            'kategoriBerita' => $this->ModelBerita->Kategori(),
            'download' => $this->ModelDownload->paginate(10, 'download'),
            'pager' => $this->ModelDownload->pager,

        ];
        return view('template_front_end', $data);
    }
    public function Sejarah()
    {
        $data = [
            'judul' => 'Sejarah',
            'subjudul' => '',
            'page' => 'front-end/v_sejarah',
            'kategoriBerita' => $this->ModelBerita->Kategori(),
            'sejarah' => $this->ModelSekolah->DetailData()
        ];
        return view('template_front_end', $data);
    }
    public function Visimisi()
    {
        $data = [
            'judul' => 'Visi dan Misi',
            'subjudul' => '',
            'page' => 'front-end/v_visimisi',
            'kategoriBerita' => $this->ModelBerita->Kategori(),
            'visimisi' => $this->ModelSekolah->DetailData()
        ];
        return view('template_front_end', $data);
    }
    public function Sambutan()
    {
        $data = [
            'judul' => 'sambutan',
            'subjudul' => '',
            'page' => 'front-end/v_sambutan',
            'kategoriBerita' => $this->ModelBerita->Kategori(),
            'sambutan' => $this->ModelSekolah->DetailData()
        ];
        return view('template_front_end', $data);
    }
}
