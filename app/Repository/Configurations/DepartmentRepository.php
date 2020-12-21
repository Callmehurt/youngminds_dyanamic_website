<?php
/**
 * Created by PhpStorm.
 * User: santosh
 * Date: 3/21/18
 * Time: 5:16 PM
 */

namespace App\Repository\Configurations;


use App\Models\Configurations\Department;

class DepartmentRepository
{

    /**
     * @var Department
     */
    private $department;

    public function __construct(Department $department)
    {
        $this->department = $department;
    }

    public function all()
    {
        $department = $this->department->orderBy('department_name','ASC')->get();
        return $department;
    }

    public function findById($id)
    {
        $department = $this->department->find($id);
        return $department;
    }
}