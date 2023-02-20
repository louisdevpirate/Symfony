<?php

namespace App\Taxes;

class Detector{

    protected $price;

    public function __construct(float $seuil){

        $this->seuil = $seuil;

    }

    public function detect(int $price): bool
    {
        if($prix > $this->seuil){

            return true;
        }

        return false;
    }
}