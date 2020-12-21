<?php
/**
 * Created by PhpStorm.
 * User: ym
 * Date: 3/27/18
 * Time: 2:27 PM
 */

namespace App\Repository\Configurations;


use App\Models\Configurations\OfficeType;

class OfficeTypeRepository
{
    /**
     * @var OfficeType
     */
    private $officeType;


    /**
     * OfficeTypeRepository constructor.
     */
    public function __construct(OfficeType $officeType)
    {
        $this->officeType = $officeType;
    }

    public function all()
    {
        $result = $this->officeType->orderBy('office_type_name','ASC')->get();
        return $result;
    }
    public function findById($id)
    {
        $result = $this->officeType->find($id);
        return $result;
    }
}