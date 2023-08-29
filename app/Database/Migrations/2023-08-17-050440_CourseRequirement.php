<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CourseRequirement extends Migration
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
            'course_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => true,
                'unsigned' => true,
                'comment' => 'Foreign key untuk menghubungkan dengan tabel courses',
            ],
            'faculty_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => true,
                'unsigned' => true,
                'comment' => 'Foreign key untuk menghubungkan dengan tabel faculties',
            ],
            'major_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => true,
                'unsigned' => true,
                'comment' => 'Foreign key untuk menghubungkan dengan tabel majors',
            ],
            'is_mandatory' => [
                'type' => 'BOOLEAN',
                'null' => true,
                'comment' => 'Menandakan apakah mata kuliah ini wajib atau pilihan',
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
        $this->forge->addForeignKey('course_id', 'courses', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('faculty_id', 'faculties', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('major_id', 'majors', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('course_requirements');
    }

    public function down()
    {
        $this->forge->dropTable('course_requirements');
    }
}

