<?php

namespace App\Database\Seeds;

use App\Enums\StudentStatus;
use App\Enums\UserRole;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\CLI\CLI;

class UserSeeder extends Seeder
{
    public $faculties = [];
    public $degrees = [];
    public $majors = [];

    public $student_ids = [];
    public $lecturer_ids = [];

    public $faker = null;
    public $chuck_size = 500;
    public function run()
    {
        $this->faker = Factory::create("id_ID");

        $this->faculties = $this->db->table('faculties')->get()->getResultArray();
        $this->degrees = $this->db->table('degrees')->get()->getResultArray();
        $this->majors = $this->db->table('majors')->get()->getResultArray();

        $this->createUser(2, 'admin');
        $this->createAcademicUniversities(3);
        $this->createAcademicFaculties(3);
        $this->createAcademicMajors(2);

        $this->createLecturers(10);
        $this->createStudents(2);

        // $this->createLecturers(120);
        // $this->createStudents(15);

        $this->createAcademicAdvisors();


        // dd($admin_users);
    }

    public function createUser($count, $role): array
    {
        try {
            $users = [];
            foreach (range(1, $count) as $index) {
                if ($role == UserRole::STUDENT) {
                    $username = 1000000 + $index;
                    $domain = "mhs.univ.com";
                } elseif ($role == UserRole::LECTURER) {
                    $username = 2000000 + $index;
                    $domain = "dsn.univ.com";
                } elseif ($role == UserRole::ACADEMIC_UNIVERSITY) {
                    $username = 3000000 + $index;
                    $domain = "staff.univ.com";
                } elseif ($role == UserRole::ACADEMIC_FACULTY) {
                    $username = 4000000 + $index;
                    $domain = "staff.univ.com";
                } elseif ($role == UserRole::ACADEMIC_MAJOR) {
                    $username = 5000000 + $index;
                    $domain = "staff.univ.com";
                } else {
                    $username = 0 + $index;
                    $domain = "admin.univ.com";
                }

                $users[] = [
                    'username' => $username,
                    'status' => 'active',
                    'status_message' => null,
                    'active' => 1,
                    'last_active' => Time::now(),
                    'created_at' => Time::now(),
                    'updated_at' => Time::now(),
                ];
            }

            $user_ids = $this->insertChuck("users", $users);

            $auth_identities = [];
            foreach ($user_ids as $index => $user_id) {
                // $email = $users[$index]["username"] . "@example.com";
                $email = $this->faker->unique()->userName . "@$domain";

                $auth_identities[] = [
                    'user_id' => $user_id,
                    'type' => 'email_password',
                    'name' => null,
                    'secret' => $email,
                    'secret2' => password_hash('12345678', PASSWORD_DEFAULT),
                    'expires' => null,
                    'extra' => null,
                    'force_reset' => 0,
                    'last_used_at' => null,
                    'created_at' => Time::now(),
                    'updated_at' => Time::now(),
                ];
            }

            $auth_identitie_ids = $this->insertChuck('auth_identities', $auth_identities);

            $auth_groups_users = [];
            foreach ($user_ids as $index => $user_id) {
                $auth_groups_users[] = [
                    'user_id' => $user_id,
                    'group' => $role,
                    'created_at' => Time::now(),
                ];
            }

            $auth_groups_user_ids = $this->insertChuck('auth_groups_users', $auth_groups_users);

            $this->db->transComplete();
            
            return compact('user_ids', 'auth_identitie_ids', 'auth_groups_user_ids', 'users', 'auth_identities', 'auth_groups_users');
        } catch (DatabaseException $th) {
            $this->db->transRollback();
            throw $th;
        }
    }

    public function createAcademicAdvisors()
    {
        $academic_advisors = [];
        foreach ($this->student_ids as $key => $student_id) {
            $academic_advisor = [];
            $academic_advisor['student_id'] = $student_id;
            $academic_advisor['lecturer_id'] = $this->lecturer_ids[$key % count($this->lecturer_ids)];
            $academic_advisor['created_at'] = Time::now();
            $academic_advisor['updated_at'] = Time::now();
            $academic_advisors[] = $academic_advisor;
        }
    
        $this->insertChuck('academic_advisors', $academic_advisors);
    }

    public function createAcademicUniversities($number)
    {
        $_users = $this->createUser($number, UserRole::ACADEMIC_UNIVERSITY);

        $academics = [];
        foreach ($_users["user_ids"] as $key => $_user) {
            $academics[] = [
                'user_id' => $_user,
                'academicable_id' => null,
                'academicable_type' => null,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ];
        }

        $this->insertChuck('academics', $academics);

    }

    public function createAcademicFaculties($number)
    {
        $faculties = $this->faculties;
        $_users = $this->createUser($number * count($faculties), UserRole::ACADEMIC_FACULTY);


        $academics = [];
        foreach ($_users["user_ids"] as $key => $_user) {
            $academics[] = [
                'user_id' => $_user,
                'academicable_id' => $faculties[$key % count($faculties)]["id"],
                'academicable_type' => "Faculty",
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ];
        }

        $this->insertChuck('academics', $academics);
    }

    public function createAcademicMajors($number)
    {
        $majors = $this->majors;
        $_users = $this->createUser($number * count($majors), UserRole::ACADEMIC_MAJOR);

        $academics = [];
        foreach ($_users["user_ids"] as $key => $_user) {
            $academics[] = [
                'user_id' => $_user,
                'academicable_id' => $majors[$key % count($majors)]["id"],
                'academicable_type' => "Majors",
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ];
        }

        $this->insertChuck('academics', $academics);
    }

    public function createLecturers($number)
    {

        $_users = $this->createUser($number, UserRole::LECTURER);

        $lecturers = [];
        $positions = [
            'Asisten Ahli',
            'Lektor',
            'Lektor Kepala',
            'Guru Besar',
            'Dosen Tamu',
            'Dosen Paruh Waktu',
            'Peneliti',
            'Ketua Program Studi',
            'Koordinator Mata Kuliah',
            'Kepala Laboratorium',
            'Kepala Departemen',
            'Dekan Fakultas',
            'Wakil Dekan',
            'Ketua Senat Akademik',
            'Koordinator Program',
            'Kepala Pusat Studi',
            'Kepala Unit Penelitian',
            'Kepala Unit Pengabdian Masyarakat',
            'Koordinator Praktikum',
            'Koordinator Tesis',
            'Koordinator Disertasi'
        ];

        foreach ($_users["user_ids"] as $key => $user_id) {
            $lecturer = [];
            $lecturer['user_id'] = $user_id;
            $lecturer['position'] = $this->faker->randomElement($positions);
            $lecturer['specialization'] = $this->faker->jobTitle;
            $lecturer['phone_number'] = $this->faker->phoneNumber;
            $lecturer['status'] = $this->faker->randomElement(['active', 'inactive']);

            $lecturers[] = $lecturer;
        }

        $this->lecturer_ids = $this->insertChuck("lecturers", $lecturers);
    }

    public function createStudents($count)
    {
        $majors = $this->majors;
        $count = $count * count($majors);

        $_users = $this->createUser($count, UserRole::STUDENT);

        $students = [];
        foreach ($_users["user_ids"] as $key => $user_id) {
            $students[] = [
                'user_id' => $user_id,
                'major_id' => $majors[$key % count($majors)]["id"],
                'faculty_id' => $majors[$key % count($majors)]["faculty_id"],
                'current_credits' => $this->faker->numberBetween(0, 150),
                'admission_year' => $this->faker->numberBetween(Time::now()->year - 10, Time::now()->year),
                'date_of_birth' => $this->faker->date(),
                'gender' => $this->faker->randomElement(['male', 'female', 'male', 'female', 'other']),
                'status' => $this->faker->randomElement(StudentStatus::values()),
                'address' => $this->faker->address,
                'phone_number' => $this->faker->phoneNumber,
                'guardian_name' => $this->faker->name,
                'guardian_phone_number' => $this->faker->phoneNumber,
                'blood_type' => $this->faker->randomElement(['A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-']),
                'tuition_fee' => $this->faker->numberBetween(1000000, 5000000),

                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ];
        }

        $this->student_ids = $this->insertChuck("students", $students);
    }

    public function getLastIds($array)
    {
        $startID = $this->db->insertID();
        $lastID = $startID + count($array) - 1;
        return range($startID, $lastID);
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
}
