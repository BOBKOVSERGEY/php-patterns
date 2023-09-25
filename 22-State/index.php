<?php
namespace State;
use Exception;

interface PhoneState {
    public function pickUp(): PhoneState;
    public function hangUp(): PhoneState;
    public function dial(): PhoneState;
}

class PhoneStateIdle implements PhoneState {
    public function pickUp(): PhoneState {
        return new PhoneStatePickedUp();
    }

    /**
     * @throws Exception
     */
    public function hangUp(): PhoneState {
        throw new Exception("already idle");
    }

    /**
     * @throws Exception
     */
    public function dial(): PhoneState {
        throw new Exception("unable to dial in idle state");
    }
}

class PhoneStatePickedUp implements PhoneState {
    /**
     * @throws Exception
     */
    public function pickUp(): PhoneState {
        throw new Exception("already picked up");
    }
    public function hangUp(): PhoneState {
        return new PhoneStateIdle();
    }
    public function dial(): PhoneState {
        return new PhoneStateCalling();
    }
}

class PhoneStateCalling implements PhoneState {
    /**
     * @throws Exception
     */
    public function pickUp(): PhoneState {
        throw new Exception("already picked up");
    }
    public function hangUp(): PhoneState {
        return new PhoneStateIdle();
    }

    /**
     * @throws Exception
     */
    public function dial(): PhoneState {
        throw new Exception("already dialing");
    }
}

class Phone {
    private $state;

    public function __construct() {
        $this->state = new PhoneStateIdle();
    }
    public function pickUp() {
        $this->state = $this->state->pickUp();
    }
    public function hangUp() {
        $this->state = $this->state->hangUp();
    }
    public function dial() {
        $this->state = $this->state->dial();
    }
}

$phone = new Phone();

$phone->pickUp();
$phone->dial();