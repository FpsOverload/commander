<?php

namespace FpsOverload\Commander\Clients;

use FpsOverload\Commander\Clients\Protocols\Quake3;

class CoD4 extends Quake3 implements ClientInterface {

    protected $responsePrefix = "\xFF\xFF\xFF\xFFprint";

    

}
