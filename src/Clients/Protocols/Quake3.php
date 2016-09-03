<?php

namespace FpsOverload\Commander\Clients\Protocols;

class Quake3 extends AbstractProtocol {

    protected $prefix = "\xFF\xFF\xFF\xFF";

    protected $responsePrefix = "\xFF\xFF\xFF\xFF";

    protected function send($command)
    {
        fwrite($this->socket, $this->prefix . $command . "\n");
        return $this->recieve();
    }

    protected function recieve($timeout = 2) {
        $response = '';
        $timeout = time() + $timeout;

        while (!strlen($response) && time() < $timeout) {
            $response = fread($this->socket, 9999);
        }

        if (substr($response, 0, strlen($this->responsePrefix)) != $this->responsePrefix) {
            return $response;
        }

        return substr($response, strlen($this->responsePrefix));
    }


    public function getServerStatus()
    {
        var_dump($this->send('getstatus'));
    }

}
