<?php

namespace App\Models;

use CodeIgniter\Model;

class Season extends Model
{
    use \Tatter\Relations\Traits\ModelTrait;

    protected $DBGroup          = 'default';
    protected $table            = 'seasons';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields = ['name', 'start_date', 'end_date'];

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


    public function getClassrooms()
    {
        $classroomModel = new \App\Models\Classroom();
        return $classroomModel->where('season_id', $this->id)->findAll();
    }

    public function getClassroomEnrollments()
    {
        $classroomEnrollmentModel = new \App\Models\ClassroomEnrollment();
        return $classroomEnrollmentModel->where('season_id', $this->id)->findAll();
    }

    public function getClassroomSessions()
    {
        $classroomSessionModel = new \App\Models\ClassroomSession();
        return $classroomSessionModel->where('season_id', $this->id)->findAll();
    }

    public function getStudentSeasonLogs()
    {
        $studentSeasonLogModel = new \App\Models\StudentSeasonLog();
        return $studentSeasonLogModel->where('season_id', $this->id)->findAll();
    }

    public function getStudentGrades()
    {
        $studentGradeModel = new \App\Models\StudentGrade();
        return $studentGradeModel->where('season_id', $this->id)->findAll();
    }

    public function getTuitionPayments()
    {
        $tuitionPaymentModel = new \App\Models\TuitionPayment();
        return $tuitionPaymentModel->where('season_id', $this->id)->findAll();
    }
}
