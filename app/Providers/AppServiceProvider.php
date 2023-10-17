<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::composer('*', function ($view) {
            $view->with('formatPrice', function ($price) {
                $formattedPrice = '';

                if ($price >= 1000000000) {
                    $ty = floor($price / 1000000000);
                    $trieu = floor(($price % 1000000000) / 1000000);

                    $formattedPrice = $ty . ' tỷ';
                    if ($trieu > 0) {
                        $formattedPrice .= ' ' . $trieu . ' triệu';
                    }
                } elseif ($price >= 1000000) {
                    $trieu = floor($price / 1000000);
                    $formattedPrice = $trieu . ' triệu';
                } else {
                    $formattedPrice = $price;
                }

                return $formattedPrice;
            });
        });
    }
}
