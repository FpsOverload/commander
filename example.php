<?php

require_once __DIR__ . '/vendor/autoload.php';

use FpsOverload\Commander\Commander;

$commander = new Commander('cod4', '192.168.1.7', 28960);

var_dump($commander);
