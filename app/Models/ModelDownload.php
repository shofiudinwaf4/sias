<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDownload extends Model
{
    protected $table = 'tbl_download';
    public function AllData()
    {
        return $this->db->table('tbl_download')
            ->get()->getResultArray();
    }
    public function InsertData($data)
    {
        $this->db->table('tbl_download')->insert($data);
    }
    public function DetailData($id_download)
    {
        return $this->db->table('tbl_download')
            ->where(['id_download' => $id_download])
            ->get()->getRowArray();
    }
    public function UpdateData($data)
    {
        $this->db->table('tbl_download')
            ->where(['id_download' => $data['id_download']])
            ->update($data);
    }
    public function DeleteData($data)
    {
        $this->db->table('tbl_download')
            ->where(['id_download' => $data['id_download']])
            ->delete($data);
    }
}
