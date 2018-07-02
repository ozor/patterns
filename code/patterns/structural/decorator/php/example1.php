<?php


interface CarService
{
    public function getCost();

    public function getDescription();
}


class BasicInspection implements CarService
{
    public function getCost()
    {
        return 25;
    }

    public function getDescription()
    {
        return 'Basic Description';
    }
}


class OilChange implements CarService
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 29 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ', and a oil change';
    }
}


class TireRotation implements CarService
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 15 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ', and a tire rotation';
    }
}



$s1 = new BasicInspection();
echo $s1->getDescription();
echo $s1->getCost();

$s2 = new OilChange($s1);
echo $s2->getDescription();
echo $s2->getCost();

$s31 = new TireRotation($s1);
echo $s31->getDescription();
echo $s31->getCost();

$s32 = new TireRotation($s2);
echo $s32->getDescription();
echo $s32->getCost();