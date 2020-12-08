<?php

namespace App\Providers;

use App\Models\Mahasiswa;
use App\Repositories\Interfaces\IMahasiswaRepository;
use App\Repositories\MahasiswaRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IMahasiswaRepository::class, function() {
            return new MahasiswaRepository(new Mahasiswa());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
