<?php
require_once "./vendor/autoload.php";
use DependencyInjection\DependencyInjection;


$config = new \DependencyInjection\System\SystemConfig(['config_path' => "/app/config/config.yml"]);

(new DependencyInjection($config))->getService("component.db");

