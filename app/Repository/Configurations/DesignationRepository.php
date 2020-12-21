<?php
/**
 * Created by PhpStorm.
 * User: santosh
 * Date: 3/21/18
 * Time: 5:03 PM
 */

namespace App\Repository\Configurations;


use App\Models\Configurations\Designation;

class DesignationRepository
{

    /**
     * @var Designation
     */
    private $designation;

    public function __construct(Designation $designation)
    {
        $this->designation = $designation;
    }

    public function all()
    {
        $designation = $this->designation->orderBy('designation_name','ASC')->get();
        return $designation;
    }
    public function findById($id)
    {
        $designation = $this->designation->find($id);
        return $designation;
    }
}