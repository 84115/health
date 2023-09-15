<?php

namespace App\HealthChecks\Irv\WorthWhat;

use App\HealthChecks\ArchivedHealthCheck;

class StorageHealthCheck extends ArchivedHealthCheck
{
    public $name = 'worth-what-storage';
    public $domain = "http://app.worthwhat.com/api/ping/storage";
}
