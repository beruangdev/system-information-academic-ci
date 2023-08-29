<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ClassroomSessions extends Migration
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
            'start_datetime' => [
                'type' => 'DATETIME',
                'comment' => 'menyimpan tanggal dan jam dimulainya sesi kelas',
            ],
            'end_datetime' => [
                'type' => 'DATETIME',
                'comment' => 'menyimpan tanggal dan jam berakhirnya sesi kelas',
            ],
            'attendance_code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'comment' => 'menyimpan kode unik atau token yang digunakan mahasiswa untuk mencatat kehadiran secara otomatis atau online. Kode ini dapat dihasilkan secara acak untuk setiap sesi kelas.',
            ],
            'topic' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'menyimpan topik atau materi yang akan dibahas dalam sesi tersebut.',
            ],
            'classroom_id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
            ],
            'season_id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
            ],
            'lecturer_id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
            ],
            'room_id' => [
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
        $this->forge->addForeignKey('classroom_id', 'classrooms', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('season_id', 'seasons', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('lecturer_id', 'lecturers', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('room_id', 'rooms', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('classroom_sessions');
    }

    public function down()
    {
        $this->forge->dropTable('classroom_sessions');
    }
}
