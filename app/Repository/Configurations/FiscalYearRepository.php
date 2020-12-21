<?php
/**
 * Created by PhpStorm.
 * User: santosh
 * Date: 3/21/18
 * Time: 5:17 PM
 */

namespace App\Repository\Configurations;


use App\Models\Configurations\FiscalYear;

class FiscalYearRepository
{

    /**
     * @var FiscalYear
     */
    private $fiscalYear;

    public function __construct(FiscalYear $fiscalYear)
    {
        $this->fiscalYear = $fiscalYear;
    }

    public function all()
    {
        $fiscalYear = $this->fiscalYear->orderBy('fy_name','ASC')->get();
        return $fiscalYear;
    }
    public function findById($id)
    {
        $fiscalYear = $this->fiscalYear->find($id);
        return $fiscalYear;
    }
}