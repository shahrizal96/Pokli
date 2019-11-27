<?php

namespace Webkul\BillPlz\Providers;

use Illuminate\Support\ServiceProvider;

class BillPlzServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__ . '/../Http/routes.php';

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'paypal');
    }
}