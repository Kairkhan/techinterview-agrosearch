<?php

declare(strict_types=1);

namespace App\Modules\Billing\Providers;

use App\Modules\Billing\Contracts\Queries\GetByIdProductQuery;
use App\Modules\Billing\Contracts\Services\CalculatorService as CalculatorServiceContract;
use App\Modules\Billing\Queries\ProductQuery;
use App\Modules\Billing\Services\CalculatorService;
use Illuminate\Support\ServiceProvider;

final class BindServiceProvider extends ServiceProvider
{
    public array $bindings = [
        CalculatorServiceContract::class => CalculatorService::class,
        GetByIdProductQuery::class       => ProductQuery::class
    ];
}
