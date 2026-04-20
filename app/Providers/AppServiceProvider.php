<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    // Tắt kiểm tra SSL cho các request từ Server (giúp chạy trên localhost không bị lỗi certificate)
    if (config('app.env') === 'local') {
        \Illuminate\Support\Facades\Http::withoutVerifying();
    }
    }
}
