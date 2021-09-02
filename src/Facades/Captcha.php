<?php

namespace Swjtuhyq\Captcha\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Swjtuhyq\Captcha\Captcha
 */
class Captcha extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'captcha';
    }
}
