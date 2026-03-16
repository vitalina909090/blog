<?php

namespace App\Providers;

use App\Contracts\EmailSenderInterface;
use App\Services\LoggerService;
use App\Services\SendGridEmailSender;
use Illuminate\Support\ServiceProvider;

class EmailServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(EmailSenderInterface::class, function ($app)
        {
           $logger = $app->make(LoggerService::class);

           return new SendGridEmailSender($logger);
        });
    }

    public function boot(): void
    {

    }
}
