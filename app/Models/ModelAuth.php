<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function LoginUser($username, $password)
    {
        return $this->db->table('tbl_user')
            ->where('username', $username)
            ->where('password', $password)
            ->get()->getRowArray();
    }
}
