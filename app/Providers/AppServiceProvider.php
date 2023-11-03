<?php

namespace App\Providers;

use App\Models\Acreage;
use App\Models\Demand;
use App\Models\Price;
use DateTime;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Post;

class AppServiceProvider extends ServiceProvider{

    /**
     * Register any application services.
     */
    public function register()
    : void{

    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    : void{
        Paginator::useBootstrapFive();

        View::composer('*', function ($view){
            $view->with('formatPrice', function ($price){
                $formattedPrice = '';

                if ($price >= 1000000000){
                    $ty    = floor($price / 1000000000);
                    $trieu = floor(($price % 1000000000) / 1000000);

                    $formattedPrice = $ty . ' tỷ';
                    if ($trieu > 0){
                        $formattedPrice .= ' ' . $trieu . ' triệu';
                    }
                }elseif ($price >= 1000000){
                    $trieu          = floor($price / 1000000);
                    $formattedPrice = $trieu . ' triệu';
                }else{
                    $formattedPrice = $price;
                }

                return $formattedPrice;
            });
        });

        View::composer('*', function ($view){
            $category       = new Category(); // Thay Category() bằng tên của mô hình của bạn
            $dataToCategory = $category->GetCategory();
            $view->with('dataToCategory', $dataToCategory);
        });

        View::composer('*', function ($view){
            $demand       = new Demand(); // Thay Category() bằng tên của mô hình của bạn
            $dataToDemand = $demand->GetDemand();
            $view->with('dataToDemand', $dataToDemand);
        });

        View::composer('*', function ($view){
            $price       = new Price(); // Thay Category() bằng tên của mô hình của bạn
            $dataToPrice = $price->GetPrice();
            $view->with('dataToPrice', $dataToPrice);
        });

        View::composer('*', function ($view){
            $acreage       = new Acreage(); // Thay Category() bằng tên của mô hình của bạn
            $dataToAcreage = $acreage->GetAcreage();
            $view->with('dataToAcreage', $dataToAcreage);
        });


    }
}
