<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rooms extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'comment' => 'nama ruang bisa, diawali dengan nama gedung - lantai - nomor ruangan',
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'berisi info lebih rinci mengenai lokasi ruangan dan rincian lainya',
            ],
            'capacity' => [
                'type' => 'INT',
                'constraint' => 11,
                'comment' => 'kapasitas maksimal mahasiswa dalam sebuah ruangan',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'comment' => 'Waktu pembuatan record',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'on update' => 'CURRENT_TIMESTAMP',
                'comment' => 'Waktu terakhir record diperbarui',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'comment' => 'Waktu record dihapus (soft delete)',
            ],
        ]);
    
        $this->forge->addKey('id', true);
        $this->forge->createTable('rooms');
    }
    
    public function down()
    {
        $this->forge->dropTable('rooms');
    }
    
}
