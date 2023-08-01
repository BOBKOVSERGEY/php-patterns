<?php
namespace SimpleFactory;
interface Door
{
    public function getWidth(): float;
    public function getHeight(): float;
}


class WoodenDoor implements Door
{
    protected float $width;
    protected float $height;

    public function __construct(
        float $width,
        float $height
    )
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }
}

class DoorFactory
{
    public static function makeDoor($width, $height): WoodenDoor
    {
        return new WoodenDoor($width, $height);
    }
}

$door = DoorFactory::makeDoor(90, 270);
echo $door->getWidth();
echo $door->getHeight();
