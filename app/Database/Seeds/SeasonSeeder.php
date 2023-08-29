<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class SeasonSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create("id_ID");

        $currentYear = date('Y');
        $seasons = [];
        for ($i = 0; $i < 10; $i++) {
            for ($j = 1; $j <= 2; $j++) {
                $startYear = $currentYear - $i;
                $name = $startYear . "-" . $j;

                if ($j == 1) {
                    $start_date = $faker->dateTimeBetween("$startYear-01-01", "$startYear-06-01");
                    $end_date = $faker->dateTimeBetween("$startYear-06-02", "$startYear-06-30");
                } else {
                    $start_date = $faker->dateTimeBetween("$startYear-07-01", "$startYear-12-01");
                    $end_date = $faker->dateTimeBetween("$startYear-12-02", "$startYear-12-31");
                }

                $seasons[] = [
                    'name' => $name,
                    'start_date' => $start_date->format('Y-m-d'),
                    'end_date' => $end_date->format('Y-m-d'),
                    'created_at' => Time::now(),
                    'updated_at' => Time::now(),
                ];
            }
        }

        $this->db->table('seasons')->insertBatch($seasons);
    }
}
