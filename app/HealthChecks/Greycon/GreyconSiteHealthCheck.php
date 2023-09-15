<?php

namespace App\HealthChecks\Greycon;

use App\HealthChecks\PingHealthCheck;

class GreyconSiteHealthCheck extends PingHealthCheck
{
    public $name = "greycon-site";
    public $domain = "https://www.greycon.com";
}
