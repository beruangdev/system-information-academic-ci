<?php

namespace App\Models;

use CodeIgniter\Model;

class Academic extends Model
{
    use \Tatter\Relations\Traits\ModelTrait;
    protected $DBGroup          = 'default';
    protected $table            = 'academics';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'academicable_type',
        'academicable_id',
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
        $userModel = new User(); // Asumsikan Anda memiliki model User di namespace App\Models
        return $userModel->where('id', $this->user_id)->first();
    }

    public function getAcademicable()
    {
        if (!$this->academicable_type || !$this->academicable_id) {
            return null;
        }

        $modelClass = '\\App\\Models\\' . $this->academicable_type; // Asumsikan semua model Anda berada di namespace App\Models
        // $modelClass = $this->academicable_type;
        
        if (!class_exists($modelClass)) {
            throw new \Exception("Model {$modelClass} tidak ditemukan.");
        }

        $modelInstance = new $modelClass();
        return $modelInstance->find($this->academicable_id);
    }
}
