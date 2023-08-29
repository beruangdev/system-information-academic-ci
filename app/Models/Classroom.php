<?php

namespace App\Models;

use CodeIgniter\Model;

class Classroom extends Model
{
    use \Tatter\Relations\Traits\ModelTrait;

    protected $DBGroup          = 'default';
    protected $table            = 'classrooms';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields = ['name', 'capacity', 'credits', 'season_id', 'course_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getSeason()
    {
        $seasonModel = new \App\Models\Season();
        return $seasonModel->find($this->season_id);
    }

    public function getRoom()
    {
        $roomModel = new \App\Models\Room();
        return $roomModel->find($this->room_id);
    }

    public function getCourse()
    {
        $courseModel = new \App\Models\Course();
        return $courseModel->find($this->course_id);
    }

    public function getClassroomSessions()
    {
        $classroomSessionModel = new \App\Models\ClassroomSession();
        return $classroomSessionModel->where('classroom_id', $this->id)->findAll();
    }

    public function getClassroomEnrollments()
    {
        $classroomEnrollmentModel = new \App\Models\ClassroomEnrollment();
        return $classroomEnrollmentModel->where('classroom_id', $this->id)->findAll();
    }

    // Untuk relasi many-to-many, Anda perlu menyesuaikan logika berdasarkan tabel pivot Anda
    public function getStudents()
    {
        $db = \Config\Database::connect();
        return $db->table('classroom_enrollments')
                  ->join('students', 'students.id = classroom_enrollments.student_id')
                  ->where('classroom_id', $this->id)
                  ->get()->getResult();
    }

    public function getLecturers()
    {
        $db = \Config\Database::connect();
        return $db->table('classroom_lecturer')
                  ->join('lecturers', 'lecturers.id = classroom_lecturer.lecturer_id')
                  ->where('classroom_id', $this->id)
                  ->get()->getResult();
    }
}
