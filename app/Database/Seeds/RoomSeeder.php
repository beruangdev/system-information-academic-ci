<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class RoomSeeder extends Seeder
{
    public function run()
    {
        $rooms = [
            ['name' => 'A-101', 'capacity' => 30],
            ['name' => 'B-201', 'capacity' => 25],
            ['name' => 'C-301', 'capacity' => 40],
            ['name' => 'D-102', 'capacity' => 35],
            ['name' => 'E-202', 'capacity' => 28],
            ['name' => 'F-103', 'capacity' => 32],
            ['name' => 'G-203', 'capacity' => 27],
            ['name' => 'H-303', 'capacity' => 38],
            ['name' => 'I-104', 'capacity' => 33],
            ['name' => 'J-204', 'capacity' => 26],
            ['name' => 'K-304', 'capacity' => 37],
            ['name' => 'L-105', 'capacity' => 31],
            ['name' => 'M-205', 'capacity' => 29],
            ['name' => 'N-305', 'capacity' => 36],
        ];

        foreach ($rooms as $key => $room) {
            $rooms[$key]['created_at'] = Time::now();
            $rooms[$key]['updated_at'] = Time::now();
        }

        $this->db->table('rooms')->insertBatch($rooms);
    }
}
