<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Format\FormatterInterface;
use CodeIgniter\Format\JSONFormatter;
use CodeIgniter\Format\XMLFormatter;

class Format extends BaseConfig
{
    /**
     * @var string[]
     */
    public array $supportedResponseFormats = [
        'application/json',
        'application/xml', 
        'text/xml', 
    ];

    /**
     * @var array<string, string>
     */
    public array $formatters = [
        'application/json' => JSONFormatter::class,
        'application/xml'  => XMLFormatter::class,
        'text/xml'         => XMLFormatter::class,
    ];

    /**
     * @var array<string, int>
     */
    public array $formatterOptions = [
        'application/json' => JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES,
        'application/xml'  => 0,
        'text/xml'         => 0,
    ];

    /**
     * @return FormatterInterface
     * @deprecated
     */
    public function getFormatter(string $mime)
    {
        return Services::format()->getFormatter($mime);
    }
}
