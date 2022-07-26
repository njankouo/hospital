<?php

namespace Flashy\FlashyLaravel\Facades;

use Illuminate\Support\Facades\Facade;
use Flashy\Services\Account;
use Flashy\Services\Contacts;
use Flashy\Services\Events;
use Flashy\Services\Lists;
use Flashy\Services\Messages;
use Flashy\Services\Platforms;

/**
 * @method static Contacts contacts()
 * @method static Account account()
 * @method static Events events()
 * @method static Lists lists()
 * @method static Messages messages()
 * @method static Platforms platforms()
 */
class Flashy extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'flashy';
    }
}
