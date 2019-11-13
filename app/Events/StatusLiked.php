<?php

namespace App\Events;


use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StatusLiked implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $someone;

    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($someone)
    {
        $this->someone = $someone->content();
        
        // print_r($this->someone);die;
        // $this->message  = "{$username} liked your status";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        // print_r('a');die;
        return new Channel('chat');
        // return ['chat'];
    }
    // public function broadcastAs()
    // {
    //     return 'my-event';
    // }

    // public function broadcastWith()
    // {
    //    
    //     return ['TargetId' => $this->someone[0]->TargetId];
    // }
}
