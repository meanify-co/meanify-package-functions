<?php

namespace Meanify\PackageFunctions;

class MeanifyRegistry
{
    protected static array $functions = [];

    public static function register(string $name, \Closure $closure): void
    {
        self::$functions[$name] = $closure;
    }

    public static function registerFromFunction(string $name, string $function_name): void
    {
        self::$functions[$name] = function (...$args) use ($function_name) {
            return $function_name(...$args);
        };
    }

    public static function all(): array
    {
        return self::$functions;
    }

    public static function has(string $name): bool
    {
        return array_key_exists($name, self::$functions);
    }

    public static function call(string $function_name, array $arguments = [])
    {
        if (function_exists($function_name)) {
            return $function_name(...$arguments);
        }

        throw new \BadMethodCallException("Function not found in MeanifyRegistry or as global '{$function_name}()'.");
    }
}
