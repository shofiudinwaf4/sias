<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSlider extends Model
{
    protected $table = 'tbl_slider';
    public function AllData()
    {
        return $this->db->table('tbl_slider')
            ->get()->getResultArray();
    }
    public function AllDataLimit()
    {
        return $this->db->table('tbl_slider')
            ->limit(10)->orderBy('id_slider', 'DESC')
            ->get()->getResultArray();
    }
    public function InsertData($data)
    {
        $this->db->table('tbl_slider')->insert($data);
    }
    public function DetailData($id_slider)
    {
        return $this->db->table('tbl_slider')
            ->where(['id_slider' => $id_slider])
            ->get()->getRowArray();
    }
    public function UpdateData($data)
    {
        $this->db->table('tbl_slider')
            ->where(['id_slider' => $data['id_slider']])
            ->update($data);
    }
    public function DeleteData($data)
    {
        $this->db->table('tbl_slider')
            ->where(['id_slider' => $data['id_slider']])
            ->delete($data);
    }
}
