<?php

namespace App\Listeners;

use App\Models\NewsCommentLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class NewsLogListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        try {
            NewsCommentLog::create([
                'post_type'=>$event->type,
                'post_id'=>$event->postId,
                'user_id'=>auth()->user()->id,
                'post_log'=>$event->log,
            ]);
            return true;
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return false ;
        }
    }
}
