<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class StoreAds
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

	public $path, $name;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($path, $name)
    {
        $this->path = $path;
        $this->name = $name;
    }
}
