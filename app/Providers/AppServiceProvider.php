<?php

namespace App\Providers;

use App\Channels\Messages\WhatsAppMessage;
use App\Models\User;
use App\Channels\WhatsAppChannel;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Twilio\Rest\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function(User $user){
           return $user->role === 'admin';
        });

        Gate::define('staff', function(User $user){
            return $user->role === 'staff';
         });

        Gate::define('student', function(User $user){
            return $user->role === 'student';
         });

         $this->app->when(WhatsAppChannel::class)
         ->needs(Twilio::class)
         ->give(function(){
            return new Client(config('services.twilio.whatsapp.sid'), config('services.twilio.whatsapp.token'));
         });

    }
}
