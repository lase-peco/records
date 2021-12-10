<?php

namespace LasePeCo\Records\Tests;

use \Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            'LasePeCo\Records\ServiceProvider',
        ];
    }
}
