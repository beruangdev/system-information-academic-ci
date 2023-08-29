<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassroomSession extends Model
{
    use \Tatter\Relations\Traits\ModelTrait;

    protected $DBGroup          = 'default';
    protected $table            = 'classroomsessions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields = ['start_datetime', 'end_datetime', 'attendance_code', 'topic', 'classroom_id', 'season_id', 'lecturer_id', 'room_id'];


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

    public function getLecturer()
    {
        $lecturerModel = new \App\Models\Lecturer();
        return $lecturerModel->find($this->lecturer_id);
    }

    public function getRoom()
    {
        $roomModel = new \App\Models\Room();
        return $roomModel->find($this->room_id);
    }

    public function getStudentAttendances()
    {
        $studentAttendanceModel = new \App\Models\StudentAttendance();
        return $studentAttendanceModel->where('classroom_session_id', $this->id)->findAll();
    }
}
