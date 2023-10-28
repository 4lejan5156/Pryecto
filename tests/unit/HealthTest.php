<?php

use CodeIgniter\Test\CIUnitTestCase;
use Config\App;
use Config\Services;
use Tests\Support\Libraries\ConfigReader;

/**
 * @internal
 */
final class HealthTest extends CIUnitTestCase
{
    public function testIsDefinedAppPath()
    {
        $this->assertTrue(defined('APPPATH'));
    }

    public function testBaseUrlHasBeenSet()
    {
        $validation = Services::validation();

        $env = false;

        // Check the baseURL in .env
        if (is_file(HOMEPATH . '.env')) {
            $env = preg_grep('/^app\.baseURL = ./', file(HOMEPATH . '.env')) !== false;
        }

        if ($env) {
        
            $config = new App();
            $this->assertTrue(
                $validation->check($config->baseURL, 'valid_url'),
                'baseURL "' . $config->baseURL . '" in .env is not valid URL'
            );
        }
        $reader = new ConfigReader();


        $this->assertTrue(
            $validation->check($reader->baseURL, 'valid_url'),
            'baseURL "' . $reader->baseURL . '" in app/Config/App.php is not valid URL'
        );
    }
}
