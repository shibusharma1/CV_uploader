<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Config;
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
        view()->composer('*', function ($view) {
             $settings = Setting::first();
            $view->with('settings', Setting::first());

                    // Set mail config dynamically
        if ($settings) {
            Config::set('mail.mailer', $settings->mail_mailer ?? 'smtp');
            Config::set('mail.host', $settings->smtp_host);
            Config::set('mail.port', $settings->smtp_port);
            Config::set('mail.username', $settings->smtp_username);
            Config::set('mail.password', $settings->smtp_password);
            Config::set('mail.encryption', $settings->smtp_encryption);
            Config::set('mail.from.address', $settings->smtp_from_address);
            Config::set('mail.from.name', $settings->smtp_from_name);
        }
        });

    }
}
