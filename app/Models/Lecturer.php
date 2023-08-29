<?php

namespace App\Models;

use CodeIgniter\Model;

class Lecturer extends Model
{
    use \Tatter\Relations\Traits\ModelTrait;

    protected $DBGroup          = 'default';
    protected $table            = 'lecturers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields = ['user_id', 'name', 'position', 'specialization', 'phone_number', 'status'];

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

    public function getClassrooms()
    {
        $db = \Config\Database::connect();
        return $db->table('classrooms_lecturers')
                  ->join('classrooms', 'classrooms.id = classrooms_lecturers.classroom_id')
                  ->where('lecturer_id', $this->id)
                  ->get()->getResultArray();
    }

    public function getClassroomSessions()
    {
        $classroomSessionModel = new \App\Models\ClassroomSession();
        return $classroomSessionModel->where('lecturer_id', $this->id)->findAll();
    }

    public function getAdvisees()
    {
        $db = \Config\Database::connect();
        return $db->table('academic_advisors')
                  ->join('students', 'students.id = academic_advisors.student_id')
                  ->where('lecturer_id', $this->id)
                  ->get()->getResultArray();
    }
}
