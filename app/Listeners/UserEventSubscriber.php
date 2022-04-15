<?php
 
namespace App\Listeners;
 
class UserEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function onUserLogin($event) {
      $user = $event->user;
      $user->total_visits++;
      $user->save();

    }
 
    /**
     * Handle user logout events.
     */
    public function onUserLogout($event) {}
 
    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );
 
        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );
    }
 
}