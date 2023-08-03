<?php
namespace Adapter;

interface Lion
{
    public function roar();
}

class AfricanLion implements Lion
{

    public function roar()
    {
        // TODO: Implement roar() method.
    }
}

class AsianLion implements Lion
{

    public function roar()
    {
        // TODO: Implement roar() method.
    }
}

class Hunter
{
    public function hunt(Lion $lion): void
    {
        $lion->roar();
    }
}

class WildDog
{
    public function bark()
    {

    }
}

class WildDogAdapter implements Lion
{

    protected $dog;

    public function __construct(WildDog $dog)
    {
        $this->dog = $dog;
    }

    public function roar()
    {
        $this->dog->bark();
    }
}

$wildDog = new WildDog();
$wildDogAdapter = new WildDogAdapter($wildDog);
$hunter = new Hunter();
$hunter->hunt($wildDogAdapter);
