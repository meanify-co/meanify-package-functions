<?php

namespace Meanify\PackageFunctions\Providers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Meanify\PackageFunctions\Helpers\MeanifyRequestHelper;

class MeanifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Request::macro('meanify', function (): MeanifyRequestHelper {
            return new MeanifyRequestHelper();
        });
    }
}
