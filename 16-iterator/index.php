<?php
namespace Iterator;

use Countable;
use Iterator;

class RadioStation
{
    protected float $frequency;

    public function __construct(float $frequency)
    {
        $this->frequency = $frequency;
    }

    public function getFrequency() : float
    {
        return $this->frequency;
    }
}

class SatationList implements Countable, Iterator
{
    protected array $stations = [];
    protected int $counter;

    public function addStation(RadioStation $station): void
    {
        $this->stations[] = $station;
    }

    public function removeStation(RadioStation $toRemove)
    {
        $toRemoveFrequency = $toRemove->getFrequency();
        $this->stations = array_filter($this->stations, function (RadioStation $station) use ($toRemoveFrequency) {
            return $station->getFrequency() !== $toRemoveFrequency;
        });
    }
    public function current(): RadioStation
    {
        return $this->stations[$this->counter];
    }

    public function next(): void
    {
        $this->counter++;
    }

    public function key():int
    {
        return $this->counter;
    }

    public function valid(): bool
    {
        return isset($this->stations[$this->counter]);
    }

    public function rewind(): void
    {
        $this->counter = 0;
    }

    public function count(): int
    {
        return count($this->stations);
    }
}

$stationList = new SatationList();
$stationList->addStation(new RadioStation(89));
$stationList->addStation(new RadioStation(101));
$stationList->addStation(new RadioStation(102));
$stationList->addStation(new RadioStation(103.2));
foreach($stationList as $station) {
    echo $station->getFrequency() . PHP_EOL;
}
$stationList->removeStation(new RadioStation(89));

foreach($stationList as $station) {
    echo $station->getFrequency() . PHP_EOL;
}
