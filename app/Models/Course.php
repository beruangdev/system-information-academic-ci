<?php

namespace App\Models;

use CodeIgniter\Model;

class Course extends Model
{
    use \Tatter\Relations\Traits\ModelTrait;

    protected $DBGroup          = 'default';
    protected $table            = 'courses';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields = ['major_id', 'faculty_id', 'code', 'name', 'credits'];

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

    public function getMajor()
    {
        $majorModel = new \App\Models\Major();
        return $majorModel->find($this->major_id);
    }

    public function getFaculty()
    {
        $facultyModel = new \App\Models\Faculty();
        return $facultyModel->find($this->faculty_id);
    }

    public function getPrerequisites()
    {
        $db = \Config\Database::connect();
        return $db->table('course_prerequisites')
            ->join('courses', 'courses.id = course_prerequisites.prerequisite_course_id')
            ->where('course_id', $this->id)
            ->get()->getResultArray();
    }

    public function getClassrooms()
    {
        $classroomModel = new \App\Models\Classroom();
        return $classroomModel->where('course_id', $this->id)->findAll();
    }

    public function getStudentGrades()
    {
        $studentGradeModel = new \App\Models\StudentGrade();
        return $studentGradeModel->where('course_id', $this->id)->findAll();
    }
}
