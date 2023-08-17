<?php
namespace Proxy;

interface Door
{
    public function open($password);
    public function close();
}

class LabDoor implements Door
{

    public function open($password = '123')
    {
        echo "Opening lab door";
    }

    public function close()
    {
        echo "Closing the lab door";
    }
}

class SecuredDoor implements Door
{
    protected Door $door;
    public function __construct(Door $door)
    {
        $this->door = $door;
    }

    public function open($password)
    {
        if ($this->authenticate($password)) {
            $this->door->open();
        } else {
            echo "Big no! It ain't possible.";
        }
    }

    public function close()
    {
        $this->door->close();
    }

    public function authenticate($password): bool
    {
        return $password === '$ecr@t';
    }

}

$door = new SecuredDoor(new LabDoor());
$door->open('invalid'); // Big no! It ain't possible.
$door->open('$ecr@t'); // Opening lab door
$door->close(); // Closing lab door