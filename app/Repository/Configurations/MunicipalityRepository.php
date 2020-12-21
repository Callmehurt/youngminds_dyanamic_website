<?php
/**
 * Created by PhpStorm.
 * User: ym
 * Date: 3/26/18
 * Time: 11:37 AM
 */

namespace App\Repository\Configurations;


use App\Models\Configurations\Municipality;

class MunicipalityRepository
{
    /**
     * @var Municipality
     */
    private $municipality;


    /**
     * MunicipalityRepository constructor.
     */
    public function __construct(Municipality $municipality)
    {
        $this->municipality = $municipality;
    }

    public function all()
    {
        $result = $this->municipality->orderBy('muni_code','ASC')->get();
        return $result;
    }
    public function findById($id)
    {
        $result = $this->municipality->find($id);
        return $result;
    }
}