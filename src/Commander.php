<?php

namespace FpsOverload\Commander;

use FpsOverload\Commander\Exceptions\GameException;

class Commander {

    protected $classMap = [
        'arma3' => Clients\ArmA3::class,
        'bf1' => Clients\BF1::class,
        'cod4' => Clients\CoD4::class,
    ];

    protected $client;

    function __construct($game, $host, $port, $password = null)
    {
        $client = $this->getClient($game);

        $this->client = new $client($host, $port, $password);

        if ($password == null) {
            $this->client->guest = true;
        }
    }

    protected function getClient($game)
    {
        if (isset($this->classMap[$game])) {
            return $this->classMap[$game];
        }

        throw new GameException('Could not find game "' . $game . '"');
    }

}
