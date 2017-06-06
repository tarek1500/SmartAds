<?php

namespace App\Listeners;

use App\Events\SmartAdsEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SmartAdsEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  SmartAdsEvent  $event
     * @return void
     */
    public function handle(SmartAdsEvent $event)
    {
    }
}
