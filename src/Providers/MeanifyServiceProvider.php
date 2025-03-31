<?php

namespace Meanify\PackageFunctions\Providers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class MeanifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        Request::macro('meanify', function () {
            return new class {
                public function headers(): \Illuminate\Support\Collection
                {
                    return collect(request()->headers->all())
                        ->filter(fn ($_, $key) => str_starts_with($key, 'x-mfy-'))
                        ->map(fn ($value) => $value[0] ?? null);
                }
                public function getHeader(string $key, mixed $default = null): mixed
                {
                    return request()->headers->get("x-mfy-{$key}", $default);
                }
                public function setHeader(string $key, mixed $value): void
                {
                    request()->headers->set("x-mfy-{$key}", $value);
                }
            };
        });
    }
}
