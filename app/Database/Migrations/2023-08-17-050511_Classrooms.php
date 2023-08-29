<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Classrooms extends Migration
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
                'comment' => 'misalnya "Kelas A", "Kelas B", dst.',
            ],
            'capacity' => [
                'type' => 'INT',
                'comment' => 'Kapasitas maksimum mahasiswa dalam kelas.',
            ],
            'credits' => [
                'type' => 'INT',
                'comment' => 'menyimpan nilai jumlah kredit atau sks (sistem kredit semester) dari mata kuliah',
            ],
            'season_id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
            ],
            'course_id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
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

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('season_id', 'seasons', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('course_id', 'courses', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('classrooms');
    }

    public function down()
    {
        $this->forge->dropTable('classrooms');
    }
}
