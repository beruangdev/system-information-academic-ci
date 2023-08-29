<?php

namespace App\Models;

use CodeIgniter\Model;

class Major extends Model
{
    use \Tatter\Relations\Traits\ModelTrait;

    protected $DBGroup          = 'default';
    protected $table            = 'majors';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields = ['name', 'degree_id', 'faculty_id'];

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

    public function getDegree()
    {
        $degreeModel = new \App\Models\Degree();
        return $degreeModel->find($this->degree_id);
    }
    
    public function getFaculty()
    {
        $FacultyModel = new \App\Models\Faculty();
        return $FacultyModel->find($this->Faculty_id);
    }

    public function getStudents()
    {
        $studentModel = new \App\Models\Student();
        return $studentModel->where('major_id', $this->id)->findAll();
    }

    public function getCourses()
    {
        $courseModel = new \App\Models\Course();
        return $courseModel->where('major_id', $this->id)->findAll();
    }

    public function getAcademics()
    {
        $academicModel = new \App\Models\Academic();
        return $academicModel->where([
            'academicable_type' => 'Major',
            'academicable_id' => $this->id
        ])->findAll();
    }
}
