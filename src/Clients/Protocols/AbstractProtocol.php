<?php

namespace FpsOverload\Commander\Clients\Protocols;

use FpsOverload\Commander\Exceptions\ConnectionFailedException;

abstract class AbstractProtocol {

    public $guest = false;

    protected $protocol = 'tcp';

    protected $socket = null;

    public function __construct($server, $port) {
        $this->socket = fsockopen($this->protocol."://".$server, $port, $errno, $errstr, 10);
        
        if (!$this->socket) {
            throw new ConnectionFailedException('Could not connect to server: ' . $errstr . '(' . $errno . ')');
        }

        stream_set_blocking($this->socket, false);
    }

    protected function close() {
        fclose($this->socket);
    }

    protected function __destruct() {
        $this->close();
    }


}
