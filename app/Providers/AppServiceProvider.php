<?php

namespace App\Providers;

use App\Models\Demand;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Category;

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

        View::composer('*', function ($view) {
            $category = new Category(); // Thay Category() bằng tên của mô hình của bạn
            $dataToCategory = $category->GetCategory();
            $view->with('dataToCategory', $dataToCategory);
        });

        View::composer('*', function ($view) {
            $demand = new Demand(); // Thay Category() bằng tên của mô hình của bạn
            $dataToDemand = $demand->GetDemand();
            $view->with('dataToDemand', $dataToDemand);
        });

    }
}
