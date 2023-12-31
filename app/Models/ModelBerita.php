<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBerita extends Model
{
    protected $table = 'tbl_berita';
    protected $tableKategori = 'tbl_kategori';

    public function AllData()
    {
        return $this->db->table('tbl_berita')
            ->join('tbl_kategoriBerita', 'tbl_kategoriBerita.id_kategoriBerita=tbl_berita.id_kategoriBerita', 'LEFT')
            ->orderBy('id_berita', 'ASC')
            ->get()->getResultArray();
    }
    public function Kategori()
    {
        return $this->db->table('tbl_kategoriberita')
            ->orderBy('id_kategoriberita', 'desc')
            ->get()->getResultArray();
    }
    public function AllDataLimit()
    {
        return $this->db->table('tbl_berita')
            ->orderBy('id_berita', 'DESC')
            ->get(5)->getResultArray();
    }
    public function AllDataPrestasi()
    {
        return $this->db->table('tbl_berita')
            ->limit(5)->orderBy('id_berita', 'DESC')
            ->where(['id_kategoriBerita' => 2])
            ->get()->getResultArray();
    }
    public function AllDataPengumuman()
    {
        return $this->db->table('tbl_berita')
            ->limit(1)->orderBy('id_berita', 'DESC')
            ->where(['id_kategoriBerita' => 1])
            ->get()->getResultArray();
    }
    public function AllDataKegiatan()
    {
        return $this->db->table('tbl_berita')
            ->limit(3)->orderBy('id_berita', 'DESC')
            ->where(['id_kategoriBerita' => 3])
            ->get()->getResultArray();
    }
    public function DataLimit()
    {
        return $this->db->table('tbl_berita')
            ->limit(1)->orderBy('id_berita', 'DESC')
            ->get()->getResultArray();
    }
    public function DataByKategori($kategori)
    {
        return $this->table('tbl_berita')
            ->orderBy('id_berita', 'DESC')
            ->where('id_kategoriBerita', $kategori);
    }
    public function InsertData($data)
    {
        $this->db->table('tbl_berita')->insert($data);
    }
    public function DetailData($id_berita)
    {
        return $this->db->table('tbl_berita')
            ->join('tbl_kategoriBerita', 'tbl_kategoriBerita.id_kategoriBerita=tbl_berita.id_kategoriBerita', 'LEFT')
            ->where(['id_berita' => $id_berita])
            ->get()->getRowArray();
    }
    public function ViewBerita($slug_berita)
    {
        return $this->db->table('tbl_berita')
            ->join('tbl_user', 'tbl_user.id_user=tbl_berita.id_user', 'LEFT')
            ->where(['slug_berita' => $slug_berita])
            ->get()->getRowArray();
    }
    public function UpdateData($data)
    {
        $this->db->table('tbl_berita')
            ->where(['id_berita' => $data['id_berita']])
            ->update($data);
    }
    public function DeleteData($data)
    {
        $this->db->table('tbl_berita')
            ->where(['id_berita' => $data['id_berita']])
            ->delete($data);
    }
}
