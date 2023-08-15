<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGuru extends Model
{
    protected $table = 'tbl_guru';
    public function AllData()
    {
        return $this->db->table('tbl_guru')
            ->orderBy('id_guru', 'ASC')
            ->get()->getResultArray();
    }
    public function InsertData($data)
    {
        $this->db->table('tbl_guru')->insert($data);
    }
    public function DetailData($id_guru)
    {
        return $this->db->table('tbl_guru')
            ->where(['id_guru' => $id_guru])
            ->get()->getRowArray();
    }
    public function UpdateData($data)
    {
        $this->db->table('tbl_guru')
            ->where(['id_guru' => $data['id_guru']])
            ->update($data);
    }
    public function DeleteData($data)
    {
        $this->db->table('tbl_guru')
            ->where(['id_guru' => $data['id_guru']])
            ->delete($data);
    }
}
