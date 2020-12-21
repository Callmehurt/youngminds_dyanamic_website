<?php
/**
 * Created by PhpStorm.
 * User: santosh
 * Date: 3/21/18
 * Time: 5:03 PM
 */

namespace App\Repository\Carousel;


use App\Models\Carousel;

class CarouselRepository
{

    private $carousel;

    public function __construct(Carousel $carousel)
    {
        $this->carousel = $carousel;
    }

    public function all()
    {
        $carousels = $this->carousel->orderBy('created_at','DESC')->get();
        return $carousels;
    }

    public function getActive()
    {
        $carousels = $this->carousel->where('status', '=', 1)->orderBy('created_at','DESC')->get();
        return $carousels;
    }


    public function findById($id)
    {
        $carousels = $this->carousel->find($id);
        return $carousels;
    }

}