<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblBerita extends Migration
{
    public function up()
    {
        $fields = [
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ];
        $this->forge->addColumn('tbl_berita', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('tbl_berita', 'kategori');
    }
}
