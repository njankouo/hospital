<?php

namespace Flashy\FlashyLaravel\Tests;

use Flashy\FlashyLaravel\FlashyLaravelServiceProvider;
use Illuminate\Foundation\Application;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Get package providers.
     *
     * @param  Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [FlashyLaravelServiceProvider::class];
    }

}
