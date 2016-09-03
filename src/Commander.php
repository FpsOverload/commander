<?php

namespace FpsOverload\Commander;

class Commander {

    protected $classMap = [
        'arma3' => Clients\ArmA3::class,
        'bf1' => Clients\BF1::class,
        'cod4' => Clients\CoD4::class,
    ];

    function __construct($game, $host, $port, $password = null)
    {

    }

    protected function getClient($game)
    {
        if (isset($this->classMap[$game])) {
            return $this->classMap[$game];
        }

        throw new GameException('Could not find game "' . $game . '"');
    }

}
