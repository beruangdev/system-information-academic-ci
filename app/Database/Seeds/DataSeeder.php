<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataSeeder extends Seeder
{
    public function run()
    {
        $this->emptyTables();

        $this->call('FacultySeeder');
        $this->call('DegreeSeeder');
        $this->call('MajorSeeder');
        $this->call('UserSeeder');

        $this->call('RoomSeeder');
        $this->call('SeasonSeeder');
        
        $this->call('CourseSeeder');

    }

    public function emptyTables()
    {
        $allTables = $this->db->listTables();

        $tablesToTruncate = array_filter($allTables, function ($table) {
            return $table !== 'migrations';
        });

        $this->db->disableForeignKeyChecks();
        foreach ($tablesToTruncate as $table) {
            $this->db->table($table)->truncate();
        }
        $this->db->enableForeignKeyChecks();
    }
}
