<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class DegreeSeeder extends Seeder
{
    public function run()
    {
        $degreeNames = [
            "Diploma",
            "Sarjana",
            "Magister",
            "Doktor",
            "Profesi dan Spesialis",
            "Kelas Khusus International",
        ];

        $degrees = [];
        foreach ($degreeNames as $degreeName) {
            $degrees[] = [
                'name' => $degreeName,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ];
        }

        $this->db->table('degrees')->insertBatch($degrees);
    }
}
