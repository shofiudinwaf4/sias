<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblBerita extends Migration
{
    public function up()
    {
        $fields = [
            'id_kategoriBerita' => [
                'type' => 'INT',
                'constraint' => '25',
                'null' => false
            ],
        ];
        $this->forge->addColumn('tbl_berita', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('tbl_berita', 'kategori');
    }
}
