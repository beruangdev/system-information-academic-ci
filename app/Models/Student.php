<?php

namespace App\Models;

use CodeIgniter\Model;

class Student extends Model
{
    use \Tatter\Relations\Traits\ModelTrait;

    protected $DBGroup          = 'default';
    protected $table            = 'students';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields = [
        'user_id', 'major_id', 'current_credits', 'admission_year', 'date_of_birth', 'gender', 'status', 
        'address', 'phone_number', 'guardian_name', 'guardian_phone_number', 'blood_type', 'tuition_fee'
    ];

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

    
    public function getUser()
    {
        $userModel = new \App\Models\User();
        return $userModel->find($this->user_id);
    }

    public function getMajor()
    {
        $majorModel = new \App\Models\Major();
        return $majorModel->find($this->major_id);
    }

    public function getClassrooms()
    {
        $db = \Config\Database::connect();
        return $db->table('classrooms_students')
                  ->join('classrooms', 'classrooms.id = classrooms_students.classroom_id')
                  ->where('student_id', $this->id)
                  ->get()->getResultArray();
    }

    public function getEnrollments()
    {
        $classroomEnrollmentModel = new \App\Models\ClassroomEnrollment();
        return $classroomEnrollmentModel->where('student_id', $this->id)->findAll();
    }

    public function getGrades()
    {
        $studentGradeModel = new \App\Models\StudentGrade();
        return $studentGradeModel->where('student_id', $this->id)->findAll();
    }

    public function getSeasonLogs()
    {
        $studentSeasonLogModel = new \App\Models\StudentSeasonLog();
        return $studentSeasonLogModel->where('student_id', $this->id)->findAll();
    }

    public function getAttendances()
    {
        $studentAttendanceModel = new \App\Models\StudentAttendance();
        return $studentAttendanceModel->where('student_id', $this->id)->findAll();
    }

    public function getTuitionPayments()
    {
        $tuitionPaymentModel = new \App\Models\TuitionPayment();
        return $tuitionPaymentModel->where('student_id', $this->id)->findAll();
    }

    public function getAdvisors()
    {
        $db = \Config\Database::connect();
        return $db->table('academic_advisors')
                  ->join('lecturers', 'lecturers.id = academic_advisors.lecturer_id')
                  ->where('student_id', $this->id)
                  ->get()->getResultArray();
    }
}
