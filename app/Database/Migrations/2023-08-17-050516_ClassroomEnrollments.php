<?php

namespace App\Database\Migrations;

use App\Enums\ClassroomEnrollmentStatus;
use CodeIgniter\Database\Migration;

class ClassroomEnrollments extends Migration
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
            'remarks' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'Kolom ini digunakan untuk menyimpan catatan atau keterangan tambahan terkait status pendaftaran mahasiswa ke dalam kelas. Misalnya, alasan penolakan pendaftaran jika statusnya `rejected`, atau pesan persetujuan jika statusnya `approved`.',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ClassroomEnrollmentStatus::values(), // Anda mungkin perlu mengganti ini dengan nilai aktual dari ClassroomEnrollmentStatus::values()
                'comment' => 'menyimpan status registrasi, seperti `pending` (menunggu persetujuan), `approved` (disetujui), atau `rejected` (ditolak).',
            ],
            'season_id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
            ],
            'classroom_id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
            ],
            'student_id' => [
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
        $this->forge->addForeignKey('classroom_id', 'classrooms', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('student_id', 'students', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('classroom_enrollments');
    }

    public function down()
    {
        $this->forge->dropTable('classroom_enrollments');
    }
}
