<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    // public function __construct()
    // {
    //     parent::__construct(...func_get_args());

    //     // $this->createApplication();
    //     // $this->setUpBeforeAll();
    // }

    // public function setUpBeforeAll(): void
    // {
    // }

    // public function tearDownAfterAll(): void
    // {
    // }

    // protected function resetMigrations(): void
    // {
    //     // Artisan::call('migrate:reset');
    // }

    // protected function freshMigrations(): void
    // {
    //     // Artisan::call('migrate:fresh');
    // }
}
