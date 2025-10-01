<?php

namespace App\Providers;

use App\Models\Student;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Repositories\StudentRepository;
use App\Contracts\Interfaces\AboutInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Repositories\AboutRepository;
use App\Contracts\Repositories\ClassroomRepository;

class AppServiceProvider extends ServiceProvider
{
    private array $register = [
        StudentInterface::class => StudentRepository::class,
        AboutInterface::class => AboutRepository::class,
        ClassroomInterface::class => ClassroomRepository::class,
        // RegisterInterface::class => RegisterRepository::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->register as $index => $value) $this->app->bind($index, $value);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
