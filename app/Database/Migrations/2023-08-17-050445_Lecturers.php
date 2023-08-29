<?php

namespace App\Database\Migrations;

use App\Enums\LecturerStatus;
use CodeIgniter\Database\Migration;

class Lecturers extends Migration
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
            'position' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'comment' => 'menjelaskan dirinya dikampus, seperti asisten dosen, dosen atau dosen senior',
            ],
            'specialization' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'comment' => 'spesialisasi dari dosen ini',
            ],
            'phone_number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'comment' => 'nomor telepon dosen',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => LecturerStatus::values(), // Anda mungkin perlu mengganti ini dengan nilai aktual dari LecturerStatus::values()
                'null' => true,
                'comment' => 'status keaktifan dosen dalam sistem',
            ],
            'user_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'comment' => 'merupakan foreign key yang mengacu pada tabel `users`',
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
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('lecturers');
    }

    public function down()
    {
        $this->forge->dropTable('lecturers');
    }
}
