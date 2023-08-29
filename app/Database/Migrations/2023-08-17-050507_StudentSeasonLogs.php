<?php

namespace App\Database\Migrations;

use App\Enums\StudentStatus;
use CodeIgniter\Database\Migration;

class StudentSeasonLogs extends Migration
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
            'status' => [
                'type' => 'ENUM',
                'constraint' => StudentStatus::values(),
                'comment' => 'status mahasiswa dalam season tersebut, bisa berupa `active` untuk mahasiswa aktif, `inactive` untuk mahasiswa yang tidak aktif, `graduate` untuk mahasiswa yang telah lulus, dan `dropout` untuk mahasiswa yang telah drop out dari universitas',
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'deskripsi atau catatan tambahan mengenai log kegiatan mahasiswa pada season tersebut',
            ],
            'student_id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
            ],
            'season_id' => [
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
        $this->forge->addForeignKey('student_id', 'students', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('season_id', 'seasons', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('student_season_logs');
    }

    public function down()
    {
        $this->forge->dropTable('student_season_logs');
    }
}
