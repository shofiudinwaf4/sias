<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kategoriberita extends Seeder
{

    public function run()
    {
        $data = [
            [
                'nama_kategori'          =>  'Berita',
            ],
            [
                'nama_kategori'          =>  'Prestasi',
            ],
            [
                'nama_kategori'          =>  'Kegiatan',
            ]
        ];


        // Using Query Builder
        $this->db->table('tbl_kategoriBerita')->insertBatch($data);
    }
}
