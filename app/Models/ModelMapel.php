<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMapel extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_mapel')
            ->get()->getResultArray();
    }
    public function InsertData($data)
    {
        $this->db->table('tbl_mapel')->insert($data);
    }
    public function DetailData($id_mapel)
    {
        return $this->db->table('tbl_mapel')
            ->where(['id_mapel' => $id_mapel])
            ->get()->getRowArray();
    }
    public function UpdateData($data)
    {
        $this->db->table('tbl_mapel')
            ->where(['id_mapel' => $data['id_mapel']])
            ->update($data);
    }
    public function DeleteData($data)
    {
        $this->db->table('tbl_mapel')
            ->where(['id_mapel' => $data['id_mapel']])
            ->delete($data);
    }
}
