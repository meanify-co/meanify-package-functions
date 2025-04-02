<?php

namespace Meanify\PackageFunctions\Helpers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;

class MeanifyRequestHelper
{
    /**
     * @return Collection
     */
    public function headers(): Collection
    {
        return collect(Request::instance()->headers->all())
            ->filter(fn ($_, $key) => str_starts_with($key, 'x-mfy-'))
            ->map(fn ($value) => $value[0] ?? null);
    }

    /**
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    public function getHeader(string $key, mixed $default = null): mixed
    {
        return Request::instance()->headers->get("x-mfy-{$key}", $default);
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function setHeader(string $key, mixed $value): void
    {
        Request::instance()->headers->set("x-mfy-{$key}", $value);
    }
}
