<?php
// khai bao cac ham helper
use Pusher\Pusher;

function is_admin(){
    if(!\Illuminate\Support\Facades\Auth::check())
        return false;
    if(\Illuminate\Support\Facades\Auth::user()->is_admin)
        return true;
    return false;
}

function is_staff(){

}

function url_after_login(){
    if(is_admin()){
        return "/admin/student/list";
    }
    return "/";
}

function notify_user($channel,$event,$data){
    $options = array(
        'cluster' => env("PUSHER_APP_CLUSTER"),
        'useTLS' => true
    );
    $pusher = new Pusher(
        env("PUSHER_APP_KEY"),
        env("PUSHER_APP_SECRET"),
        env("PUSHER_APP_ID"),
        $options
    );
    $pusher->trigger($channel, $event, $data);
}
