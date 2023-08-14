<?php
namespace Facade;

class Computer
{
    public function getElectricShock(): void
    {
        echo "Ouch!";
    }

    public function makeSound(): void
    {
        echo "Beep beep!";
    }

    public function showLoadingScreen(): void
    {
        echo "Loading..";
    }

    public function bam(): void
    {
        echo "Ready to be used!";
    }

    public function closeEverything(): void
    {
        echo "Bup bup bup buzzzz!";
    }

    public function sooth(): void
    {
        echo "Zzzzz";
    }

    public function pullCurrent(): void
    {
        echo "Haaah!";
    }
}

class ComputerFacade
{
    protected Computer $computer;

    public function __construct(Computer $computer)
    {
        $this->computer = $computer;
    }

    public function turnOn(): void
    {
        $this->computer->getElectricShock();
        $this->computer->makeSound();
        $this->computer->showLoadingScreen();
        $this->computer->bam();
    }

    public function turnOff(): void
    {
        $this->computer->closeEverything();
        $this->computer->pullCurrent();
        $this->computer->sooth();
    }
}

$computer = new ComputerFacade(new Computer());
$computer->turnOn();
$computer->turnOff();