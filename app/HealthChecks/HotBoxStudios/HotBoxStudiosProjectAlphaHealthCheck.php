<?php

namespace App\HealthChecks\HotBoxStudios;

use App\HealthChecks\PingHealthCheck;

class HotBoxStudiosProjectAlphaHealthCheck extends PingHealthCheck
{
    public $name = 'hotbox-project-alpha';
    public $domain = "https://hotbox.james-ball.co.uk";
}
