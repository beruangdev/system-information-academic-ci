<?php

namespace App\Database\Seeds;

use CodeIgniter\CLI\CLI;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class CourseSeeder extends Seeder
{
    public $chuck_size = 500;
    public $faculties;
    public $faker;
    public $majors;

    public function run()
    {
        $this->faker = Factory::create("id_ID");
        $this->faculties = $this->db->table('faculties')->get()->getResultArray();
        $this->majors = $this->db->table('majors')->get()->getResultArray();


        // $this->db->disableForeignKeyChecks();
        // $this->db->table("course_requirements")->truncate();
        // $this->db->table("courses")->truncate();
        // $this->db->enableForeignKeyChecks();

        $this->courseUniversity();
        $this->courseFaculty(10);
        $this->courseMajor(10);
        $this->coursePrerequisites();
    }

    public function coursePrerequisites()
    {
        $prerequisites = [];

        $courses = $this->db->table('courses')->get()->getResultArray();

        $universityCourses = $this->db->table('course_requirements')
            ->where('faculty_id', null)
            ->where('major_id', null)
            ->where('is_mandatory', true)
            ->get()
            ->getResultArray();


        $facultyCourses = $this->db->table('course_requirements')
            ->where('faculty_id !=', null)
            ->where('major_id', null)
            ->where('is_mandatory', true)
            ->get()
            ->getResultArray();

        $majorCourses = $this->db->table('course_requirements')
            ->where('faculty_id',  null)
            ->where('major_id !=', null)
            ->where('is_mandatory', true)
            ->get()
            ->getResultArray();

        foreach ($majorCourses as $key => $course_major) {
            foreach ($universityCourses as $key => $universityCourse) {
                $prerequisites[] = [
                    'course_id' => $course_major['course_id'],
                    'prerequisite_course_id' => $universityCourse['course_id'],
                    'created_at' => Time::now(),
                    'updated_at' => Time::now(),
                ];
            }
        }


        $this->insertChuck('course_prerequisites', $prerequisites);
    }


    public function courseMajor($number)
    {

        $courses = [];
        $major_ids = [];
        foreach ($this->majors as $key => $major) {
            for ($i = 0; $i < $number; $i++) {
                $course = [];
                $course['name'] = $this->faker->word;
                $course['code'] = $this->getInitial($major['name']) . "0$i";
                $course['credits'] = rand(2, 4);
                $course['created_at'] = Time::now();
                $course['updated_at'] = Time::now();
                $courses[] = $course;

                $major_ids[] = $major['id'];
            }
        }

        $course_ids = $this->insertChuck('courses', $courses);

        $course_requirements = [];
        foreach ($course_ids as $key => $course_id) {
            $course_requirement = [];
            $course_requirement['course_id'] = $course_id;
            $course_requirement['major_id'] = $major_ids[$key];
            $course_requirement['faculty_id'] = null;
            $course_requirement['is_mandatory'] = true;
            $course_requirement['created_at'] = Time::now();
            $course_requirement['updated_at'] = Time::now();
            $course_requirements[] = $course_requirement;
        }

        $this->insertChuck('course_requirements', $course_requirements);
    }

    public function courseFaculty($number)
    {
        $courses = [];
        $faculty_ids = [];
        foreach ($this->faculties as $key => $faculty) {
            for ($i = 0; $i < $number; $i++) {
                $course = [];
                $course['name'] = $this->faker->word;
                $course['code'] = $this->getInitial($faculty['name']) . "0$i";
                $course['credits'] = rand(2, 4);
                $course['created_at'] = Time::now();
                $course['updated_at'] = Time::now();
                $courses[] = $course;

                $faculty_ids[] = $faculty['id'];
            }
        }

        $course_ids = $this->insertChuck('courses', $courses);

        $course_requirements = [];
        foreach ($course_ids as $key => $course_id) {
            $course_requirement = [];
            $course_requirement['course_id'] = $course_id;
            $course_requirement['faculty_id'] = $faculty_ids[$key];
            $course_requirement['major_id'] = null;
            $course_requirement['created_at'] = Time::now();
            $course_requirement['updated_at'] = Time::now();
            $course_requirements[] = $course_requirement;
        }

        $this->insertChuck('course_requirements', $course_requirements);
    }
    public function courseUniversity()
    {
        $courses = [
            [
                'name' => 'Pendidikan Pancasila',
                'code' => 'PP101',
                'credits' => 2,
            ],
            [
                'name' => 'Bahasa Indonesia',
                'code' => 'BI101',
                'credits' => 2,
            ],
            [
                'name' => 'Pendidikan Kewarganegaraan (PKn)',
                'code' => 'PKn101',
                'credits' => 2,
            ],
            [
                'name' => 'Dasar-Dasar Statistika',
                'code' => 'STAT101',
                'credits' => 3,
            ],
            [
                'code' => 'IT101',
                'name' => 'Pengantar Teknologi Informasi',
                'credits' => 3,
            ],
            [
                'code' => 'BIO101',
                'name' => 'Biologi Dasar',
                'credits' => 3,
            ],
            [
                'code' => 'CHEM101',
                'name' => 'Kimia Dasar',
                'credits' => 3,
            ],
        ];

        $course_requirements = [
            [
                'course_id' => 1,
                'faculty_id' => null,
                'major_id' => null,
                'is_mandatory' => true,
            ],
            [
                'course_id' => 2,
                'faculty_id' => null,
                'major_id' => null,
                'is_mandatory' => true,
            ],
            [
                'course_id' => 3,
                'faculty_id' => null,
                'major_id' => null,
                'is_mandatory' => true,
            ],
            [
                'course_id' => 4,
                'faculty_id' => 4,
                'major_id' => null,
                'is_mandatory' => true,
            ],
            [
                'course_id' => 4,
                'faculty_id' => 1,
                'major_id' => null,
                'is_mandatory' => true,
            ],
            [
                'course_id' => 5,
                'faculty_id' => 8,
                'major_id' => null,
                'is_mandatory' => true,
            ],
            [
                'course_id' => 5,
                'faculty_id' => 9,
                'major_id' => null,
                'is_mandatory' => true,
            ],
            [
                'course_id' => 6,
                'faculty_id' => 7,
                'major_id' => null,
                'is_mandatory' => true,
            ],
            [
                'course_id' => 6,
                'faculty_id' => 8,
                'major_id' => null,
                'is_mandatory' => true,
            ],
            [
                'course_id' => 7,
                'faculty_id' => 7,
                'major_id' => null,
                'is_mandatory' => true,
            ],
            [
                'course_id' => 7,
                'faculty_id' => 8,
                'major_id' => null,
                'is_mandatory' => true,
            ],
        ];

        foreach ($courses as $key => $value) {
            $courses[$key]['created_at'] = Time::now();
            $courses[$key]['updated_at'] = Time::now();
        }

        foreach ($course_requirements as $key => $value) {
            $course_requirements[$key]['created_at'] = Time::now();
            $course_requirements[$key]['updated_at'] = Time::now();
        }

        $this->insertChuck('courses', $courses);
        $this->insertChuck('course_requirements', $course_requirements);
    }

    public function insertChuck($model, $array)
    {
        $data_count = count($array);
        CLI::write("Starting seeding $data_count $model...", 'yellow');
        $chuck = array_chunk($array, $this->chuck_size);
        $chuck_count = count($chuck);
        CLI::showProgress(0, $chuck_count);

        $allInsertedIds = [];
        foreach ($chuck as $key => $value) {
            $this->db->table($model)->insertBatch($value, null, $this->chuck_size + 1);
            $startID = $this->db->insertID();
            $lastID = $startID + count($value) - 1;
            $allInsertedIds = array_merge($allInsertedIds, range($startID, $lastID));
            CLI::showProgress($key + 1, $chuck_count);
        }
        CLI::write("All $data_count $model completed!", 'green');

        return $allInsertedIds;
    }

    public function getInitial($string)
    {
        $words = explode(" ", $string);
        $initials = "";

        foreach ($words as $word) {
            $initials .= strtoupper($word[0]);
        }

        return $initials;
    }
}
