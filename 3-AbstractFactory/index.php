<?php
// Перевод примера с дверью выше. Прежде всего, у нас есть наш Doorинтерфейс и некоторая реализация для него.
namespace AbstractFactory;
interface Door
{
    public function getDescription();
}

class WoodenDoor implements Door
{

    public function getDescription()
    {
        echo 'I am a wooden door';
    }
}

class IronDoor implements Door
{

    public function getDescription()
    {
        echo 'I am an iron door';
    }
}

// Затем у нас есть несколько специалистов по установке для каждого типа дверей.

interface DoorFittingExpert
{
    public function getDescription();
}

class Welden implements DoorFittingExpert
{

    public function getDescription()
    {
        echo 'I can only fit iron doors';
    }
}

class Carpenter implements DoorFittingExpert
{

    public function getDescription()
    {
        echo 'I can only fit wooden doors';
    }
}

// Теперь у нас есть абстрактная фабрика, которая позволит нам создать семейство связанных объектов, например, фабрика деревянных дверей создаст деревянную дверь и эксперта по фурнитуре для деревянных дверей, а фабрика по производству железных дверей создаст эксперта по железной двери и фурнитуре для железных дверей.

interface DoorFactory
{
    public function makeDoor(): Door;

    public function makeFittingExpert(): DoorFittingExpert;
}

class WoodenDoorFactory implements DoorFactory
{

    public function makeDoor(): Door
    {
        return new WoodenDoor();
    }

    public function makeFittingExpert(): DoorFittingExpert
    {
        return new Carpenter();
    }
}

class IronDoorFactory implements DoorFactory
{

    public function makeDoor(): Door
    {
        return new IronDoor();
    }

    public function makeFittingExpert(): DoorFittingExpert
    {
        return new Welden();
    }
}

// И тогда его можно использовать как
$woodenFactory = new WoodenDoorFactory();
$door = $woodenFactory->makeDoor();
$expert = $woodenFactory->makeFittingExpert();
$door->getDescription();
$expert->getDescription();

$ironFactory = new IronDoorFactory();
$door = $ironFactory->makeDoor();
$expert = $ironFactory->makeFittingExpert();
$door->getDescription();
$expert->getDescription();






