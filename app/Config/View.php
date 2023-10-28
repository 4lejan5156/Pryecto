<?php

namespace Config;

use CodeIgniter\Config\View as BaseView;
use CodeIgniter\View\ViewDecoratorInterface;

class View extends BaseView
{
    /**

     * @var bool
     */
    public $saveData = true;

    /**
     * @var array
     */
    public $filters = [];

    /**
     * @var array
     */
    public $plugins = [];

    /**
     * @var class-string<ViewDecoratorInterface>[]
     */
    public array $decorators = [];
}
