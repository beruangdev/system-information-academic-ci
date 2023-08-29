<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Seasons extends Migration
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
                'comment' => 'misal: `2023/2024`, `2024/2025`, dst.',
            ],
            'start_date' => [
                'type' => 'DATE',
            ],
            'end_date' => [
                'type' => 'DATE',
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
        $this->forge->createTable('seasons');
    }
    
    public function down()
    {
        $this->forge->dropTable('seasons');
    }
    
}
