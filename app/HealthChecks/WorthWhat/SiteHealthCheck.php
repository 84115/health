<?php

namespace App\HealthChecks\WorthWhat;

use App\HealthChecks\ArchivedHealthCheck;

class SiteHealthCheck extends ArchivedHealthCheck
{
    public $name = 'worth-what-site';
    public $domain = "http://www.worthwhat.com";
}
