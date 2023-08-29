<?php

namespace App\Database\Migrations;

use App\Enums\Gender;
use App\Enums\StudentStatus;
use CodeIgniter\Database\Migration;

class Students extends Migration
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
            'current_credits' => [
                'type' => 'INT',
                'default' => 0,
                'comment' => 'Untuk menghitung jumlah kredit atau sks yang telah diambil oleh setiap mahasiswa pada semester saat ini.',
            ],
            'admission_year' => [
                'type' => 'INT',
                'comment' => 'menyimpan tahun masuk mahasiswa',
            ],
            'date_of_birth' => [
                'type' => 'DATE',
                'null' => true,
                'comment' => 'tanggal lahir mahasiswa',
            ],
            'gender' => [
                'type' => 'ENUM',
                'constraint' => Gender::values(),
                'null' => true,
                'comment' => 'jenis kelamin mahasiswa',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => StudentStatus::values(),
                'null' => true,
                'comment' => 'status keaktifan mahasiswa dalam sistem',
            ],
            'address' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'alamat mahasiswa',
            ],
            'phone_number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'comment' => 'nomor telepon mahasiswa',
            ],
            'guardian_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'comment' => 'nama wali mahasiswa',
            ],
            'guardian_phone_number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'comment' => 'nomor telepon wali mahasiswa',
            ],
            'blood_type' => [
                'type' => 'VARCHAR',
                'constraint' => 3,
                'null' => true,
                'comment' => 'golongan darah mahasiswa',
            ],
            'tuition_fee' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'null' => true,
                'comment' => 'menyimpan besaran SPP untuk mahasiswa',
            ],
            'user_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'unique' => true,
                'comment' => 'merupakan foreign key yang mengacu pada tabel `users`',
            ],
            'faculty_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'comment' => 'menyimpan foreign key untuk menghubungkan data mahasiswa dengan fakultas',
            ],
            'major_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'comment' => 'menyimpan foreign key untuk menghubungkan data mahasiswa dengan jurusan',
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
        $this->forge->addForeignKey('faculty_id', 'faculties', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('major_id', 'majors', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('students');
    }
    
    public function down()
    {
        $this->forge->dropTable('students');
    }
    
}
