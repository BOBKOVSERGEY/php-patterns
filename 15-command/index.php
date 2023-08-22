<?php
namespace Command;

class Bulb
{
    public function turnOn(): void
    {
        echo "Bulb has been lit";
    }

    public function turnOff(): void
    {
        echo "Darkness!";
    }
}

interface Command
{
    public function execute();
    public function undo();
    public function redo();
}

class TurnOn implements Command
{

    protected Bulb $bulb;

    public function __construct(Bulb $bulb)
    {
        $this->bulb = $bulb;
    }

    public function execute()
    {
        $this->bulb->turnOn();
    }

    public function undo()
    {
        $this->bulb->turnOff();
    }

    public function redo()
    {
        $this->execute();
    }
}

class TurnOff implements Command
{
    protected Bulb $bulb;

    public function __construct(Bulb $bulb)
    {
        $this->bulb = $bulb;
    }

    public function execute()
    {
        $this->bulb->turnOff();
    }

    public function undo()
    {
        $this->bulb->turnOn();
    }

    public function redo()
    {
        $this->execute();
    }
}

class RemoteControl
{
    public function submit(Command $command): void
    {
        $command->execute();
    }
}

$bulb = new Bulb();

$turnOn = new TurnOn($bulb);
$turnOff = new TurnOff($bulb);
$remote = new RemoteControl();

$remote->submit($turnOn);
$remote->submit($turnOff);

