<?php

namespace Config;

use CodeIgniter\Config\AutoloadConfig;

class Autoload extends AutoloadConfig
{
    /**
     * @var array<string, array<int, string>|string>
     */
    public $psr4 = [
        APP_NAMESPACE => APPPATH,
        'Config'      => APPPATH . 'Config',
        "Admin"       => ROOTPATH . "Admin"
    ];

    /**
     * @var array<string, string>
     */
    public $classmap = [];

    /**
     * @var string[]
     */
    public $files = [];

    /**
     * @var string[]
     */
    public $helpers = [];
}
