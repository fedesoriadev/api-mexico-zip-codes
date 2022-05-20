<?php

namespace App\Providers;

use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\SettlementType;
use App\Models\ZipCode;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->configureModelBindings();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    protected function configureModelBindings(): void
    {
        Route::bind('zip_code', function (string $zipCode) {
            return ZipCode::where('zip_code', $zipCode)->first();
        });

        Route::bind('federal_entity', function (string $federalEntity) {
            return FederalEntity::where('name', strtoupper($federalEntity))->first();
        });

        Route::bind('municipality', function (string $municipality) {
            return Municipality::where('name', strtoupper($municipality))->first();
        });

        Route::bind('settlement_type', function (string $settlementType) {
            return SettlementType::where('name', ucfirst($settlementType))->first();
        });
    }
}
