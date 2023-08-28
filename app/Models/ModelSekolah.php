<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSekolah extends Model
{
    public function DetailData()
    {
        return $this->db->table('tbl_sekolah')
            ->where('id_sekolah', 1)
            ->get()->getRowArray();
    }
    public function UpdateData($data)
    {
        $this->db->table('tbl_sekolah')
            ->where('id_sekolah', $data['id_sekolah'])
            ->update($data);
    }
}
