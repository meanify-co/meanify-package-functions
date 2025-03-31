<?php

use Meanify\PackageFunctions\MeanifyDispatcher;

if (!function_exists('meanify'))
{
    function meanify(): MeanifyDispatcher
    {
        return new MeanifyDispatcher();
    }
}
