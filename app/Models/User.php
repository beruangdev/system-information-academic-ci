<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class User extends ShieldUserModel
{
    use \Tatter\Relations\Traits\ModelTrait;

    protected function initialize(): void
    {
        parent::initialize();

        $this->allowedFields = [
            ...$this->allowedFields,

            // 'first_name',
        ];
    }


    public function getStudent()
    {
        $studentModel = new \App\Models\Student();
        return $studentModel->where('user_id', $this->id)->first();
    }

    public function getAcademic()
    {
        $academicModel = new \App\Models\Academic();
        return $academicModel->where('user_id', $this->id)->first();
    }

    public function getLecturer()
    {
        $lecturerModel = new \App\Models\Lecturer();
        return $lecturerModel->where('user_id', $this->id)->first();
    }

}
