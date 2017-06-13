<?php

namespace App\Listeners;

use App\Events\StoreAds;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class StoreAdsListener implements ShouldQueue
{
    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 5;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  StoreAds  $event
     * @return void
     */
    public function handle(StoreAds $event)
    {
		Storage::putFileAs('ads', new UploadedFile($event->path, $event->name), $event->name);
		unlink($event->path);
    }
}
