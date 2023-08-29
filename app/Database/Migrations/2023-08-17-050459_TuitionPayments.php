<?php

namespace App\Database\Migrations;

use App\Enums\TuitionPaymentStatus;
use CodeIgniter\Database\Migration;

class TuitionPayments extends Migration
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
            'payment_at' => [
                'type' => 'DATETIME',
                'comment' => 'menyimpan tanggal pembayaran SPP.',
            ],
            'amount' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'comment' => 'menyimpan jumlah pembayaran SPP.',
            ],
            'receipt_number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'comment' => 'menyimpan nomor kwitansi pembayaran.',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => TuitionPaymentStatus::values(),
                'default' => 'pending',
                'comment' => 'status pembayaran.',
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
        $this->forge->createTable('tuition_payments');
    }
    
    public function down()
    {
        $this->forge->dropTable('tuition_payments');
    }
    
}
