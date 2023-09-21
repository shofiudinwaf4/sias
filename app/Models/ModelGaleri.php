<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGaleri extends Model
{
    protected $table = 'tbl_galeri';
    public function AllData()
    {
        return $this->db->table('tbl_galeri')
            ->get()->getResultArray();
    }
    public function InsertData($data)
    {
        $this->db->table('tbl_galeri')->insert($data);
    }
    public function DetailData($id_galeri)
    {
        return $this->db->table('tbl_galeri')
            ->where(['id_galeri' => $id_galeri])
            ->get()->getRowArray();
    }
    public function UpdateData($data)
    {
        $this->db->table('tbl_galeri')
            ->where(['id_galeri' => $data['id_galeri']])
            ->update($data);
    }
    public function DeleteData($data)
    {
        $this->db->table('tbl_galeri')
            ->where(['id_galeri' => $data['id_galeri']])
            ->delete($data);
    }
}
