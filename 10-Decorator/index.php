<?php
namespace Decorator;

interface Coffee
{
    public function getCost();
    public function getDescription();
}

class SimpleCoffee implements Coffee
{

    public function getCost(): int
    {
        return 10;
    }

    public function getDescription(): string
    {
        return 'Simple Coffee';
    }
}

class MilkCoffee implements Coffee
{
    protected Coffee $coffee;
    public function __construct(Coffee $coffee)
    {
        $this->coffee = $coffee;
    }

    public function getCost(): int
    {
        return $this->coffee->getCost() + 2;
    }

    public function getDescription(): string
    {
        return $this->coffee->getDescription() . ', milk';
    }
}

class WhipCoffee implements Coffee
{
    protected Coffee $coffee;

    public function __construct(Coffee $coffee)
    {
        $this->coffee = $coffee;
    }

    public function getCost(): int
    {
        return $this->coffee->getCost() + 5;
    }

    public function getDescription(): string
    {
        return $this->coffee->getDescription() . ', whip';
    }
}

class VanillaCoffee implements Coffee
{
    protected Coffee $coffee;

    public function __construct(Coffee $coffee)
    {
        $this->coffee = $coffee;
    }

    public function getCost(): int
    {
        return $this->coffee->getCost() + 3;
    }

    public function getDescription(): string
    {
        return $this->coffee->getDescription() . ', vanilla';
    }
}

$someCoffee = new SimpleCoffee();
echo $someCoffee->getCost(); // 10
echo $someCoffee->getDescription(); // Simple Coffee

$someCoffee = new MilkCoffee($someCoffee);
echo $someCoffee->getCost(); // 12
echo $someCoffee->getDescription(); // Simple Coffee, milk

$someCoffee = new WhipCoffee($someCoffee);
echo $someCoffee->getCost(); // 17
echo $someCoffee->getDescription(); // Simple Coffee, milk, whip

$someCoffee = new VanillaCoffee($someCoffee);
echo $someCoffee->getCost(); // 20
echo $someCoffee->getDescription(); // Simple Coffee, milk, whip, vanilla