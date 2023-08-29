<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class FacultySeeder extends Seeder
{
    public function run()
    {
        $facultyNames = [
            "Ekonomi dan Bisnis",
            "Kedokteran Hewan",
            "Hukum",
            "Teknik",
            "Keguruan dan Ilmu Pendidikan",
            "Pertanian",
            "Kedokteran",
            "Matematika dan Ilmu Pengetahuan Alam",
            "Ilmu Sosial dan Ilmu Politik",
            "Keperawatan"
        ];

        $faculties = [];
        foreach ($facultyNames as $facultyName) {
            $faculties[] = [
                'name' => $facultyName,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ];
        }

        $this->db->table('faculties')->insertBatch($faculties);
    }
}
