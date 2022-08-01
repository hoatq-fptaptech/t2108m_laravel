<?php

namespace App\Listeners;

use App\Events\CreateAStudent;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class NotificationAfterCreateStudent
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
     * @param  \App\Events\CreateAStudent  $event
     * @return void
     */
    public function handle(CreateAStudent $event)
    {
        $message = Auth::user()->name." vừa thêm sinh viên "
            .$event->_student->name." vào lớp ".$event->_student->classes->name;
        $nt = Notification::create([
            "title"=>"Vừa thêm 1 sinh viên mới vào danh sách",
            "description"=> $message
        ]);
        Cache::forget("home_data");
        // Cache::flush();

        // notify to user
        notify_user("my-channel","my-event",$nt->toJson());
    }
}
