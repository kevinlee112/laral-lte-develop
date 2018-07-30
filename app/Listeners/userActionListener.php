<?php

namespace App\Listeners;

use Log;
use App\Events\userActionEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class userActionListener implements ShouldQueue
{

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
     * @param  userActionEvent $event
     * @return void
     */
    public function handle(userActionEvent $event)
    {
        $str = '时间:' . $event->time . $event->content;

        Log::info($str);
    }
}
