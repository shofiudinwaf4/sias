<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KategoriBerita extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kategoriBerita' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ]
        ]);
        $this->forge->addKey('id_kategoriBerita', true);
        $this->forge->createTable('tbl_kategoriBerita');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_kategoriBerita');
    }
}
