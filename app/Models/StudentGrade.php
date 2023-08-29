<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentGrade extends Model
{
    use \Tatter\Relations\Traits\ModelTrait;

    protected $DBGroup          = 'default';
    protected $table            = 'studentgrades';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields = ['grade', 'student_id', 'course_id', 'classroom_id', 'season_id', 'user_id'];


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

    public function getStudent()
    {
        $studentModel = new \App\Models\Student();
        return $studentModel->find($this->student_id);
    }

    public function getCourse()
    {
        $courseModel = new \App\Models\Course();
        return $courseModel->find($this->course_id);
    }

    public function getClassroom()
    {
        $classroomModel = new \App\Models\Classroom();
        return $classroomModel->find($this->classroom_id);
    }

    public function getSeason()
    {
        $seasonModel = new \App\Models\Season();
        return $seasonModel->find($this->season_id);
    }

    public function getUser()
    {
        $userModel = new \App\Models\User();
        return $userModel->find($this->user_id);
    }
}
